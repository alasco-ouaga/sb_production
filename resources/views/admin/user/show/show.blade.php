@extends('layouts.admin.app')
@section('content')
@if($compter != 0)
<div class="container card">
   <!--  Tables des administrateurs -->
   <div class="row gesiton_titre mb-2 text-uppercase text_italic py-2"> Liste des agents ({{$compter}}) : {{$role_name}} </div>

    <div class="container mt-4 mb-4">
        <div class="container  text-center">

                @if(Session()->has('blocked_success'))
                    <div class="row text_gras text_red" role="alert">
                          {{ Session()->get('blocked_success') }}
                    </div>
                @endif

                @if(Session()->has('blocked_denied'))
                    <div class="row text_gras text_red" role="alert">
                          {{ Session()->get('blocked_denied') }}
                    </div>
                @endif

                @if(Session()->has('authaurize_success'))
                    <div class="row text_gras text_blue" role="alert">
                          {{ Session()->get('authaurize_success') }}
                    </div>
                @endif

                @if(Session()->has('authaurize_denied'))
                    <div class="row text_gras text_blue" role="alert">
                          {{ Session()->get('authaurize_denied') }}
                    </div>
                @endif

                @if(Session()->has('delete_success'))
                    <div class="row text_gras text_blue">
                        {{ Session()->get('delete_success') }}
                    </div>
                @endif

                @if(Session()->has('delete_denied'))
                    <div class="row text_gras text_red">
                        {{ Session()->get('delete_denied') }}
                    </div>
                @endif

                <div class="set-success row "></div>
                <div class="refresh-message row hide alert alert-success " role="alert"> Actualiser la page pour voir de nouvel enregistrement </div>
        </div>

        <div class="mb-2">
            <form action="">
                    <button  type=""  class="btn float-end mb-2 " > <i class="fa-solid fa-arrows-rotate"></i></button>
            </form>
            <input class="role_id" type="hidden" id="{{ $role_name }}">
            <button type="button" class="btn float-end mb-2  get_role_to_create_user" data-bs-toggle="modal" data-bs-target="#createUserModal">
                <i class="fa-solid fa-user-plus"></i>
            </button>
        </div>

        <div class="">
            <table class="table  table-responsive-md">
                <thead>
                    <tr>
                        <th scope="col">Num </th>
                        <th scope="col">Agents</th>
                        <th scope="col">Action </th>
                        <th scope="col">Permission</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $num =0;
                    @endphp
                    @foreach($users as $user)
                        @php
                            $num ++;
                        @endphp
                        <tr>
                            <td>
                                {{ $num }}
                            </td>
                            <td>
                                {{ $user->first_name }} {{ $user->last_name }} <br>
                                {{$user->phone}} <br>
                                @if($user->access == true)
                                    <span class="text_gras text_blue" >authorisé </span>
                                @else
                                    <span  class="text_gras text_red"> refusé </span>
                                @endif

                            </td>
                            <td>
                            <div class="row">
                                    <div class="col-xl-2 col-lg-2 ">
                                        <input type="hidden"class="userId" id="{{$user->id}}" name="user_id" value="{{$user->id}}" >
                                        <button type="button" class="btn get_user_info" data-bs-toggle="modal" data-bs-target="#get-user-info">
                                                <i class="fa-solid fa-eye" > </i>
                                        </button>
                                    </div>

                                    <div class="col-xl-2 col-lg-2 ">
                                        <input type="hidden"class="userId" id="{{$user->id}}" name="user_id" value="{{$user->id}}" >
                                        <button type="button" class="btn get_user_data_to_update" data-bs-toggle="modal" data-bs-target="#UpdateModalCenter">  
                                            <i class="fa fa-user-edit"></i>
                                        </button>
                                    </div>

                                    <div class="col-xl-2 col-lg-2 ">
                                        <i onclick="if(confirm('Confirmez vous la suppression de cet ?')) {document.getElementById('form-{{$user->id}}').submit()}" class="btn"> <i class="fa-solid fa-trash" style="color:red"></i></i>
                                        <form action="{{route('user_delete',$user->id)}}" id="form-{{$user->id}}" method="get" >
                                            @csrf
                                        </form>
                                    </div>

                                </div>
                            </td>

                            <td>
                                @if($user->access == true)
                                    <button class="btn gras" onclick="if(confirm('Confirmer vous la suspension de  cet utilisateur ?'))
                                            {document.getElementById('form-block-{{$user->id}}').submit()}">
                                            <i class="fa fa-user-lock"> </i>  <span class="px-3 text_red text_gras"> bloquer</span> 
                                    </button>
                                    
                                    <form id="form-block-{{$user->id}}" action="{{route('user_blocked' , $user->id)}}" method="get" >@csrf</form>
                                @else
                                    <button class="btn gras" onclick="if(confirm('Confirmer la suppression de cet Secretaire?'))
                                            {document.getElementById('form-block-{{$user->id}}').submit()}"> 
                                            <i class="fas fa-user-check"></i> 
                                            <span class="px-3 text_blue text_gras">autoriser</span>  
                                    </button>
                                    <form id="form-block-{{$user->id}}" action="{{route('user_authaurize',$user->id )}}" method="get" >@csrf</form>
                                @endif
                            </td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
  </div>
@else
<div class="container text-center">
    <div class="row mt-4">
        <span class="text_red text_gras mt-4 size_x_large"> Données introuvables : actualiser la page</span>
    </div>
</div>
@endif

<!-- Modal pour voir les informations du user -->
<div class="modal fade black" id="get-user-info" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="get-user-info-label" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text_gras">DETAIL</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container mt-1 time-new-rooman"> 
            <div class="row mt-3">
                <div class="col-xl-6 col-lg-6">
                    <label for="" class="text_gras"> NOM </label>
                    <span class="form-control" id="get_first_name" >  </span>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <label for="" class="text_gras"> PRENOM </label>
                    <span class="form-control" id="get_last_name">  </span>
                </div>
            </div>
            <div class="row mt-2" >
                <div class="">
                    <label for="" class="text_gras"> PHONE  </label>
                    <span  class="form-control"  id="get_phone"> </span>
                </div>
            </div>

            <div class="row mt-2" >
                <div class="">
                    <label for="" class="text_gras">  EMAIL </label>
                    <span  class="form-control" id="get_email">  </span>
                </div>
            </div>

            <div class="row mt-2" >
                <div class="">
                    <label for="" class="text_gras">  LOCALITE </label>
                    <span class="form-control" id="get_locality">  </span>
                </div>
            </div>

            <div class="row mt-2" >
                <div class="">
                    <label for="" class="text_gras">  ROLE </label>
                    <span class="form-control text-uppercase" id="get_role_name">  </span>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal pour creer un nouveau user -->
<div class="modal fade black" id="createUserModal" tabindex="-1" aria-labelledby="createUserModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 gras text_gras">NOUVEL AGENT</h1>
        <button type="button" class="btn-close  btn-stop" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="container mt-1 time-new-rooman">
                <div class="row">
                    <span class="text_blue text_gras hide user_create_success hide">L'agent a été ajouté avec succès (password ci-dessous) </span>
                </div>
                <div class="row mt-2">
                    <div class="container  create_password hide">
                        <span class="form-control text-center text_gras text_red " id="create_password" ></span> 
                    </div>
                </div>
                <div class="row">
                    <span class="text_red text_gras hide user_create_denied hide">Echec : Attention, cet email est deja utilisé </span>
                </div>
                <div class="row mt-3">
                    <div class="col-xl-6 col-lg-6 mt-2">
                        <label for="" class="text_gras"> NOM </label>
                        <input  type="text" class="form-control" id="create_first_name" value="Ilboudo" require >  </input>
                        <span class="text_red hide create_first_name_null"> Le nom est demandé </span>
                    </div>
                    <div class="col-xl-6 col-lg-6 mt-2">
                        <label for="" class="text_gras"> PRENOM </label>
                        <input type="text" class="form-control" id="create_last_name" value="Alassane" require >  </input>
                        <span class="text_red hide create_last_name_null"> Le prenom est demandé </span>
                    </div>
                </div>
                <div class="row mt-2" >
                    <div class="">
                        <label for="" class="text_gras"> PHONE  </label>
                        <input type="text" class="form-control"  id="create_phone" value="78451236" require  > </input>
                        <span class="text_red hide create_phone_null"> Le telephone est demandé </span>
                    </div>
                </div>
                <div class="row mt-2" >
                    <div class="">
                        <label for="" class="text_gras">  EMAIL </label>
                        <input type="email"  class="form-control" id="create_email" value="lasso@gmail.com" require >  </input>
                        <span class="text_red hide create_email_null"> L'email est demandé </span>
                    </div>
                </div>
                <div class="row mt-2" >
                    <div class="">
                        <label for="" class="text_gras">  LOCALITE </label>
                        <input type="email"  class="form-control" id="create_locality" value="Gaoua"require >  </input>
                        <span class="text_red hide create_locality_null"> La localité est demandé </span>
                    </div>
                </div>
                <div class="row mt-2 mb-3" >
                    <div class="create-modal-body-select" >
                        <label for="" class="text_gras">  ROLE </label>
                        <select name="" class="form-control" id="create_role_id">

                        </select>
                    </div>
                </div>
                <div class="row mt-2 " >
                    <div class="getselect"></div>
                </div>
                <div class="row ">
                    <div class="message"></div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary  " data-bs-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary  user_create_save save-btn">Enregistre</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal pour modification -->
<div class="modal fade black" id="UpdateModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title gras" id="exampleModalLongTitle">MODIFICATION</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container mt-1 ">
            <div class="row mt-3">
                <input  type="hidden" id="user_id"  value=""> </input>
                <div class="col-xl-6 col-lg-6">
                    <label for="" class="text_gras"> NOM </label>
                    <input  type="text" class="form-control  first_name" id="first_name"  require value="" >  </input>
                    <span class="text_red hide first_name_null"> Le nom est demandé </span>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <label for="" class="text_gras"> PRENOM </label>
                    <input type="text" class="form-control  last_name" id="last_name" require value="">  </input>
                    <span class="text_red hide last_name_null"> Le prenom est demandé </span>
                </div>
            </div>
            <div class="row mt-2" >
                <div class="">
                    <label for="" class="text_gras"> PHONE  </label>
                    <input type="text" class="form-control  phone"  id="phone" require value=""> </input>
                    <span class="text_red hide phone_null"> Le telepnone est demandé </span>
                </div>
            </div>
            <div class="row mt-2" >
                <div class="">
                    <label for="" class="text_gras">  EMAIL </label>
                    <input type="text"  class="form-control  email" id="email" require value="">  </input>
                </div>
            </div>
            <div class="row mt-2" >
                <div class="">
                    <label for="" class="text_gras">  LOCALITE </label>
                    <input type="text"  class="form-control  email" id="locality" require value="">  </input>
                </div>
            </div>
            <div class="row mt-2 mb-3" >
                <div class="modal-body-select" >
                    <label for="" class="text_gras">  ROLE </label>
                    <select name="" class="form-control" id="role_id">
                        <!-- contenu -->
                    </select>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary  user_update_save"  > Enregistrer</button>
      </div>
    </div>
  </div>
</div>
@endsection