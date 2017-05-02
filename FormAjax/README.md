FormAjax
========

A Symfony project created on May 2, 2017, 1:52 am.

Install FOSJsRoutingBundle
1* -----------------------------------------------
"require": {
    "friendsofsymfony/jsrouting-bundle": "@stable"
},
run > composer update

2* -----------------------------------------------
Inside in AppKernel
$bundles = [
    new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
];

3* -----------------------------------------------
Inside in routing.yml
fos_js_routing:
    resource: '@FOSJsRoutingBundle/Resources/config/routing/routing.xml'
    options:
        expose: true

4* -----------------------------------------------
install the assets
 php bin/console assets:install --symlink web

5* -----------------------------------------------
 <script src="{{ asset('bundles/fosjsrouting/js/router.js') }}"></script>
 <script src="{{ path('fos_js_routing_js', { callback: 'fos.Router.setData' }) }}"></script>


6* -----------------------------------------------
Use Generating URIs

Routing.generate('route_name', /* your params */)
Or if you want to generate absolute URLs:

Routing.generate('route_name', /* your params */, true)

Routing.generate('my_route_to_expose', { id: 10 });
// will result in /foo/10/bar

Routing.generate('my_route_to_expose', { id: 10, foo: "bar" });
// will result in /foo/10/bar?foo=bar

$.get(Routing.generate('my_route_to_expose', { id: 10, foo: "bar" }));
// will call /foo/10/bar?foo=bar

Routing.generate('my_route_to_expose_with_defaults');
// will result in /blog/1

Routing.generate('my_route_to_expose_with_defaults', { id: 2 });
// will result in /blog/2

Routing.generate('my_route_to_expose_with_defaults', { foo: "bar" });
// will result in /blog/1?foo=bar

Routing.generate('my_route_to_expose_with_defaults', { id: 2, foo: "bar" });
// will result in /blog/2?foo=bar



use Controller
// src/AppBundle/Controller/DefaultController.php

/**
 * @Route("/foo/{id}/bar", options={"expose"=true}, name="my_route_to_expose")
 */
public function indexAction($foo) {
    // ...
}

/**
 * @Route("/blog/{page}",
 *     defaults = { "page" = 1 },
 *     options = { "expose" = true },
 *     name = "my_route_to_expose_with_defaults",
 * )
 */
public function blogAction($page) {
    // ...
}



link documentation
https://symfony.com/doc/master/bundles/FOSJsRoutingBundle/usage.html
