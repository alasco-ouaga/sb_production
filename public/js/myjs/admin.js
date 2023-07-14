$(document).ready(function () {

    // Ajouter un nouveau numero telephone
    $('.create_new_phone').click(function () {
        document.getElementById("create_phone").className = "form-control"
        $(".create_success").hide();
        $(".create_error").hide();
        $(".save_validate_btn_1").show();
    })

    //enregistrement du numero de telephone
    $('.save_phone_number').click(function () {
        var number = document.getElementById("create_phone").value;
        console.log("le numero saisi est : "+number);
      
        if(number == "" || number.length < 8){
            document.getElementById("create_phone").className="form-control is-invalid"
            $(".phone_create_success").hide();
            $(".phone_find_error").hide();
            $(".phone_null_error").show();
        }
        else{
            let _token   = $('meta[name="csrf-token"]').attr('content');
            request = $.ajax({
              url: "/gestionRouteProtected/api/phone/create",
              type: "post",
              data: {
                  number : number,
                  _token : _token,
                }
            });
              
            request.done(function (response, textStatus, jqXHR) {
              console.log(response);
                if(response == true){
                    $(".phone_create_success").show()
                    $(".phone_find_error").hide()
                    $(".phone_null_error").hide();
                    document.getElementById("create_phone").className="form-control"
                }
                if(response == false){
                    $(".phone_create_success").hide()
                    $(".phone_null_error").hide()
                    $(".phone_find_error").show();
                    document.getElementById("create_phone").className="form-control"
                }
            })
  
            request.fail(function (jqXHR, textStatus, errorThrown) {
              console.error(
                "Nous avons une erreur dans la fonction: " +
                textStatus, errorThrown
              );
            })
        }//endif
    })//endfunction


    //modification du numero de telephone
    $('.update_phone').click(function () {
        const phone_id = $(this).parent().find('.phone_id').attr('id');
        const phone_number = $(this).parent().find('.phone_number').attr('id');

        console.log(phone_id,phone_number)

        $(".phone_null_error").hide()
        $(".phone_update_denied").hide()
        $(".phone_update_success").hide()
        $(".save_validate_btn_2").show()

        document.getElementById("update_phone_number").className="form-control"
        document.getElementById("update_phone_number").value= phone_number
        document.getElementById("update_phone_id").value= phone_id
    })

    //enregistre la modification du numero
    $('.save_phone_update').click(function () {
        var phone_number = document.getElementById("update_phone_number").value;
        var phone_id = document.getElementById("update_phone_id").value;
        if( phone_number == "" || phone_number.length < 8){
            $(".phone_null_error").show()
            $(".phone_update_denied").hide()
            $(".phone_update_success").hide()
            document.getElementById("update_phone_number").className="form-control is-invalid"
            console.log(phone_number)
        }
        else{
            console.log(phone_id)
            let _token = $('meta[name="csrf-token"]').attr('content');
            request = $.ajax({
                url: "/gestionRouteProtected/api/phone/update",
                type: "post",
                data: {
                    phone_number,phone_id,
                    _token
                },
            });

            request.done(function (response, textStatus, jqXHR) {
                console.log("reponse : "+response);
                if(response == true ){
                    $(".phone_update_success").show()
                    $(".phone_update_denied").hide()
                    $(".phone_null_error").hide()
                    $(".save_validate_btn_2").hide()
                    document.getElementById("update_phone_number").className="form-control"
                }
                if(response == false ){
                    $(".phone_update_success").hide()
                    $(".phone_update_denied").show()
                    $(".phone_null_error").hide()
                    document.getElementById("update_phone_number").className="form-control"
                }
            })

            request.fail(function (jqXHR, textStatus, errorThrown) {
                console.error(
                "Nous avons trouvé une erreur : " +
                textStatus, errorThrown
                );
            })
        }//endif
    })//endfunction

    //Obtenir les informations du user
    $('.get_user_info').click(function () {
        var user_id = $(this).parent().find('.userId').attr('id');
        console.log(user_id)
  
        request = $.ajax({
          url: "/gestionRouteProtected/api/user/data/"+ user_id,
          type: "get",
          data: {}
        });
  
        request.done(function (response, textStatus, jqXHR) {
          console.log(response);
          var get_first_name = document.getElementById('get_first_name');
          var get_last_name = document.getElementById('get_last_name');
          var get_phone = document.getElementById('get_phone');
          var get_email = document.getElementById('get_email');
          var get_user_id = document.getElementById('get_user_id');
          var get_role_name = document.getElementById('get_role_name');
          get_first_name.value=response.user["first_name"];
          get_last_name.value=response.user["last_name"];
          get_phone.value=response.user["phone"];
          get_email.value=response.user["email"];
          get_role_name.value=response.role;
        })
  
        request.fail(function (jqXHR, textStatus, errorThrown) {
          console.error(
            "Erreur: " +
            textStatus, errorThrown
          );
        })
      })

      //Obtenir les informations d'un user pou la modification
      $('.get_user_data_to_update').click(function () {
        var user_id = $(this).parent().find('.userId').attr('id');
        console.log("id du user est :",user_id)
  
        //supprimer le message d'erreur affiché
        $('.undefined-error').hide()
  
         //Supprimer les erreur notées sru les input
         var first_name = document.getElementById("first_name");
         var last_name = document.getElementById("last_name");
         var phone = document.getElementById("phone");
         var email = document.getElementById("email");
         first_name.className = "form-control";
         last_name.className = "form-control";
         phone.className = "form-control";
         email.className = "form-control";

         $(".first_name_null").hide()
        $(".last_name_null").hide()
        $(".phone_null").hide()
  
        request = $.ajax({
          url: "/gestionRouteProtected/api/user/info/"+ user_id,
          type: "get",
          data: {}
        });
      
        request.done(function (response, textStatus, jqXHR) {
          console.log("le retour est :"+response.role_id);
          $(".modal-body-select").html(response.select);
          var first_name = document.getElementById('first_name');
          var last_name = document.getElementById('last_name');
          var phone = document.getElementById('phone');
          var email = document.getElementById('email');
          var user_id = document.getElementById('user_id');
          var locality = document.getElementById('locality');
          first_name.value=response.user["first_name"];
          last_name.value=response.user["last_name"];
          phone.value=response.user["phone"];
          email.value=response.user["email"];
          user_id.value=response.user["id"];
          locality.value=response.user["locality"];

          //selction la partie selection dans le document
          var selectElement = document.getElementById("role_id");
          selectElement.innerHTML = "";
          console.log(response.roles)
          console.log("select :"+selectElement)
          for(let i = 0 ;i < response.compter ; i++){
            var option = document.createElement("option");
            option.value = response.roles[i]["id"];
            option.text = response.roles[i]["name"];
            option.className="text-uppercase";
            if( i+1 == response.role_id){
                option.selected = true
            }
            selectElement.add(option);
          }

        })
  
        request.fail(function (jqXHR, textStatus, errorThrown) {
          console.error(
            "Erreur: " +
            textStatus, errorThrown
          );
        })
    })

    // enregistrement de modification du user
    $('.user_update_save').click(function () {
        var first_name = document.getElementById('first_name').value;
        var last_name = document.getElementById('last_name').value;
        var phone = document.getElementById('phone').value;
        var email = document.getElementById('email').value;
        var role_id = document.getElementById('role_id').value;
        var user_id = document.getElementById('user_id').value;
        var locality = document.getElementById('locality').value;
  
        if(first_name.length === 0  || last_name.length === 0 || phone.length === 0){
          if(first_name.length === 0 ){
            document.getElementById("first_name").className = "form-control is-invalid";
            $(".first_name_null").show()
          }
          if(last_name.length === 0 ){
            document.getElementById("last_name").className = "form-control is-invalid";
            $(".last_name_null").show()
          }
  
          if(phone.length < 8 ){
            document.getElementById("phone").className = "form-control is-invalid";
            $(".phone_null").show()
          }
        }
        //On peut continuer si les données envoyées sont bonnes 
        else{
            console.log(first_name,last_name,phone,email,role_id,user_id)
            let _token   = $('meta[name="csrf-token"]').attr('content');
            request = $.ajax({
              url: "/gestionRouteProtected/api/user/update/save",
              type: "post",
              data: {
                    first_name ,last_name,phone,email,role_id,user_id,locality,_token ,
              }
            });
  
            //En cas de reusiite de modification 
            request.done(function (response, textStatus, jqXHR) {
              console.log(response);
              $(".set-success").html(response);
            })
      
            //En cas de d'echec de modification 
            request.fail(function (jqXHR, textStatus, errorThrown) {
              console.error(
                "Erreur: " +
                textStatus, errorThrown
              );
            }) 
  
        }
    })

    //Obtenir les roles pour creer un agent
    $('.get_role_to_create_user').click(function () {
        //Supprimer les erreurs notées sru les input
        var first_name = document.getElementById("create_first_name");
        var last_name = document.getElementById("create_last_name");
        var phone = document.getElementById("create_phone");
        var email = document.getElementById("create_email");
        var locality = document.getElementById("create_locality");
        first_name.className = "form-control";
        last_name.className = "form-control";
        phone.className = "form-control";
        email.className = "form-control";

        $(".create_first_name_null").hide()
        $(".create_last_name_null").hide()
        $(".create_phone_null").hide()

        $(".user_create_success").hide();
        $(".user_create_denied").hide();

        request = $.ajax({
          url: "/gestionRouteProtected/api/get/role",
          type: "get",
          data: {}
        });
    
        request.done(function (response, textStatus, jqXHR) {
            console.log("le retour est :"+response.role_id);

            //selection la partie selection dans le document
            var selectElement = document.getElementById("create_role_id");
            selectElement.innerHTML = "";
            console.log(response.roles)
            for(let i = 0 ;i < response.compter ; i++){
              var option = document.createElement("option");
              option.value = response.roles[i]["id"];
              option.text = response.roles[i]["name"];
              option.className="text-uppercase";
              selectElement.add(option);
            }
        })

        request.fail(function (jqXHR, textStatus, errorThrown) {
          console.error(
            "Erreur: " +
            textStatus, errorThrown
          );
        })
    })

    // enregistrement de modification du user
    $('.user_create_save').click(function () {
      var first_name = document.getElementById('create_first_name').value;
      var last_name = document.getElementById('create_last_name').value;
      var phone = document.getElementById('create_phone').value;
      var email = document.getElementById('create_email').value;
      var role_id = document.getElementById('create_role_id').value;
      var locality = document.getElementById('create_locality').value;
      console.log("essai"+first_name)

      if(first_name.length === 0  || last_name.length === 0 || phone.length === 0){
        if(first_name.length === 0 ){
          document.getElementById("create_first_name").className = "form-control is-invalid";
          $(".create_first_name_null").show()
        }
        if(last_name.length === 0 ){
          document.getElementById("create_last_name").className = "form-control is-invalid";
          $(".create_last_name_null").show()
        }
        if(phone.length < 8 ){
          document.getElementById("create_phone").className = "form-control is-invalid";
          $(".create_phone_null").show()
        }
        if(email.length === 0 ){
          document.getElementById("create_phone").className = "form-control is-invalid";
          $(".create_email_null").show()
        }
      }
      //On peut continuer si les données envoyées sont bonnes 
      else{
          console.log("vers ajax"+first_name,last_name,phone,email,role_id)
          let _token   = $('meta[name="csrf-token"]').attr('content');
          request = $.ajax({
            url: "/gestionRouteProtected/api/user/create/save",
            type: "post",
            data: {
                  first_name ,last_name,phone,email,role_id,locality,_token ,
            }
          });

          //En cas de reusiite de modification 
          request.done(function (response, textStatus, jqXHR) {
            console.log("le retour est : "+response);
            if(response == true){
              $(".user_create_success").show();
              $(".user_create_denied").hide();
              document.getElementById("create_first_name").value="";
              document.getElementById("create_last_name").value="";
              document.getElementById("create_phone").value="";
              document.getElementById("create_email").value="";
              document.getElementById("create_locality").value="";
            }
            else{
              $(".user_create_success").hide();
              $(".user_create_denied").show();
            }
          })
    
          //En cas de d'echec de modification 
          request.fail(function (jqXHR, textStatus, errorThrown) {
            console.error(
              "Erreur: " +
              textStatus, errorThrown
            );
          }) 
      }
  })
  
});