<?php

namespace Ajax\FormsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Ajax\FormsBundle\Entity\personne;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {
      if ($request->isMethod('POST')) {

        //set data query request
        $firstname = $request->request->get("firstname");
        $lastname = $request->request->get("lastname");
        $email = $request->request->get("email");
        $password = $request->request->get("password");

        //set data query request
        $objets = new personne();
        $token  = uniqid();
        $objets->setLastname($lastname);
        $objets->setFirstname($firstname);
        $objets->setEmail($email);
        $objets->setPassword($password);
        $objets->setToken($token);

        //save data in database
        $em = $this->getDoctrine()->getManager();
        $em->persist($objets);
        $em->flush();

        //slepp time request
        sleep(2);
        $rep = new JsonResponse();
        return $rep->setData(['success']);
      }
        return $this->render('AjaxFormsBundle:Default:index.html.twig');
    }
}
