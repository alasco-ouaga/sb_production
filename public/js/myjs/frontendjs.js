$(document).ready(function () {

    $('.verify-matricule').click(function () {

        var matricule = document.getElementById("matricule").value
        if(matricule ==''){
            $('.error-matricule').show();
        }
        console.log(matricule);

    })
    
    $('.verify-data').click(function () {
        var matricule_of_student = document.getElementById("matricule_of_student").value
        var email_of_parent = document.getElementById("email_of_parent").value
        var phone_of_parent = document.getElementById("phone_of_parent").value
    
        console.log(matricule_of_student,email_of_parent,phone_of_parent);
    
        if(matricule_of_student == '' || email_of_parent == '' || phone_of_parent == ''){
            $('.error-info').show();
        }
        
    })

    /* ...................affichage de la touche valider en fonction des conditions de selection.................... */
    $('.verified-select').click(function () {

        var indice = document.getElementById("choix_"+1).checked;
        var nb_display = document.getElementById("nb_display").value;
        var not_display=false;
        var disabled_btn = true;
        
        console.log(indice);
        console.log(nb_display);

        //verifier si pas de selection
        for (let pas = 1; pas <= nb_display; pas++) {
          if(document.getElementById("choix_"+pas).checked === true){
            //si selection touche non grisable
            disabled_btn = false;
          }
            //parcouri en arriere pour verifier si un des inputs n'est pas selectionner
        }

        if(disabled_btn === true){
          //si pas de selection grisée la touche
          console.log("la valeur d'erreur est :"+disabled_btn);
          $('.btn_control').hide();
          $('.btn_disabled').show();
        }
        else{
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
                  $('.btn_disabled').show();
                  break;
                }
                else{
                  $('.btn_disabled').hide();
                  $('.btn_control').show();
                }
              }
              else{
                not_display = true;
              }
          }
        }
      })


       
  $('.get-write').click(function () {
      var first_name = document.getElementById("first_name").value
      var last_name = document.getElementById("last_name").value
      var email = document.getElementById("email").value
      var phone = document.getElementById("phone").value
      var password = document.getElementById("password").value
      var password_confirm = document.getElementById("password_confirm").value

     console.log(first_name);
      if( first_name == '' || last_name == '' || phone == '' || email == ''|| password == '' || password_confirm == ''){
          $('.error').show();
      }
      
  })

  /* recharger directement visible */
  $('.image-manage').click(function(){
      const file_uploade_input = document.querySelector('#file_uploade_input');
      file_uploade_input.addEventListener('change',previewFile);

      
      function previewFile(){
        const file_extension_regex = /\.(jpeg|jpg|gif|png)$/i;

        //tester si le nom du fichier est null ou si le nom  selectionné contient jpg,jpeg,pnp,gif
        if (this.files.lenght === 0 || file_extension_regex.test(this.files[0].name) === false){
            return;
        }
        console.log('accepter');

        const file = this.files[0];
        const file_reader = new FileReader();
        file_reader.readAsDataURL(file);
        file_reader.addEventListener('load', (event) =>  displayImage(event,file));
      }

      function displayImage(event,file){
        const element = document.getElementById('image-selected')
        console.log(element);
        if(element != null){
          element.remove();
        }

        const figure_element = document.createElement('figure');
        figure_element.id = 'image-selected';


        const image_element = document.createElement('img');
        image_element.src = event.target.result;
        image_element.id = "imgage-selected";


        const figcaption_element = document.createElement('figcaption');
        figcaption_element.textContent = `Fichier selectionner: ${file.name}`;

        figure_element.appendChild(image_element);
        figure_element.appendChild(figcaption_element);

        
        $('#img').hide();
        $('.display').show();
        $('.btn-save').show();
        document.body.querySelector('.display').appendChild(figure_element);
      }

  })

  $('.get_input_value').click(function () {
      var create_code = document.getElementById("create_code").value;
      console.log(create_code);
      if( create_code ==""){
        $('.error').show();
      }
  })

  $('.get_secondclick_btn').click(function () {
    const indice = document.getElementById("flexRadioDefault2").checked;
    console.log(indice)
    if(indice == true){
      $('.btn1').hide();
      $('.btn2').show();
    }
  })

  $('.get_firstclick_btn').click(function () {
    const indice = document.getElementById("flexRadioDefault1").checked;
    console.log(indice)
    if(indice == true){
      $('.btn1').show();
      $('.btn2').hide();
    }
  })


});