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


});