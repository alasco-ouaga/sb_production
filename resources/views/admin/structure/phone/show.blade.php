@extends('layouts.admin.app')
@section('content')
@if($compter != 0)
    <div class="container black card">
        <div class="row gesiton_titre mb-2 text-uppercase text_italic py-2"> Numeros de telephone</div>
        <div class="row mt-1 mb-1">
            <div>
                 @if($compter < 3)
                    <button class="btn float-end create_new_phone" data-bs-target="#CreatePhoneModal" data-bs-toggle="modal">
                        <i class="fas fa-plus fa-lg " style="color:green "></i>
                   </button>
                @endif
                <form action="{{route('get_structure_phone') }}" >
                    <button type="submit" class="btn float-end"> 
                        <i class="fa-solid fa-arrows-rotate fa-lg"></i> 
                    </button> 
                </form>
            </div>
        </div>

        <div class="container  gras">
            @if(Session()->has('delete_success'))
            <div class="row italic">
                <span class="text_red text_blue mb-2 text_italic"> {{ Session()->get('delete_success') }} </span> 
            </div>
            @endif
            @if(Session()->has('delete_refused'))
                <div class="row italic">
                    <span class="text_red text_gras mb-2 text_italic"> {{ Session()->get('delete_refused') }}</span> 
                </div>
            @endif
        </div>
       
        <div class=" mb-2 container">
            <div class="row ">
                <table class="table table-responsive-md ">
                    <thead>
                        <tr>
                            <th scope="col">Num  </th>
                            <th scope="col">Telephone</th>
                            <th scope="col" class="text-right" >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach($phones as $phone)
                            <tr>
                                <td>
                                    {{ $i }}
                                </td>
                                <td>
                                    {{ $phone->phone }}
                                </td>
                                <td>
                                    <input type="hidden" class="phone_id" id="{{$phone->id}}" value="{{$phone->id}}">
                                    <input type="hidden" class="phone_number" id="{{$phone->phone}}" value="{{$phone->phone}}">
                                
                                    <button onclick="if(confirm('Confirmez vous la suppresion de ce numero ?')) {document.getElementById('form-{{$phone->id}}').submit()}" class="btn"> 
                                        <i  class="fa-solid fa-trash-can fa-lg" style="color:red"></i>
                                    </button>
                                    <button class="btn update_phone" data-bs-target="#updatePhoneModal" data-bs-toggle="modal">
                                        <i class="fa-solid fa-pen-to-square fa-lg" style="color:green"></i>
                                    </button>
                                    <form action="{{route('confirm_delete_structure',$phone->id )}}" id="form-{{$phone->id}}" method="POST">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                            @php $i++; @endphp
                        @endforeach
                    
                    </tbody>
                </table>
            </div>
        </div>
        
   </div>

<!-- Modification du numero de telephone -->
<div class="modal fade black" id="updatePhoneModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5  text_gras text_italic">Modification du numero </h1>
            <button type="button" class="btn-close  refresh" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class=" container">
            <span class="text_red text_gras hide  mt-3 phone_update_denied">Attention , Numero existant ou introuvable</span>
        </div>
        <div class="container ">
            <span class="text_blue text_gras hide phone_update_success mt-2"> Modification reussie avec succès </span>
        </div>
        <div class="container mt-1mb-2">
            <div class="mb-4">
                <label class="text_gras mt-1 mb-3"> Telephone </label>
                <input class="form-control" type="number" id="update_phone_number" />
                <input class="form-control" type="hidden" id="update_phone_id" />
                <div class="text_red text_gras mb-4 hide phone_null_error" id="phone_null_error"> Le numero est demandé (8 chiffres minimum) </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary refresh" data-bs-dismiss="modal">Fermer</button>
            <button type="button" class="btn btn-primary save_phone_update save_validate_btn_2">Modifier</button>
        </div>
    </div>
  </div>
</div>


<!-- Creer un numero de telephone -->
<div class="modal fade black" id="CreatePhoneModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5  text-uppercase text_gras black text_italic">Ajouter un telephone</h1>
            <button type="button" class="btn-close  refresh" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="container modal-update-body  mt-2 mb-2"></div>
        <div class="container phone_create_success hide">
            <span class="text_blue text_gras">Numero enregistré avec succès</span>
        </div>
        <div class="container phone_find_error hide">
            <span class="text_red text_gras"> Echec : Limite depassée ou numero existant</span>
        </div>
        <div class="container modal-update-message">
            <div class="mb-4">
                <label class="gras mt-2 mb-2 text_gras">Numeros</label>
                <input class="form-control " type="number" id="create_phone" placeholder="75455370"/>
                <div class="text_red text_gras mb-4 hide phone_null_error" id="create_error"> Le numero est demandé (8 chiffres) </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            <button type="button" class="btn btn-primary  save_phone_number save_validate_btn_1">Creer</button>
        </div>
    </div>
  </div>
</div>
@endif
@endsection