$(document).ready(function () {
    $('.get_country_id').click(function () {
        var id = document.getElementById("country_id").value
        
        request = $.ajax({
            url: "/get/city/" + id,
            type: "get",
            data: {}
          });
        
        request.done(function (response, textStatus, jqXHR) {
            // console.log(response.city[0]["name"]);
            var selectElement = document.getElementById("city_id");
            selectElement.innerHTML = "";

            for(let i = 0 ;i < response.nb_city ; i++){
              var option = document.createElement("option");
              option.value = response.city[i]["id"];
              option.text = response.city[i]["name"];
              selectElement.add(option);
            }
          })
  
          request.fail(function (jqXHR, textStatus, errorThrown) {
            console.error(
              "The following error occurred: " +
              textStatus, errorThrown
            );
          })
    });

    //Recuperation des information d'un etabliessment
    $('.get_structure_info').click(function(){
      var structure_id = $(this).parent().parent().find('.structure_id').attr('id');
      console.log(structure_id)

      request = $.ajax({
        url: "/get/structure/" + structure_id,
        type: "get",
        data: {}
      });
    
      request.done(function (response, textStatus, jqXHR) {
        // console.log(response.city[0]["name"]);
        console.log(response)

        var get_name = document.getElementById("get_name");
        var get_email = document.getElementById("get_email");
        var get_postal = document.getElementById("get_postal");
        var get_slice = document.getElementById("get_slice");
        var get_country = document.getElementById("get_country");
        var get_city = document.getElementById("get_city");
        var get_gps = document.getElementById("get_gps");
        var get_web_link = document.getElementById("get_web_link");

        get_name.value = response.structure['name']
        get_email.value = response.structure['email']
        get_postal.value = response.structure['postal_box']
        get_slice.value = response.structure['nomber_of_slice']
        get_country.value = response.country
        get_city.value = response.city
        get_gps.value = response.structure['gps']
        get_web_link.value = response.structure['web_link']
      })
    });

    //Modification d'une structure
    $('.set_structure').click(function(){
      var structure_id = $(this).parent().parent().find('.structure_id').attr('id');

      var get_section_name = document.getElementById("set_name")
      get_section_name.className="form-control"
      
      var get_section_email = document.getElementById("set_email")
      get_section_email.className="form-control"

      var get_section_slice = document.getElementById("set_slice")
      get_section_slice.className="form-control"

      $('.email_error').hide()
      $('.name_error').hide()
      $('.slice_error').hide()

      console.log(structure_id)

      request = $.ajax({
        url: "/set/structure/" + structure_id,
        type: "get",
        data: {}
      });
    
      request.done(function (response, textStatus, jqXHR) {
        // console.log(response.city[0]["name"]);
        console.log(response)

        var set_name = document.getElementById("set_name");
        var set_email = document.getElementById("set_email");
        var set_postal = document.getElementById("set_postal");
        var set_slice = document.getElementById("set_slice");
        var set_country = document.getElementById("set_country");
        var set_city = document.getElementById("set_city");
        var set_gps = document.getElementById("set_gps");
        var set_web_link = document.getElementById("set_web_link");
        var structure_id = document.getElementById("structure_id");

        set_name.value = response.structure['name']
        set_email.value = response.structure['email']
        set_postal.value = response.structure['postal_box']
        set_slice.value = response.structure['nomber_of_slice']
        structure_id.value = response.structure['id']
  
        set_gps.value = response.structure['gps']
        set_web_link.value = response.structure['web_link']

        var select_set_country = document.getElementById("country_id");
        var select_set_city = document.getElementById("city_id");

        select_set_country.innerHTML = "";
        select_set_city.innerHTML = "";

        // charger les option du select dont l'id est set_country
        for(let i = 0 ;i < response.nb_country ; i++){
          var option = document.createElement("option");
          console.log(response.countries[i]["id"])
          option.value = response.countries[i]["id"];
          option.text = response.countries[i]["name"];
          select_set_country.add(option);
        }

        // charger les option du select dont l'id est set_city
        for(let i = 0 ;i < response.nb_city ; i++){
          var option = document.createElement("option");
          option.value = response.cities[i]["id"];
          option.text = response.cities[i]["name"];
          select_set_city.add(option);
        }

      })
    });

    //confirmation de la modification d'un etablissement $('.set_structure').click(function(){
    $('.confirm_set_structure').click(function(){
        const set_name = document.getElementById("set_name").value
        const set_email = document.getElementById("set_email").value
        const set_postal = document.getElementById("set_postal").value
        const set_slice = document.getElementById("set_slice").value
        const structure_id = document.getElementById("structure_id").value
        const city_id = document.getElementById("city_id").value
        const set_gps = document.getElementById("set_gps").value
        const set_web_link = document.getElementById("set_web_link").value
        console.log(structure_id)
        
        if(set_name == "" || set_email =="" || set_slice == ""){

          if(set_name == ""){
              var get_section_name = document.getElementById("set_name")
              get_section_name.className="form-control is-invalid"
              $('.name_error').show()
          }

          if(set_email == ""){
            var get_section_email = document.getElementById("set_email")
            get_section_email.className="form-control is-invalid"
            $('.email_error').show()
          }

          if(set_slice == ""){
            var get_section_slice = document.getElementById("set_slice")
            get_section_slice.className="form-control is-invalid"
            $('.slice_error').show()
          }
        }
        else{
          let _token   = $('meta[name="csrf-token"]').attr('content');
          request = $.ajax({
            url: "/confirm/update/Structure",
            type: "post",
            data: {
              name :set_name,
              email :set_email,
              postal_box :set_postal,
              structure_id : structure_id,
              city_id :city_id,
              gps :set_gps,
              web_link : set_web_link,
              slice :set_slice,
              _token : _token
            }
          });

          request.done(function (response, textStatus, jqXHR) {
            console.log(response)
            if(response.email_exist_error == true){
              $('.success').hide()
              $('.email_exist_error').show()
              $('.name_exist_error').hide()

            }
            else if(response.name_exist_error == true){
              $('.success').hide()
              $('.email_exist_error').hide()
              $('.name_exist_error').show()
            }
            else if (response.success == true) {
              $('.success').show()
              $('.email_exist_error').hide()
              $('.name_exist_error').hide()
            }
          });
              
        }
    });

     $('.verify_select').click(function () {
      const nbclass = document.getElementById('nb_classe').value
      var accept = false;

      //verifier si une classe a été selectionnée
      for(let i =0 ;i < nbclass ; i++){
        if(document.getElementById('classe_'+i).checked === true){
            var accept = true;
            break;
        }
      }

      if(accept === false){
         $('.disable_btn').show()
         $('.access_btn').hide()
      }else{
          $('.disable_btn').hide()
          $('.access_btn').show()
      }
     });

     $('.create_classe').click(function () {
      const classe_id = $(this).parent().find('.classe_id').attr('id');
      const cycle_id = $(this).parent().find('.cycle_id').attr('id');
      const filiere_id = $(this).parent().find('.filiere_id').attr('id');
      const nbslice = $(this).parent().find('.nbslice').attr('id');
      const classe_name = $(this).parent().find('.classe_name').attr('id');
      console.log("class_id :"+classe_id, "cycle_id : "+cycle_id, "filiere_id : "+filiere_id, "nbslice_id : "+nbslice)

      //recuperation du div dans lequel je voudrais injecter mes données
      const parentElement = document.getElementById("modal-body")
      $(".get_classe_data").show()
      $(".success_message").hide()

      //effacer son contenu
      parentElement.innerHTML =""

      //creation d'un grande titre
      const classeLabel = document.createElement("label")
      const br = document.createElement("br")

      //Remplir le contenu du label
      classeLabel.appendChild(document.createTextNode("Classe : " + classe_name))
      classeLabel.className="text-uppercase gras italic mb-2 mt-3 undderline"
      classeLabel.style="color:blue"

      //trianer avec les données envoyées
      const inputCycleId = document.createElement("input")
      const inputFiliereId = document.createElement("input")
      const inputClasseId = document.createElement("input")
      const inputSlice = document.createElement("input")

      //cycle_id
      inputCycleId.type = "hidden"
      inputCycleId.id = "cycle_id"
      inputCycleId.value=cycle_id

      //classe_id
      inputClasseId.type = "hidden"
      inputClasseId.id = "classe_id"
      inputClasseId.value=classe_id

      //filiere_id
      inputFiliereId.type = "hidden"
      inputFiliereId.id = "filiere_id"
      inputFiliereId.value=filiere_id

      //filiere_id
      inputSlice.type = "hidden"
      inputSlice.id = "nb_slice"
      inputSlice.value=nbslice

      //injecter ce titre dans mon div recuperer ci-dessu
      parentElement.appendChild(classeLabel)
      parentElement.appendChild(br)

      //injection de certain id important dans le document
      parentElement.appendChild(inputClasseId)
      parentElement.appendChild(br)
      parentElement.appendChild(inputCycleId)
      parentElement.appendChild(br)
      parentElement.appendChild(inputFiliereId)
      parentElement.appendChild(br)
      parentElement.appendChild(inputSlice)
      parentElement.appendChild(br)

      console.log(parentElement)

      //Creation des elements pour l'affichage des differentes tranches
      if(nbslice != 0) {
          for(let i=1 ; i<=nbslice ; i++ ){
              var newLabel = document.createElement("label")
              newLabel.appendChild(document.createTextNode("Tranche "+i));
              newLabel.className = "text-uppercase gras italic mb-2 mt-3";

              var newInput = document.createElement("input")
              newInput.type = "number"
              newInput.className = "form-control"
              newInput.id = "tranche_"+i
              newInput.value =10000

              parentElement.appendChild(newLabel);
              parentElement.appendChild(newInput)
          }
      }


     });

     //Recuperation des données sur une classe pour l'enregistrement
     $('.get_classe_data').click(function () {
      const classe_id = document.getElementById("classe_id").value
      const cycle_id = document.getElementById("cycle_id").value
      const filiere_id = document.getElementById("filiere_id").value
      const nb_slice = document.getElementById("nb_slice").value
      console.log("classe_id :"+classe_id, "cycle_id : "+cycle_id, "filiere_id : "+filiere_id, "nbslice_id : "+nb_slice)

      let tableTranche = []

      //Mettre toutes les tanche saisie dans un tableau
      for(let i=1 ; i<=nb_slice ; i++){
          var trancheValue = document.getElementById("tranche_"+i).value
          tableTranche.push(trancheValue)
      }
      console.log(tableTranche)

        let _token   = $('meta[name="csrf-token"]').attr('content');
        request = $.ajax({
          url: "/get/classe/to/create",
          type: "post",
          data: {
              cycle_id : cycle_id,
              filiere_id : filiere_id,
              classe_id : classe_id,
              tableTranche : tableTranche,
              _token : _token,
            }
      });

      request.done(function (response, textStatus, jqXHR) {
         console.log("reussi :" + response)
         console.log("classe_id : " + classe_id)
         const element = document.getElementById("classe_"+classe_id)
         console.log(element)
         element.className="hide"
         $(".get_classe_data").hide()
         $(".success_message").show()
      });

      request.fail(function (response, textStatus, jqXHR) {
         console.log("erreur"+response)
      });
     });
     
     
     //reuperer les tranches de paiement pour modification
     $('.get_classe_slice').click(function () {
        const classe_id =$(this).parent().find('.classe_id').attr('id');
        console.log(classe_id)
         $('.save_update_data').show()
        $('.update_message').hide()
        $('.modal-footer').hide()

        //recuperation du div dans lequel je voudrais injecter mes données
        const parentElement = document.getElementById("modal-body")

        request = $.ajax({
            url: "/get/slice/to/show/" + classe_id,
            type: "get",
            data: {}
        });

        request.done(function (response, textStatus, jqXHR) {
          console.log("reussi :" + response)
          const tabSlice = response.slice;
          const name = response.name;
          const nbslice = response.nbSlice;
          const classe_id = response.classe_id;

          //recuperation du div dans lequel je voudrais injecter mes données
          const parentElement = document.getElementById("update-modal-body")
          parentElement.innerHTML =""

          var theLabel = document.createElement("label")
          theLabel.className = "text-uppercase text-center gras italic mb-2 mt-3"
          theLabel.style="color:blue"

          //Affichage du nom de l'atablissement
          theLabel.appendChild(document.createTextNode(name));
          parentElement.appendChild(theLabel);
          const br = document.createElement("br")
          parentElement.appendChild(br);

          //recuperation du nombre de trance de la classe
          var newInput = document.createElement("input")
          newInput.type = "hidden"
          newInput.value = nbslice
          newInput.id = "nbslice"
          parentElement.appendChild(newInput);

          //recuperation du nombre de trance de la classe
          var newInput = document.createElement("input")
          newInput.type = "hidden"
          newInput.id = "update_classe_id"
          newInput.value = classe_id
          parentElement.appendChild(newInput);
          $('.modal-footer').show()

          //Recuperer les les cout de tranches
          if(nbslice != 0) {
            for(let i=0 ; i<nbslice ; i++ ){
                var newLabel = document.createElement("label")
                var u = i
                u++
                newLabel.appendChild(document.createTextNode("Tranche "+u));
                newLabel.className = "text-uppercase gras italic mb-2 mt-3";

                var newInput = document.createElement("input")
                newInput.type = "number"
                newInput.className = "form-control"
                newInput.id = "tranche_"+u
                newInput.value =tabSlice[i]

                parentElement.appendChild(newLabel);
                parentElement.appendChild(newInput)
            }
          }
        });

        request.fail(function (response, textStatus, jqXHR) {
          console.log("erreur"+response)
        });
     
     });

     //reuperer les tranches de paiement pour affichage
     $('.show_classe_slice').click(function () {
        const classe_id =$(this).parent().find('.classe_id').attr('id');
        console.log("classe_id" + classe_id)

        //recuperation du div dans lequel je voudrais injecter mes données
        const parentElement = document.getElementById("modal-body")

        request = $.ajax({
            url: "/get/slice/to/show/" + classe_id,
            type: "get",
            data: {}
        });

        request.done(function (response, textStatus, jqXHR) {
          console.log("reussi :" + response.nbSlice)
          const tabSlice = response.slice;
          const name = response.name;
          const nbslice = response.nbSlice;
          const classe_id = response.classe_id

          console.log("nbslice fct1 : " + nbslice)

          //recuperation du div dans lequel je voudrais injecter mes données
          const parentElement = document.getElementById("view-modal-body")
          parentElement.innerHTML =""

          var theLabel = document.createElement("label")
          theLabel.className = "text-uppercase text-center gras italic mb-2 mt-3"
          theLabel.style="color:blue"

          //Affichage du nom de l'atablissement
          theLabel.appendChild(document.createTextNode(name));
          parentElement.appendChild(theLabel);
          const br = document.createElement("br")
          parentElement.appendChild(br);

          //recuperation du nombre de trance de la classe
          var newInput = document.createElement("input")
          newInput.type = "hidden"
          newInput.value = nbslice
          newInput.id = "nbslice"
          parentElement.appendChild(newInput);

          //recuperation du nombre de trance de la classe
          var Input = document.createElement("input")
          Input.type = "hidden"
          Input.id = "update_classe_id"
          Input.value = classe_id
          parentElement.appendChild(Input);

          //Recuperer les les cout de tranches
          if(nbslice != 0) {
            for(let i=0 ; i<nbslice ; i++ ){
                var newLabel = document.createElement("label")
                var u = i
                u=i+1
                newLabel.appendChild(document.createTextNode("Tranche "+u));
                newLabel.className = "text-uppercase gras italic mb-2 mt-3";

                var newInput = document.createElement("input")
                newInput.type = "number"
                newInput.className = "form-control gras text-uppercase"
                newInput.readOnly=true
                newInput.id = "tranche_"+u
                newInput.value =tabSlice[i]

                parentElement.appendChild(newLabel);
                parentElement.appendChild(newInput)
            }
          }
        });

        request.fail(function (response, textStatus, jqXHR) {
          console.log("erreur"+response)
        });
     });


     //Modification de tranche de paiement
    $('.save_update_data').click(function () {
        const classe_id = document.getElementById("update_classe_id").value
        const nbslice = document.getElementById("nbslice").value

        let tableTranche = []
        console.log("nbslice fct2 : " + nbslice)

        //Mettre toutes les tanche saisie dans un tableau
        for(let i=1 ; i<=nbslice ; i++){
            var trancheValue = document.getElementById("tranche_"+i).value
            tableTranche.push(trancheValue)
            console.log(tableTranche)
        }

        let _token   = $('meta[name="csrf-token"]').attr('content');
        request = $.ajax({
            url: "/save/update/slice",
            type: "post",
            data: {
                nbslice : nbslice,
                classe_id : classe_id,
                tableTranche : tableTranche,
                _token : _token
            }
        });

        request.done(function (response, textStatus, jqXHR) {
           console.log(response)
           if(response == true ){
            $('.save_update_data').hide()
            $('.update_message').show()
           }
        });

        request.fail(function (response, textStatus, jqXHR) {
          console.log("erreur"+response)
        });
     });

    /* Affichage sur etudiant */
    $('.get_student_data').click(function () {
        const id = $(this).parent().find('.update_student').attr('id');
        console.log(id);

        /*  message de retour */
        $(".msg_first_name").hide()
        $(".msg_last_name").hide()
        $(".msg_matricule").hide()
        $(".msg_academy_year").hide()
        $(".msg_date_of_birth").hide()
        $(".msg_residence").hide()
        $(".msg_place_of_birth").hide()
        $(".msg_nationality").hide()
        $(".msg_student_phone").hide()
        $(".msg_parent_phone").hide()

        /* correction des erreurs  */
        var first_name = document.getElementById("first_name")
        var last_name = document.getElementById("last_name")
        var matricule = document.getElementById("matricule")
        var academy_year = document.getElementById("academy_year")
        var date_of_birth = document.getElementById("date_of_birth")
        var residence = document.getElementById("residence")
        var place_of_birth = document.getElementById("place_of_birth")
        var nationality = document.getElementById("nationality")
        first_name.className="form-control"
        last_name.className="form-control"
        matricule.className="form-control"
        academy_year.className="form-control"
        date_of_birth.className="form-control"
        residence.className="form-control"
        place_of_birth.className="form-control"
        nationality.className="form-control"

        request = $.ajax({
            url: "/get/student/data/" + id,
            type: "get",
            data: {}
        });

        request.done(function (response, textStatus, jqXHR) {
           console.log(response.first_name)
           var first_name = document.getElementById('first_name')
           var last_name = document.getElementById('last_name')
           var matricule = document.getElementById('matricule')
           var academy_year = document.getElementById('academy_year')
           var residence = document.getElementById('residence')
           var date_of_birth = document.getElementById('date_of_birth')
           var place_of_birth = document.getElementById('place_of_birth')
           var nationality = document.getElementById('nationality')
           var student_phone = document.getElementById('student_phone')
           var parent_phone = document.getElementById('parent_phone')
           var student_id = document.getElementById('student_id')
           var show_date_of_birth = document.getElementById('show_date_of_birth')
           
           first_name.value=response.first_name;
           last_name.value=response.last_name;
           matricule.value=response.matricule;
           academy_year.value=response.academy_year;
           residence.value=response.residence;
           date_of_birth.value=response.date_of_birth;
           show_date_of_birth.value=response.date_of_birth;
           place_of_birth.value=response.birthplace;
           nationality.value=response.nationality;
           student_phone.value=response.phone_of_student;
           parent_phone.value=response.phone_of_parent;
           student_id.value=response.id;

        });

        request.fail(function (response, textStatus, jqXHR) {
          console.log("erreur"+response)
        });
    })//fin

    /* Affichage sur etudiant */
    $('.show_student_data').click(function () {
         const id = $(this).parent().find('.view_student').attr('id');
         console.log("id recupere est :"+id);

        request = $.ajax({
            url: "/get/student/data/" + id,
            type: "get",
            data: {}
        });

        request.done(function (response, textStatus, jqXHR) {
           console.log(response.first_name)
           var first_name = document.getElementById('view_first_name')
           var last_name = document.getElementById('view_last_name')
           var matricule = document.getElementById('view_matricule')
           var academy_year = document.getElementById('view_academy_year')
           var residence = document.getElementById('view_residence')
           var date_of_birth = document.getElementById('view_date_of_birth')
           var place_of_birth = document.getElementById('view_place_of_birth')
           var nationality = document.getElementById('view_nationality')
           var student_phone = document.getElementById('view_student_phone')
           var parent_phone = document.getElementById('view_parent_phone')
           var student_id = document.getElementById('view_student_id')
           
           first_name.value=response.first_name;
           last_name.value=response.last_name;
           matricule.value=response.matricule;
           academy_year.value=response.academy_year;
           residence.value=response.residence;
           date_of_birth.value=response.date_of_birth;
           place_of_birth.value=response.birthplace;
           nationality.value=response.nationality;
           student_phone.value=response.phone_of_student;
           parent_phone.value=response.phone_of_parent;

        });

        request.fail(function (response, textStatus, jqXHR) {
          console.log("erreur"+response)
        });
    })//fin

    $('.update_student_data').click(function () {
        var id = document.getElementById('student_id').value
        var first_name = document.getElementById('first_name').value
        var last_name = document.getElementById('last_name').value
        var matricule = document.getElementById('matricule').value
        var academy_year = document.getElementById('academy_year').value
        var residence = document.getElementById('residence').value
        var date_of_birth = document.getElementById('date_of_birth').value
        var place_of_birth = document.getElementById('place_of_birth').value
        var nationality = document.getElementById('nationality').value
        var student_phone = document.getElementById('student_phone').value
        var parent_phone = document.getElementById('parent_phone').value

        if(first_name == "" || last_name == "" || matricule == "" || academy_year == "" || residence == "" || date_of_birth == "" || place_of_birth == "" || nationality == "" || student_phone == "" || parent_phone == "" || parent_phone == "" ){
            if(first_name == ""){
                var indice = document.getElementById("first_name")
                indice.className="is-invalid form-control"
                $(".msg_first_name").show()
            }
            if(last_name == ""){
                var indice = document.getElementById("last_name")
                indice.className="is-invalid form-control"
                $(".msg_last_name").show()
            }
            if(matricule == ""){
                var indice = document.getElementById("matricule")
                indice.className="is-invalid form-control"
                $(".msg_matricule").show()
            }
            if(academy_year == ""){
                var indice = document.getElementById("academy_year")
                indice.className="is-invalid form-control"
                $(".msg_academy_year").show()
            }
            if(date_of_birth == ""){
                var indice = document.getElementById("date_of_birth")
                indice.className="is-invalid form-control"
                $(".msg_date_of_birth").show()
            }
            if(residence == ""){
                var indice = document.getElementById("residence")
                indice.className="is-invalid form-control"
                $(".msg_residence").show()
            }
            if(place_of_birth == ""){
                var indice = document.getElementById("place_of_birth")
                indice.className="is-invalid form-control"
                $(".msg_place_of_birth").show()
            }
            if(nationality == ""){
                var indice = document.getElementById("nationality")
                indice.className="is-invalid form-control"
                $(".msg_nationality").show()
            }
            if(student_phone == ""){
                var indice = document.getElementById("student_phone")
                indice.className="is-invalid form-control"
                $(".msg_student_phone").show()
            }
            if(parent_phone == ""){
                var indice = document.getElementById("parent_phone")
                indice.className="is-invalid form-control"
                $(".msg_parent_phone").show()
            }
          console.log(" L'idee est : "+id);
        }
        else{
          let _token   = $('meta[name="csrf-token"]').attr('content');
          request = $.ajax({
              url: "/student/update/data/",
              type: "post",
              data: {
                    id : id,
                    first_name : first_name,
                    last_name : last_name,
                    matricule : matricule,
                    academy_year : academy_year,
                    residence : residence,
                    date_of_birth : date_of_birth,
                    place_of_birth : place_of_birth,
                    nationality : nationality,
                    student_phone : student_phone,
                    parent_phone : parent_phone,
                    _token : _token
              }
          });
          request.done(function (response, textStatus, jqXHR) {
            console.log("operation reussie " + response)
            if(response == true){
              /* message pour modification */
              $(".success_msg").show()
              $(".denied_msg").hide()

              /*  message de retour */
              $(".msg_first_name").hide()
              $(".msg_last_name").hide()
              $(".msg_matricule").hide()
              $(".msg_academy_year").hide()
              $(".msg_date_of_birth").hide()
              $(".msg_residence").hide()
              $(".msg_place_of_birth").hide()
              $(".msg_nationality").hide()
              $(".msg_student_phone").hide()
              $(".msg_parent_phone").hide()

              /* correction des erreurs  */
              var first_name = document.getElementById("first_name")
              var last_name = document.getElementById("last_name")
              var matricule = document.getElementById("matricule")
              var academy_year = document.getElementById("academy_year")
              var date_of_birth = document.getElementById("date_of_birth")
              var residence = document.getElementById("residence")
              var place_of_birth = document.getElementById("place_of_birth")
              var nationality = document.getElementById("nationality")
              first_name.className="form-control"
              last_name.className="form-control"
              matricule.className="form-control"
              academy_year.className="form-control"
              date_of_birth.className="form-control"
              residence.className="form-control"
              place_of_birth.className="form-control"
              nationality.className="form-control"
            }
          });
          request.fail(function (response, textStatus, jqXHR) {
            console.log("erreur"+response)
          });
        }
    })//fin

    $('.get_date_carte').click(function () {
        var date = document.getElementById('date_of_birth')
        date.type="date"
        $(".show_date").show()
        
        //reconnaissance de l'approche de sourie
        document.getElementById("date_of_birth").addEventListener("mouseover", function() {
          console.log("La souris se rapproche de mon_element");
        });
        
        /* setTimeout(() => {
              span.remove();
            }, 40000);
            sessionStorage.setItem('disp_msg',true); */
    })

     $('.show_date').click(function () {
        var date = document.getElementById('date_of_birth')
        var dateText= document.getElementById('show_date_of_birth').value
        console.log("recu"+dateText)
        date.type="text"
        date.value=dateText
        $(".show_date").hide()
    })


    /* Enregistre la modification sur pour un users */
    $('.save_student_update_data').click(function () {
      const id = document.getElementById("student_id").value
      console.log('id recupere est :'+id)

      const cycle_id = document.getElementById("cycle_id").value
      
      let tableTranche = []

      //Mettre toutes les tanche saisie dans un tableau
      for(let i=1 ; i<=nb_slice ; i++){
          var trancheValue = document.getElementById("tranche_"+i).value
          tableTranche.push(trancheValue)
      }
      console.log(tableTranche)

        let _token   = $('meta[name="csrf-token"]').attr('content');
        request = $.ajax({
          url: "/get/classe/to/create",
          type: "post",
          data: {
              cycle_id : cycle_id,
              filiere_id : filiere_id,
              classe_id : classe_id,
              tableTranche : tableTranche,
              _token : _token,
            }
      });

      request.done(function (response, textStatus, jqXHR) {
         console.log("reussi :" + response)
         console.log("classe_id : " + classe_id)
         const element = document.getElementById("classe_"+classe_id)
         console.log(element)
         element.className="hide"
         $(".get_classe_data").hide()
         $(".success_message").show()
      });

      request.fail(function (response, textStatus, jqXHR) {
         console.log("erreur"+response)
      });
     });


      $('.imprimerTableau').click(function () {
        function imprimerTableau(tableauId) {
          // Créer une copie du tableau
          var tableauCopie = $("#" + tableauId).clone();
          
          // Créer un élément temporaire div caché pour le contenu imprimable
          var divImprimable = $("<div>").append(tableauCopie).css("display", "none");
          
          // Ajouter le div à la page
          $("body").append(divImprimable);
          
          // Imprimer le contenu du div
          divImprimable.print();
          
          // Supprimer le div après l'impression
          divImprimable.remove();
        }
        // Exemple d'utilisation : supposons que vous ayez un tableau avec l'ID "monTableau" dans votre document HTML

        imprimerTableau("monTableau");
      })
});