$(document).ready(function(){
  var $form = $('#ajax_form');

  $form.submit(function(e){
      e.preventDefault();
      console.debug('prevent submit');

      var lastname = $('#lastname').val();
      var firstname = $('#firstname').val();
      var email= $('#email').val();
      var password= $('#password').val();

      var values={
       lastname: lastname,
       firstname: firstname,
       email: email,
       password: password
      }

      $.ajax({
          url: "http://localhost:9000",
          type: "post",
          data: values ,
          beforeSend: function(){
            $("#loaderDiv").show();
          },
          success: function (response) {
            console.debug(response);
            $("#loaderDiv").hide();
          },
          error : function(resultat, statut, erreur){
             console.debug(resultat, erreur);
             $("#loaderDiv").hide();
          }
      });
  });
});
