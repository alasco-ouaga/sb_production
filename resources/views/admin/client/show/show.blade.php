@extends('layouts.admin.app')
@section('content')
@if($compter != 0)
<div class="container card">
    <div class="row gesiton_titre mb-2 text-uppercase text_italic py-2"> Liste des clients ({{$compter}})  </div>
        <div class="container mt-4 mb-4">
            <div class="container">

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
            </div>

            <div class="mb-2">
                <form action="">
                    <button  type=""  class="btn float-end mb-2 " > <i class="fa-solid fa-arrows-rotate"></i></button>
                </form>
                <button type="button" class="btn float-end mb-2  get_form_create_custumer" data-bs-toggle="modal" data-bs-target="#createcustumerModal">
                    <i class="fa-solid fa-user-plus"></i>
                </button>
            </div>

            <div class="container">
                <table class="table  table-responsive-md">
                    <thead>
                        <tr>
                            <th scope="col">Num </th>
                            <th scope="col">Clients</th>
                            <th scope="col">Action </th>
                            <th scope="col">Permission</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $num =0;
                        @endphp
                        @foreach($custumers as $custumer)
                            @php
                                $num ++;
                            @endphp
                            <tr>
                                <td>
                                    {{ $num }}
                                </td>
                                <td>
                                    {{ $custumer->first_name }} {{ $custumer->last_name }} <br>
                                    <span class="text_green"> {{$custumer->phone}} </span>
                                    @if($custumer->access == true)
                                        <span class="text_gras text_blue text_small_size" > Authorisé </span>
                                    @else
                                        <span  class="text_gras text_red text_small_size"> Suspendu </span>
                                    @endif
                                </td>
                                <td>
                                <div class="row">
                                        <div class="col-xl-2 col-lg-2 ">
                                            <input type="hidden" class="custumer_id" id="{{$custumer->id}}" name="custumer_id" value="{{$custumer->id}}" >
                                            <button type="button" class="btn get_custumer_info" data-bs-toggle="modal" data-bs-target="#get-custumer-info">
                                                    <i class="fa-solid fa-eye" > </i>
                                            </button>
                                        </div>

                                        <div class="col-xl-2 col-lg-2 ">
                                            <input type="hidden"class="custumer_id" id="{{$custumer->id}}" name="custumer_id" value="{{$custumer->id}}" >
                                            <button type="button" class="btn get_custumer_data_to_update" data-bs-toggle="modal" data-bs-target="#UpdateModalCenter">  
                                                <i class="fa fa-user-edit"></i>
                                            </button>
                                        </div>

                                        <div class="col-xl-2 col-lg-2 ">
                                            <i onclick="if(confirm('Confirmez vous la suppression de cet client?')) {document.getElementById('form-{{$custumer->id}}').submit()}" class="btn"> <i class="fa-solid fa-trash" style="color:red"></i></i>
                                            <form action="{{route('custumer_delete',$custumer->id)}}" id="form-{{$custumer->id}}" method="get" >
                                                @csrf
                                            </form>
                                        </div>

                                    </div>
                                </td>

                                <td>
                                    @if($custumer->access == true)
                                        <button class="btn gras" onclick="if(confirm('Confirmer vous la suspension de  cet utilisateur ?'))
                                                {document.getElementById('form-block-{{$custumer->id}}').submit()}">
                                                <i class="fa fa-user-lock"> </i>  <span class="px-3 text_red text_gras"> bloquer</span> 
                                        </button>
                                        
                                        <form id="form-block-{{$custumer->id}}" action="{{route('custumer_blocked' , $custumer->id)}}" method="get" >@csrf</form>
                                    @else
                                        <button class="btn gras" onclick="if(confirm('Confirmer la suppression de cet Secretaire?'))
                                                {document.getElementById('form-block-{{$custumer->id}}').submit()}"> 
                                                <i class="fas fa-user-check"></i> 
                                                <span class="px-3 text_blue text_gras">autoriser</span>  
                                        </button>
                                        <form id="form-block-{{$custumer->id}}" action="{{route('custumer_authaurize',$custumer->id )}}" method="get" >@csrf</form>
                                    @endif
                                </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
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

<!-- Modal pour voir les informations du custumer -->
<div class="modal fade" id="get-custumer-info" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="get-custumer-info-label" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5 text_gras text_italic">DETAIL SUR LE CLIENT</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container mt-1 time-new-rooman"> 
                <div class="container mt-2">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 ">
                            <label for="" class="text_gras mt-2"> NOM </label>
                            <span class="form-control size_x_large" id="get_first_name" >  </span>
                        </div>
                        <div class="col-xl-6 col-lg-6 ">
                            <label for="" class="text_gras mt-2"> PRENOM </label>
                            <span class="form-control size_x_large" id="get_last_name">  </span>
                        </div>
                    </div>
                    <div class="row">
                        <div>
                            <label for="" class="text_gras mt-2"> PHONE  </label>
                            <span  class="form-control size_x_large"  id="get_phone"> </span>
                    
                            <label for="" class="text_gras mt-2">  LOCALITE </label>
                            <span class="form-control size_x_large" id="get_locality">  </span>

                            <label for="" class="text_gras mt-2">  DATE INSCRIPTION </label>
                            <span class="form-control size_x_large" id="get_created_at">  </span>
                        </div>
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


    <!-- Modal pour creer un nouveau custumer -->
<div class="modal fade black" id="createcustumerModal"  tabindex="-1" aria-labelledby="createcustumerModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5 text_gras text_italic">NOUVEL AGENT</h1>
            <button type="button" class="btn-close  btn-stop" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="container mt-1 time-new-rooman">
                    <div class="row">
                        <span class="text_blue text_gras hide custumer_create_success hide">Le client a été ajouté avec succès</span>
                    </div>
                    <div class="row mt-2">
                        <div class="container  create_password hide">
                            <span class="form-control text-center text_gras text_red " id="create_password" ></span> 
                        </div>
                    </div>
                    <div class="row">
                        <span class="text_red text_gras hide custumer_create_denied hide">Erreur : cet telephone est déjà utilisé </span>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-6 col-lg-6 mt-2">
                            <label for="" class="text_gras"> NOM </label>
                            <input  type="text" class="form-control " id="create_first_name" value="Ilboudo" require >  </input>
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
                            <label for="" class="text_gras">  LOCALITE </label>
                            <input type="email"  class="form-control" id="create_locality" value="Gaoua"require >  </input>
                            <span class="text_red hide create_locality_null"> La localité est demandé </span>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary  " data-bs-dismiss="modal">Fermer</button>
            <button type="button" class="btn btn-primary  custumer_create_save save-btn">Enregistre</button>
        </div>
        </div>
    </div>
</div>

<!-- Modal pour modification -->
<div class="modal fade black" id="UpdateModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text_gras text_italic" id="exampleModalLongTitle">MODIFICATION</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container mt-1 ">
                <div class="row">
                    <span class="text_blue text_gras hide custumer_update_success hide">Le client a été modifié avec succès</span>
                </div>
                <div class="row">
                    <span class="text_red text_gras hide custumer_update_denied hide">Erreur : le numero est déjà utilisé</span>
                </div>
                <div class="row mt-3">
                    <input  type="hidden" id="update_custumer_id"  value=""> </input>
                    <div class="col-xl-6 col-lg-6">
                        <label for="" class="text_gras"> NOM </label>
                        <input  type="text" class="form-control  update_first_name" id="update_first_name"  require value="" >  </input>
                        <span class="text_red hide update_first_name_null"> Le nom est demandé </span>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <label for="" class="text_gras"> PRENOM </label>
                        <input type="text" class="form-control  update_last_name" id="update_last_name" require value="">  </input>
                        <span class="text_red hide update_last_name_null"> Le prenom est demandé </span>
                    </div>
                </div>
                <div class="row mt-2" >
                    <div class="">
                        <label for="" class="text_gras"> PHONE  </label>
                        <input type="number" class="form-control  update_phone"  id="update_phone" require value=""> </input>
                        <span class="text_red hide update_phone_null"> Le telepnone est demandé </span>
                    </div>
                </div>
                <div class="row mt-2" >
                    <div class="">
                        <label for="" class="text_gras">  LOCALITE </label>
                        <input type="text"  class="form-control  update_locality" id="update_locality" require value="">  </input>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            <button type="button" class="btn btn-primary  custumer_update_save"  > Enregistrer</button>
        </div>
        </div>
    </div>
</div>
@endsection