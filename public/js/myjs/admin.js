$(document).ready(function () {

/*       $('.update-slice').click(function () {
        var id = $(this).parent().parent().find('.classe-name').attr('id');
        console.log(id);
      
        var idd = 5;
        console.log(idd);
      
        request = $.ajax({
          url: "/update_slice/" + id,
          type: "get",
          data: {}
        });
      
       
        request.done(function (response, textStatus, jqXHR) {
          console.log(response);
          $(".modal-body").html(response)
          $('.message').hide();
        })

        request.fail(function (jqXHR, textStatus, errorThrown) {
          console.error(
            "The following error occurred: " +
            textStatus, errorThrown
          );
        })
  }) */


  // Enregistrement des modification des données des tranches
 /*  $('.save-slice').click(function(event){
    event.preventDefault();

      var table = new Array();
      var amount=10;

      for (let pas = 0; pas < 3; pas++) {
        table[pas]=document.getElementById("slice_"+pas).value;
      }

      let _token   = $('meta[name="csrf-token"]').attr('content');
      
      var classe_id = document.getElementById("classe_id").value;
      console.log("id de la classes est :"+classe_id);

      request = $.ajax({
            url: "/save_update_slice",
            type: "post",
            data:{
              table:table,
              classe_id:classe_id,
              _token
            },

            success:function(response){
              console.log(response);
            },
      })

      request.done(function (response, textStatus, jqXHR) {
            // Log a message to the console
            console.log(response);
            $(".message").html(response)
            $('.message').show(); 
      })
  }) */


  //debut de suppression de classe
 /*  $('.deleting_of_clase').click(function () {
    var classe_id = $(this).parent().parent().find('.classe-name').attr('id');
    
    console.log(classe_id);

    request = $.ajax({
      url: "/deleting_of_clase/" + classe_id,
      type: "get",
      data: {},

      success:function(response){
        console.log(response);
      },

    })

    request.done(function (response, textStatus, jqXHR) {
      // Log a message to the console
      console.log(response);
      $(".delete-model").html(response)
      $('.delete-message').hide();
    })
  }) */


  //confirmation de la modification
/*   $('.confirm-delete-classe').click(function () {
    var classe_id = document.getElementById("classe_id").value;
    console.log(classe_id);

    let _token   = $('meta[name="csrf-token"]').attr('content');

    request = $.ajax({
      url: "/confirm_delete_classe",
      type: "post",
      data:{
            id:classe_id,
            _token
          },

      success:function(response){
        console.log(response);
      },
    })

    request.done(function (response, textStatus, jqXHR) {
      // Log a message to the console
      console.log(response);
      $(".delete-model").html(response)
      $('.delete-message').show();
    })
    
  }) */

  //affiche de la partie suivantes
  /*  $('.general-click').click(function () {
    var indice = document.getElementById("general-click").value;
    console.log(indice);

    request = $.ajax({
      url: "/get_cycle/" + indice,
      type: "get",
      data: {},

      success:function(response){
        console.log(response);
      },

    })

    request.done(function (response, textStatus, jqXHR) {
      // Log a message to the console
      console.log(response);
      $(".cycle").html(response)
      $('.filiere').hide();
      $('.cycle').show();
    })
    
  }) */


  //affichage de la partie suivante soit les filieres
 /*  $('.technique-click').click(function () {
    var indice = document.getElementById("technique-click").value;
    console.log(indice);

    request = $.ajax({
      url: "/get_filiere/" + indice,
      type: "get",
      data: {},

      success:function(response){
        console.log(response);
      },

    })

    request.done(function (response, textStatus, jqXHR) {
      // Log a message to the console
      console.log(response);
      $(".filiere").html(response)
      $('.cycle').hide();
    })

    request.done(function (response, textStatus, jqXHR) {
      // Log a message to the console
      console.log(response);
      $(".cycle").html(response)
      $('.filiere').show();
      $('.cycle').hide();
    })
    
  }) */


/* 
  //Recherche de classes pour affichage
  $('.generale').click(function () {
    var indice = document.getElementById("general-click").value;
    console.log(indice);

    request = $.ajax({
      url: "/get_cycles/" + indice,
      type: "get",
      data: {},

      success:function(response){
        console.log(response);
      },

    })

    request.done(function (response, textStatus, jqXHR) {
      // Log a message to the console
      console.log(response);
      $(".cycle").html(response)
      $('.filiere').hide();
      $('.cycle').show();
    })
    
  })


  //affichage de la partie suivante soit les filieres
  $('.technique').click(function () {
    var indice = document.getElementById("technique-click").value;
    console.log(indice);

    request = $.ajax({
      url: "/get_filieres/" + indice,
      type: "get",
      data: {},

      success:function(response){
        console.log(response);
      },

    })

    request.done(function (response, textStatus, jqXHR) {
      // Log a message to the console
      console.log(response);
      $(".filiere").html(response)
      $('.cycle').hide();
    })

    request.done(function (response, textStatus, jqXHR) {
      // Log a message to the console
      console.log(response);
      $(".cycle").html(response)
      $('.filiere').show();
      $('.cycle').hide();
    })
    
  })


  //Recherche de classes pour affichage
  $('.getGeneraleClick').click(function () {
    var indice = document.getElementById("general-click").value;
    console.log(indice);

    request = $.ajax({
      url: "/student_get_cycle/" + indice,
      type: "get",
      data: {},

      success:function(response){
        console.log(response);
      },

    })

    request.done(function (response, textStatus, jqXHR) {
      // Log a message to the console
      console.log(response);
      $(".cycle").html(response)
      $('.filiere').hide();
      $('.cycle').show();
    })
    
  })


  //affichage de la partie suivante soit les filieres
  $('.getTechniqueClick').click(function () {
    var indice = document.getElementById("technique-click").value;
    console.log(indice);

    request = $.ajax({
      url: "/student_get_filiere/" + indice,
      type: "get",
      data: {},

      success:function(response){
        console.log(response);
      },

    })

    request.done(function (response, textStatus, jqXHR) {
      // Log a message to the console
      console.log(response);
      $(".filiere").html(response)
      $('.cycle').hide();
    })

    request.done(function (response, textStatus, jqXHR) {
      // Log a message to the console
      console.log(response);
      $(".cycle").html(response)
      $('.filiere').show();
      $('.cycle').hide();
    })
  }) */

/* .........................................Afficher la liste des etudiants ............................................... */
/* .........................................afficher la liste des etudiants............................................... */

/* $('.getstudent').click(function () {
  var indice = document.getElementById("classeId").value;
  console.log(indice);

  request = $.ajax({
    url: "/student_get_classe_liste/" + indice,
    type: "get",
    data: {},

    success:function(response){
      console.log(response);
    },
  })

  request.done(function (response, textStatus, jqXHR) {
    // Log a message to the console principal
    console.log(response);
    $(".getStudentList").html(response)
    $('.getStudentList').show();
    $('.table-student').hide();
    $('.principal').hide();
  })
})  */
  
/* .........................................Rafraisir la liste des élèves ............................................... */
/* .........................................Raffraichier la liste des élèves............................................... */
/*   $('.getstudent').click(function () {
      var indice = document.getElementById("classeId").value;
      console.log(indice);

      request = $.ajax({
        url: "/student_refresh_list/" + indice,
        type: "get",
        data: {},
  
        success:function(response){
          console.log(response);
        },
      })

      request.done(function (response, textStatus, jqXHR) {
        // Log a message to the console 
        console.log(response);
        $(".getStudentList").html(response)
        $('.getStudentList').show();
        $('.principal').hide();
      })
     
  }) */


  //creation d'un eleves
/*     $('.addstudent').click(function () {
      var indice = document.getElementById("classeId").value;
      console.log(indice);
  
      request = $.ajax({
        url: "/student_get_create/" + indice,
        type: "get",
        data: {},
  
        success:function(response){
          console.log(response);
        },
      })
  
      request.done(function (response, textStatus, jqXHR) {
        // Log a message to the console 
        console.log(response);
        $(".create-student").html(response)
        $('.principal').show();
        $('.position').show();
        $('.create-student').show();
        $('.create-matricule').hide();
        $('.save-message').hide();
        $('.getStudentList').hide();
      })
      
    }) */

    //enregistrement d'un etudiants
    $('.saveStudentClick').click(function () {
        var first_name = document.getElementById("first_name").value;
        var last_name = document.getElementById("last_name").value;
        var matricule = document.getElementById("matricule").value;
        var academy_year = document.getElementById("academy_year").value;
        var born_date = document.getElementById("born_date").value;
        var born_place = document.getElementById("born_place").value;
        var nationality = document.getElementById("nationality").value;
        var classeId = document.getElementById("classeId").value;
        var student_phone = document.getElementById("student_phone").value;
        var parent_phone = document.getElementById("student_phone").value;
        var residence = document.getElementById("residence").value;


        let _token   = $('meta[name="csrf-token"]').attr('content');

        console.log(classeId,born_date,first_name,last_name,matricule,academy_year,born_date,born_place,nationality,student_phone,parent_phone);

        request = $.ajax({
          url: "/student_save_student",
          type: "post",
          data: {
              first_name : first_name,
              last_name : last_name,
              matricule : matricule,
              classeId : classeId,
              academy_year : academy_year,
              born_date : born_date,
              born_place : born_place,
              nationality : nationality,
              student_phone: student_phone,
              parent_phone : parent_phone,
              residence : residence,
              _token
            },

          success:function(response){
            console.log(response);
          },
        })

        request.done(function (response, textStatus, jqXHR) {
          // Log a message to the console
          console.log(response);
          $(".save-message").html(response)
          $(".save-message").show();
          $('.first-action').hide();
          $('.table-student').hide();
        })

        request.fail(function (jqXHR, textStatus, errorThrown) {
          console.error(
            "The following error occurred: " +
            textStatus, errorThrown
          );
        })
    })

  /*  affichage des etudiants */
  /*  $('.GeneraleClick').click(function () {
    var indice = document.getElementById("general-click").value;
    console.log(indice);

    request = $.ajax({
      url: "/student_display_get_cycle/" + indice,
      type: "get",
      data: {},

      success:function(response){
        console.log(response);
      },

    })

    request.done(function (response, textStatus, jqXHR) {
      // Log a message to the console
      console.log(response);
      $(".cycle").html(response)
      $('.filiere').hide();
      $('.cycle').show();
    })
    
  })
/*  */
  //affichage des classes techniques
 /*  $('.TechniqueClick').click(function () {
    var indice = document.getElementById("technique-click").value;
    console.log(indice);

    request = $.ajax({
      url: "/student_display_get_filiere/" + indice,
      type: "get",
      data: {},

      success:function(response){
        console.log(response);
      },

    })

    request.done(function (response, textStatus, jqXHR) {
      // Log a message to the console
      console.log(response);
      $(".filiere").html(response)
      $('.cycle').hide();
    })

    request.done(function (response, textStatus, jqXHR) {
      // Log a message to the console
      console.log(response);
      $(".cycle").html(response)
      $('.filiere').show();
      $('.cycle').hide();
    })
    
  }) */
 
    /* .........................................Modification des etudiants............................................... */
    /* .........................................Modification des etudiants............................................... */

 /*    $('.studentUpdate').click(function () {
      var indice = $(this).parent().parent().find('.student').attr('id');
      console.log(indice);
    
      request = $.ajax({
        url: "/student_update_student/" + indice,
        type: "get",
        data: {}
      });
    
      request.done(function (response, textStatus, jqXHR) {
        console.log(response);
        $(".student-data").html(response)
        $('.student-data').show();
        $('.update-message').hide();
        $('.validate').show();
      })
 */
    //   request.fail(function (jqXHR, textStatus, errorThrown) {
    //     console.error(
    //       "The following error occurred: " +
    //       textStatus, errorThrown
    //     );
    //   })
    // })


    
    /* .........................................Enregistrement de la modification ............................................... */
    /* .........................................Enregistrement de la modification............................................... */

    $('.save-update-data').click(function () {
      event.preventDefault();

      var first_name = document.getElementById("first_name").value;
      var last_name = document.getElementById("last_name").value;
      var matricule = document.getElementById("matricule").value;
      var academy_year = document.getElementById("academy_year").value;
      var born_date = document.getElementById("born_date").value;
      var born_place = document.getElementById("born_place").value;
      var nationality = document.getElementById("nationality").value;
      var classeId = document.getElementById("classeId").value;
      var student_phone = document.getElementById("student_phone").value;
      var parent_phone = document.getElementById("student_phone").value;
      var residence = document.getElementById("residence").value;
      var studentId = document.getElementById("studentId").value;

      console.log(born_date);
      let _token   = $('meta[name="csrf-token"]').attr('content');

      console.log(classeId,born_date,first_name,last_name,matricule,residence,academy_year,born_date,born_place,nationality,student_phone,parent_phone);

     request = $.ajax({
        url: "/student_confirm_update",
        type: "post",
        data: {
            first_name : first_name,
            last_name : last_name,
            matricule : matricule,
            classeId : classeId,
            academy_year : academy_year,
            born_date : born_date,
            born_place : born_place,
            nationality : nationality,
            student_phone: student_phone,
            parent_phone : parent_phone,
            residence : residence,
            studentId : studentId,
            _token
          },

        success:function(response){
          console.log(response);
        },

      })

      request.done(function (response, textStatus, jqXHR) {
        // Log a message to the console
        console.log(response);
        $(".update-message").html(response)
        $('.update-message').show();
        $('.student-data').hide();
        $('.validate').hide();
      })

      request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error("erreur de données");
      })
  })


  /* .........................................Enregistrement de la modification ............................................... */
  /* .........................................Enregistrement de la modification............................................... */
  // $('.studentDelete').click(function () {
  //   var indice = $(this).parent().parent().find('.student').attr('id');
  //   console.log(indice);

  //   request = $.ajax({
  //     url: "/student_delete_student/" + indice,
  //     type: "get",
  //     data: {}
  //   });

  //   request.done(function (response, textStatus, jqXHR) {
  //     console.log(response);
  //     $(".student-delete").html(response)
  //     $('.delete-message').hide();
  //     $('.validate').show();
  //   })

  //   request.fail(function (jqXHR, textStatus, errorThrown) {
  //     console.error(
  //       "The following error occurred: " +
  //       textStatus, errorThrown
  //     );
  //   })
  //   request.fail(function (jqXHR, textStatus, errorThrown) {
  //     console.error(
  //       "The following error occurred: " +
  //       textStatus, errorThrown
  //     );
  //   })
    
  // })


  //confirm delete
  $('.confirm-delete').click(function () {
    var indice = document.getElementById("id_to_delete").value;
    console.log(indice);

    request = $.ajax({
      url: "/student_confirm_delete/" + indice,
      type: "get",
      data: {}
    });

    request.done(function (response, textStatus, jqXHR) {
      console.log(response);
      $(".student-delete").html(response)
      $('.delete-message').show();
      $('.validate').hide();
    })

    request.fail(function (jqXHR, textStatus, errorThrown) {
      console.error(
        "The following error occurred: " +
        textStatus, errorThrown
      );
    })
    
  })

  /* .........................................Voir details ............................................... */
  /* .........................................Voir details............................................... */

  // $('.get-student-data').click(function () {
  //   var indice = $(this).parent().parent().find('.student').attr('id');
  //   console.log(indice);
  
  //   request = $.ajax({
  //     url: "/student_seen_detail/" + indice,
  //     type: "get",
  //     data: {}
  //   });
  
  //   request.done(function (response, textStatus, jqXHR) {
  //     console.log(response);
  //     $(".seen-data").html(response)
  //   })

  //   request.fail(function (jqXHR, textStatus, errorThrown) {
  //     console.error(
  //       "The following error occurred: " +
  //       textStatus, errorThrown
  //     );
  //   })
  // })


/* ......................................... affichage des etudiants ............................................... */
/* .........................................affichage des etudiants............................................... */

 $('.GeneraleClick').click(function () {
  var indice = document.getElementById("general-click").value;
  console.log(indice);

  request = $.ajax({
    url: "/student_display_get_cycle/" + indice,
    type: "get",
    data: {},

    success:function(response){
      console.log(response);
    },

  })

  request.done(function (response, textStatus, jqXHR) {
    // Log a message to the console
    console.log(response);
    $(".cycle").html(response)
    $('.filiere').hide();
    $('.cycle').show();
  })
  
})

  /* .........................................creer un matricule ............................................... */
  /* .........................................creer un matricule............................................... */
/*   $('.create-matricul').click(function () {
      $('.principal').show();
      $('.create-matricule').show();
      $('.click-to-generat').show();
      $('.result').hide();
      $('.create-student').hide();
      $('.position').hide();
      $('.save-message').hide();
      $('.getStudentList').hide();
  })
 */

  $('.generate').click(function () {
  
    request = $.ajax({
      url: "/student_create_matricule",
      type: "get",
      data: {},
  
      success:function(response){
        console.log(response);
      },
  
    })
  
    request.done(function (response, textStatus, jqXHR) {
      // Log a message to the console result click-to-generat
      console.log(response);
      $(".result").html(response)
      $('.result').show();
      $('.principal').show();
      $('.create-matricule').show();
      $('.click-to-generat').hide();
      $('.create-student').hide();
      $('.save-message').hide();
      $('.getStudentList').hide();
    })
    
  })


/* .........................................verification de la selection ............................................... */
/* .........................................verification de la selection............................................... */

/* $('.select-verify').click(function () {

  var indice = document.getElementById("choix_"+1).checked;
  var nb_display = document.getElementById("nb_display").value;
  
  console.log(indice);
  console.log(nb_display);

  for (let pas = 1; pas <= nb_display; pas++) {
      var error = false;
      //voir si l'unput est seletionner
      if(document.getElementById("choix_"+pas).checked === true){
        var i=pas;
        u=i-1;
        //parcouri en arriere pour verifier si un des inputs n'est pas selectionner
        if( u  != 0){
          while(u>=1){
            if(document.getElementById("choix_"+u).checked === false){
               error = true;
               break;
            }
            u--;
          }
        }

        //si erreur cacher le bouton et detruire la boucle
        if(error == true){
          $('.btn_control').hide();
          break;
        }
        else{
          $('.btn_control').show();
        }
      }
  }
}) */


/* ......................................... gestion des messages de service ............................................... */
/* ..........................................gestion des messages de service.............................................. */

$('.getClickService').click(function () {

  var nb_display = document.getElementById("nb_display").value
  for(let i = 1 ; i<=nb_display ; i++){
    var indice = document.getElementById("service_"+i).checked
    if(indice === true){
      var service_id = document.getElementById("service_"+i).value
      
      if(service_id == 1){
        $(".service-info").html('<p class="text-uppercase message-color"> paiement en cours avec <span class="service-color"> Orange Money </span >  </p>');
        $(".code-info").html('(Taper *144*4*6*montant#)');
      }

      if(service_id == 2){
        $(".service-info").html('<p class="text-uppercase message-color"> paiement en cours avec <span class="service-color"> Moov Money </span >  </p>');
        $(".code-info").html('(Taper *555*4*8*montant#)');
      }

      if(service_id == 3){
        $(".service-info").html('<p class="text-uppercase message-color"> paiement en cours avec <span class="service-color"> Coris Money </span>  </p>');
        $(".code-info").html('(Taper *100*4*8*montant#)');
      }
      break;
    }
  }
  

  console.log(nb_display);
})


/* $('.disp_cycle').click(function () {
  var id = document.getElementById("general-click").value
  if(id==1){
    $('.cycle').show();
    $('.filiere').hide();
    $('.error-filiere').hide();
    $('.error-cycle').show();
  }
  console.log(id);
})
 */
/* 
$('.disp_filiere').click(function () {
  var id = document.getElementById("technique-click").value
  if(id==2){
    $('.cycle').hide();
    $('.filiere').show();
    $('.error-filiere').show();
    $('.error-cycle').hide();
  }
  console.log(id);
}) */

$('.verify-data').click(function () {

  var matricule_of_student = document.getElementById("matricule_of_student").value
  var email_of_parent = document.getElementById("email_of_parent").value
  var phone_of_parent = document.getElementById("phone_of_parent").value


  console.log(matricule_of_student,email_of_parent,phone_of_parent);

  if(matricule_of_student == '' || email_of_parent == '' || phone_of_parent == ''){
      $(".error-info").html('<div class="border border-red py-2 mb-3 text-center div-border-color"> Attention : Tous les champs doivent etre remplie </div>');
  }
  
})

/* creation d'un nouveau numero pour une structure */
$('.studentUpdate').click(function () {
      var indice = $(this).parent().parent().find('.student').attr('id');
      console.log(indice);
    
      request = $.ajax({
        url: "/student_update_student/" + indice,
        type: "get",
        data: {}
      });
    
      request.done(function (response, textStatus, jqXHR) {
        console.log(response);
        $(".student-data").html(response)
        $('.student-data').show();
        $('.update-message').hide();
        $('.validate').show();
      })

      request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error(
          "The following error occurred: " +
          textStatus, errorThrown
        );
      })
    })

    /* ....................gestion de numero de paiement et de telephone................. */
    
    /* $('.getInputToAddPhoneNumber').click(function () {
     
        $(".modal-error-message").hide();
        $(".modal-create-message").hide();
        $(".modal-length-error").hide();

        request = $.ajax({
          url: "/getInputToAddPhoneNumber",
          type: "get",
          data: {}
        });
      
        request.done(function (response, textStatus, jqXHR) {
          console.log(response);
          $(".modal-create-body").html(response);
        })
  
        request.fail(function (jqXHR, textStatus, errorThrown) {
          console.error(
            "Nous avons une erreur dans la fonction: " +
            textStatus, errorThrown
          );
        })

    }) */


    //enregistrement du numero de telephone
    $('.save_phone_number').click(function () {
      var number = document.getElementById("create_phone").value;
      let length = number.length;
      console.log("le numero saisi est : "+number);
    
      if(number == "" || number.length < 8){
          document.getElementById("create_phone").className="form-control is-invalid"
          $(".create_success").hide();
          $(".exist_error").hide();
          $(".create_error").show();
      }
      else{
          request = $.ajax({
            url: "/add/phone/"+number,
            type: "get",
            data: {}
          });
            
          request.done(function (response, textStatus, jqXHR) {
            console.log(response);
              if(response == true){
                  $(".create_success").show()
                  $(".create_error").hide()
                  $(".exist_error").hide();
                  $(".save_validate_btn_1").hide();
                  document.getElementById("create_phone").className="form-control"
              }
              if(response == false){
                  $(".create_success").hide()
                  $(".create_error").hide()
                  $(".exist_error").show();
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


    //get form to create a new number
    $('.create_new_phone').click(function () {
      document.getElementById("create_phone").className = "form-control"
      $(".create_success").hide();
      $(".create_error").hide();
      $(".save_validate_btn_1").show();
    })

    //get save btn 
/*     $('.recreate_new_phone').click(function () {
      var element = document.getElementById("create_phone")
      element.value=""
      $(".create_success").hide();
      $(".valu_null_error").hide();
      $(".create_exist_error").hide();
      $(".recreate_new_phone").hide();
      $(".create_lenght_error").hide();
      $(".save_btn").show();
  })
 */

    //modification du numero de telephone
    $('.update_phone').click(function () {
      var id = $(this).parent().find('.phone').attr('id');
      console.log(id)
      $(".null_error").hide()
      $(".value_not_modified").hide()
      $(".update_is_success").hide()
      $(".save_validate_btn_2").show()
      document.getElementById("update_phone_number_1").className="form-control"

      request = $.ajax({
        url: "/get/phone/number/"+id,
        type: "get",
        data: {}
      });
    
      request.done(function (response, textStatus, jqXHR) {
          console.log(response);

          var element_number = document.getElementById("update_phone_number_1")
          element_number.value = response[0] 

          var element_number = document.getElementById("update_phone_number_2")
          element_number.value = response[0] 

          var element_id = document.getElementById("update_phone_id")
          element_id.value = response[1]
      })

      request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error(
          "Nous avons une erreur dans la fonction: " +
          textStatus, errorThrown
        );
      })
    })

    //enregistre le numero modifier
    $('.save_update_phone').click(function () {
        var phone_1 = document.getElementById("update_phone_number_1").value;
        var phone_2 = document.getElementById("update_phone_number_2").value;
        var phone_id = document.getElementById("update_phone_id").value;
        if( phone_1 == "" || phone_1.length < 8 || phone_id ==""){
          $(".null_error").show()
          $(".value_not_modified").hide()
          $(".update_is_success").hide()
         document.getElementById("update_phone_number_1").className="form-control is-invalid"
        }else {
              if(phone_1 == phone_2){
                  $(".value_not_modified").show()
                  $(".update_is_success").hide()
                  $(".null_error").hide()
              }
              else{
                  let _token   = $('meta[name="csrf-token"]').attr('content');
                  request = $.ajax({
                    url: "/save/phone/number",
                    type: "post",
                    data: {
                        phone_1 : phone_1,
                        phone_2 : phone_2,
                        phone_id : phone_id,
                        _token
                    },
                  });

                  request.done(function (response, textStatus, jqXHR) {
                      console.log(response);
                      if(response == true ){
                          $(".update_is_success").show()
                          $(".value_not_modified").hide()
                          $(".save_validate_btn_2").hide()
                          $(".null_error").hide()
                          document.getElementById("update_phone_number_1").className="form-control"
                      }
                      if(response == false ){
                          $(".update_is_success").hide()
                          $(".value_not_modified").show()
                          $(".save_validate_btn_2").hide()
                          $(".null_error").hide()
                          document.getElementById("update_phone_number_1").className="form-control"
                      }
                  })

                  request.fail(function (jqXHR, textStatus, errorThrown) {
                      console.error(
                        "Nous avons trouvé une erreur : " +
                        textStatus, errorThrown
                      );
                  })
              }
        }//endif
    })//endfunction

    //debut de suppression d'un numero de telephone
    /* $('.delete-phone').click(function () {
      var id = $(this).parent().find('.phone').attr('id');
      
      console.log(id);
      $(".modal-delete-message").hide();


      request = $.ajax({
        url: "/delete/phone/number/"+id,
        type: "get",
        data: {}
      });
    
      request.done(function (response, textStatus, jqXHR) {
        console.log(response);
        $(".modal-identifier").html(response);
      })

      request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error(
          "Nous avons une erreur dans la fonction: " +
          textStatus, errorThrown
        );
      })
    })*/

    //confirm delete of number
    /*$('.confirm-delete-phone').click(function () {
      var id = document.getElementById('phoneId').value;
      console.log(id);

      request = $.ajax({
        url: "/confirm/delete/phone/"+id,
        type: "get",
        data: {}
      });
    
      request.done(function (response, textStatus, jqXHR) {
        console.log(response);
        $(".modal-delete-message").show();
        $(".modal-delete-message").html(response);
      })

      request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error(
          "Nous avons rencontré une erreur de programme: " +
          textStatus, errorThrown
        );
      })
    })*/

    //debut de modification de code
    $('.get_payment_code_to_modify').click(function () {
      const id = $(this).parent().find('.code_id').attr('id');
      const service_id = $(this).parent().find('.service_id').attr('id');
      const number = $(this).parent().find('.account_number').attr('id');
      console.log(id,number,service_id);
      
      $(".update_success").hide();
      $(".value_not_modified").hide();
      $(".null_value_error").hide();
      $(".denied_error").hide();
      $(".save_update_btn").show();

      
      document.getElementById("new_number").className="form-control"
      document.getElementById("new_number").value=number
      document.getElementById("old_number").value=number
      document.getElementById("old_service_id").value=service_id
      document.getElementById("update_id").value=id
    })

    //enregistremment d'un nouveau code
    $('.addCode').click(function () {
      var paymentCode = document.getElementById('paymentCode').value;
      var paymentTypeId = document.getElementById('paymentTypeId').value;
      let taille = paymentCode.length;

      console.log(taille,paymentCode,paymentTypeId);
      $(".modal-create-message").hide();

      if(paymentCode == ""){
        $(".modal-error-message").show();
        $(".modal-create-message").hide();
      }
      else{
          if(taille !=7 ){
            $(".modal-error-message").hide();
            $(".modal-create-message").hide();
            $(".modal-length-error").show();
          }
          else{
              let _token   = $('meta[name="csrf-token"]').attr('content');
              request = $.ajax({
                url: "/add/codeInStructure",
                type: "post",
                data: {
                  paymentCode : paymentCode,
                  paymentTypeId : paymentTypeId,
                  _token : _token
                }
              });
          
              request.done(function (response, textStatus, jqXHR) {
                console.log(response);
                $(".modal-create-message").show();
                $(".modal-create-message").html(response);
              })
      
              request.fail(function (jqXHR, textStatus, errorThrown) {
                console.error(
                  "Nous avons rencontré une erreur de programme : " +
                  textStatus, errorThrown
                );
              })
          }//endif
      }//endif
    })//endfunction

    //Modification du code de paiement
    $('.save_code_update').click(function () {
      var new_number = document.getElementById('new_number').value;
      var old_number = document.getElementById('old_number').value;
      var new_service_id = document.getElementById('service_id').value;
      var old_service_id = document.getElementById('old_service_id').value;
      var update_id = document.getElementById('update_id').value;
      console.log(new_number,old_number,service_id,update_id)

      if(new_number == ""){
          $(".denied_error").hide();
          $(".update_success").hide();
          $(".null_value_error").show();
          $(".value_not_modified").hide();
          document.getElementById("new_number").className="form-control is-invalid"
      }
      else{
          if(new_number == old_number && old_service_id == new_service_id ){
            $(".denied_error").hide();
            $(".update_success").hide();
            $(".null_value_error").hide();
            $(".value_not_modified").show();
            document.getElementById("new_number").className="form-control"

          }
          else{
              let _token   = $('meta[name="csrf-token"]').attr('content');
              request = $.ajax({
                  url: "/update/structure/payment/code",
                  type: "post",
                  data: {
                      service_id : new_service_id ,new_number ,update_id ,_token
                  }
              });
              request.done(function (response, textStatus, jqXHR) {
                  console.log("resultat " + response);
                  if(response.value == true ){
                      $(".denied_error").hide();
                      $(".update_success").show();
                      $(".null_value_error").hide();
                      $(".save_update_btn").hide();
                      $(".value_not_modified").hide();
                  }
                  else{
                      $(".denied_error").show();
                      $(".update_success").hide();
                      $(".null_value_error").hide();
                      $(".value_not_modified").hide();
                  }
              })
          
              request.fail(function (jqXHR, textStatus, errorThrown) {
                  console.error(
                    "Nous avons rencontré une erreur de programme : " +
                    textStatus, errorThrown
                  );
              })
          }
      }        
    })//endfunction

    //debut de suspension d'un etablissement
    $('.blockedStructure').click(function () {
      var structureId = $(this).parent().find('.structureId').attr('id');

      console.log($(this).parent());
      $(".modal-block-response").html("");
      $(".btn_confirm").show();


      request = $.ajax({
        url: "/blocked/structure/"+structureId,
        type: "get",
        data: {}
      });
    
      request.done(function (response, textStatus, jqXHR) {
        console.log(response);
        $(".getId").html(response);
      })

      request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error(
          "Nous avons rencontré une erreur de programme: " +
          textStatus, errorThrown
        );
      })
    })

    //debut d'autorisation d'un etablissement
    $('.authorizeStructure').click(function () {

      $(".modal-authorize-message").html("");
      $(".btn_confirm").show();

      var structureId = $(this).parent().find('.structureId').attr('id');
      console.log(structureId);

     
      request = $.ajax({
        url: "/authorize/structure/"+structureId,
        type: "get",
        data: {}
      });
    
      request.done(function (response, textStatus, jqXHR) {
        console.log(response);
        $(".getId").html(response);
      })

      request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error(
          "Nous avons rencontré une erreur de programme: " +
          textStatus, errorThrown
        );
      })
    })

    //confirmation du l'authorisation
    /* $('.confirmAuthorizeStructure').click(function () {
      var structureId = document.getElementById("structureId").value;

      console.log(structureId);

      request = $.ajax({
        url: "/confirm/authorize/structure/"+structureId,
        type: "get",
        data: {}
      });
    
      request.done(function (response, textStatus, jqXHR) {
        console.log(response);
        $(".modal-authorize-message").html(response);
        $(".btn_confirm").hide();
      })

      request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error(
          "Nous avons rencontré une erreur de programme: " +
          textStatus, errorThrown
        );
      })
    })
 */

    //debut de suppresion d'une structure
    $('.deleteStructure').click(function () {
      var structureId = $(this).parent().find('.structureId').attr('id');

      request = $.ajax({
        url: "/delete/structure/"+structureId,
        type: "get",
        data: {}
      });
    
      request.done(function (response, textStatus, jqXHR) {
        console.log(response);
        $(".modal-block-message").html("");
        $(".getId").html(response);
      })

      request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error(
          "Nous avons rencontré une erreur de programme: " +
          textStatus, errorThrown
        );
      })
    })

    $('.get_user_info').click(function () {
      var user_id = $(this).parent().find('.userId').attr('id');
      console.log(user_id)

      request = $.ajax({
        url: "/get/userid/"+ user_id,
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

    $('.set_user').click(function () {
      var user_id = $(this).parent().find('.userId').attr('id');
      console.log(user_id)

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

      request = $.ajax({
        url: "/set/userid/"+ user_id,
        type: "get",
        data: {}
      });
    
      request.done(function (response, textStatus, jqXHR) {
        console.log(response);
        $(".modal-body-select").html(response.select);
        var first_name = document.getElementById('first_name');
        var last_name = document.getElementById('last_name');
        var phone = document.getElementById('phone');
        var email = document.getElementById('email');
        var user_id = document.getElementById('user_id');
        first_name.value=response.user["first_name"];
        last_name.value=response.user["last_name"];
        phone.value=response.user["phone"];
        email.value=response.user["email"];
        user_id.value=response.user["id"];
      })

      request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error(
          "Erreur: " +
          textStatus, errorThrown
        );
      })
    })


    // creer un nouveau user
    $('.get_select_role').click(function () {
      var role_id = $(this).parent().find('.role_id').attr('id');
      console.log(role_id , $(this).parent())
      $(".message").hide();
      $(".undefined").hide();

       //Supprimer les erreur notées sru les input
       var first_name = document.getElementById("create_first_name");
       var last_name = document.getElementById("create_last_name");
       var phone = document.getElementById("create_phone");
       var email = document.getElementById("create_email");
       first_name.className = "form-control";
       last_name.className = "form-control";
       phone.className = "form-control";
       email.className = "form-control";

      request = $.ajax({
        url: "/get/user/create/form/"+ role_id,
        type: "get",
        data: {}
      });
    
      request.done(function (response, textStatus, jqXHR) {
        console.log(response);
        $(".getselect").html(response);
        $(".show-register-btn").hide();
        $('.save-btn').show();
      })

      request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error(
          "Erreur: " +
          textStatus, errorThrown
        );
      })
    })

    // Enregistrement d'un nouveau user
    $('.save_user_created').click(function () {
      var first_name = document.getElementById('create_first_name').value;
      var last_name = document.getElementById('create_last_name').value;
      var phone = document.getElementById('create_phone').value;
      var email = document.getElementById('create_email').value;
      var role_id = document.getElementById('create_role_id').value;

      if(first_name.length === 0  || last_name.length === 0 || phone.length === 0  ||  email.length === 0 ){
        if(first_name.length === 0 ){
          var element = document.getElementById("create_first_name");
          element.className = "form-control border-danger";
        }

        if(last_name.length === 0 ){
          var element = document.getElementById("create_last_name");
          element.className = "form-control border-danger";
        }

        if(phone.length === 0 ){
          var element = document.getElementById("create_phone");
          element.className = "form-control border-danger";
        }

        if(email.length === 0 ){
          var element = document.getElementById("create_email");
          element.className = "form-control border-danger";
        }
        $(".undefined").show()
      }
      else{
        console.log(first_name,last_name,phone,email,role_id)
        let _token   = $('meta[name="csrf-token"]').attr('content');

        request = $.ajax({
          url: "/save/created/user",
          type: "post",
          data: {
                first_name : first_name,
                last_name :last_name,
                phone : phone,
                email : email,
                role_id : role_id,
              _token ,
          }
        });

        request.done(function (response, textStatus, jqXHR) {
          console.log(response);
          if(response.indice == 1){
              $(".message").html(response.email_error_message);
              $(".message").show()
          }
          if(response.indice == 2){
              $(".message").html(response.phone_error_message);
              $(".message").show()
          }
          if(response.indice == 3){
              $(".message").html(response.inconnu_error_message);
              $(".message").show()
          }
          if(response.indice == 4){
              $(".message").html(response.success_message);
              $(".message").show()
              $(".show-register-btn").show();
              $('.save-btn').hide();
          }

        })

        request.fail(function (jqXHR, textStatus, errorThrown) {
          console.error(
            "Erreur: " +
            textStatus, errorThrown
          );
        }) 
      }
    })

   //Autoriser la creation d'un user en affichant la touche enregsistrée btn-stop  create_new_phone refresh
    $('.show-register-btn').click(function () {
        $(".save-btn").show()
        $(".show-register-btn").hide();
        $(".message").hide()
    })

    $('.refresh_list').click(function () {
    
    })

    // enregistrement de modification du user
    $('.set_user_save').click(function () {
      var first_name = document.getElementById('first_name').value;
      var last_name = document.getElementById('last_name').value;
      var phone = document.getElementById('phone').value;
      var email = document.getElementById('email').value;
      var role_id = document.getElementById('role_id').value;
      var user_id = document.getElementById('user_id').value;

      if(first_name.length === 0  || last_name.length === 0 || phone.length === 0 || last_name.length === 0  || email.length === 0 ){
        if(first_name.length === 0 ){
          document.getElementById("first_name").className = "form-control is-invalid";
        }
        if(last_name.length === 0 ){
          document.getElementById("last_name").className = "form-control is-invalid";
        }

        if(phone.length === 0 ){
          document.getElementById("phone").className = "form-control is-invalid";
        }
        if(email.length === 0 ){
          var element = document.getElementById("email").className = "form-control is-invalid";
        }
        $(".undefined-error").show()
      }
      //On peut continuer si les données envoyées sont bonnes 
      else{
          console.log(first_name,last_name,phone,email,role_id,user_id)
          let _token   = $('meta[name="csrf-token"]').attr('content');
          request = $.ajax({
            url: "/set/save",
            type: "post",
            data: {
                  first_name : first_name,
                  last_name :last_name,
                  phone : phone,
                  email : email,
                  role_id : role_id,
                  user_id : user_id,
                _token ,
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

    //Enregistrement d'un nouveau code de paiement
    $('.save_payment_code').click(function () {
      var create_code = document.getElementById("create_code").value;
      var service_id = document.getElementById("service_id").value;
      console.log(create_code,service_id) 

      if(create_code.length < 4){
          $(".create_success").hide()
          $(".value_null_error").show()
          $(".value_exist_error").hide()
          document.getElementById('create_code').className="form-control is-invalid"
      }
      else{
          let _token   = $('meta[name="csrf-token"]').attr('content');
          request = $.ajax({
            url: "/create/code",
            type: "post",
            data: {
                  create_code ,service_id ,_token ,
            }
          });
        
          request.done(function (response) {
              console.log(response);
              if(response[0] == true){
                  $(".create_success").show()
                  $(".value_null_error").hide()
                  $(".value_exist_error").hide()
                  $(".save_btn").hide();
                  document.getElementById('create_code').className="form-control"
              }
              if(response[0] == false){
                  $(".create_success").hide()
                  $(".value_null_error").hide()
                  $(".value_exist_error").show()
                  $(".recreate_new_code").hide()
              }
              if(response[1] < 3){
                  $(".recreate_new_code").show()
              }
              if(response[1] == 3){
                  $(".recreate_new_code").hide()
                  $(".save_btn").hide();
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


    $('.recreate_new_code').click(function () {
        document.getElementById("create_code").className="form-control"
        document.getElementById("create_code").value=""
        $(".create_success").hide()
        $(".value_null_error").hide()
        $(".value_exist_error").hide()
        $(".save_btn").show();
    })

    $('.create_new_code').click(function () {
        $(".create_success").hide()
        $(".value_exist_error").hide()
        $(".value_null_error").hide()
        $(".recreate_new_code").hide()
        document.getElementById("create_code").className="form-control"
    })
});

  
 