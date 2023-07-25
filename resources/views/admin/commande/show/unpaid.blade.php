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

            <div class="mb-2 mt-2">
                <form action="">
                    <button  type=""  class="btn float-end mb-2 " > <i class="fa-solid fa-arrows-rotate"></i></button>
                </form>
                <button type="button" class="btn float-end mb-2  get_form_create_commande" data-bs-toggle="modal" data-bs-target="#createcommandeModal">
                    <i class="fa-solid fa-user-plus"></i>
                </button>
            </div>
            <input class="tableau" type="text" value="{{$commandes}}" id="{{$commandes}}" hidden>
            <div id="tableau" data-tableau="{{ json_encode($commandes) }}"></div>

            <div class="container" style="overflow-x:auto;">
                <table class="table  table-bordered">
                    <thead>
                        <tr class="text-uppercase text_italic">
                            <th scope="col">N° </th>
                            <th scope="col">clients</th>
                            <th scope="col">commande </th>
                            <th scope="col">cout(fcfa) </th>
                            <th scope="col">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $num =0;
                        @endphp
                        @foreach($commandes as $commande)
                            @php
                                $num ++;
                            @endphp
                            <tr>
                                <td>
                                    {{ $num }}
                                </td>
                                <td>
                                    {{ $commande->custumer->first_name }} {{ $commande->custumer->last_name }} <br>
                                    <span class="text_green"> {{$commande->custumer->phone}} </span>
                                </td>
                                <td class="text_italic"> 
                                    <span class="text_gras"> {{$commande->quantity}} ({{$commande->excess}}) </span> <br>
                                    <span class="text_gras "> ID : {{$commande->code}} </span> <br>
                                </td>
                                <td class="text_italic">
                                    @php 
                                        $cost = $commande->produit->amount  * $commande->quantity;
                                    @endphp
                                    <span class="text_gras "> {{$cost}} F </span>
                                </td>
                                <td>
                                <div class="row">
                                    <div class="col-xl-1 col-lg-2">
                                        <form action="{{route('commande_show',$commande->id)}}" id="form-update-{{$commande->id}}" method="get" >
                                            @csrf
                                            <button class="btn" type="submit"> 
                                                <i class="fa-solid fa-eye" style="color: green;"> </i>
                                            </button>
                                        </form>
                                    </div>

                                    <div class="col-xl-1 col-lg-2">
                                        <form action="{{route('commande_update',$commande->id)}}" id="form-show-{{$commande->id}}" method="get" >
                                            @csrf
                                            <button type="submit" class="btn"> 
                                                <i class="fa fa-user-edit"></i>
                                            </button>
                                        </form>
                                    </div>

                                    <div class="col-xl-1 col-lg-2 ">
                                        <i onclick="if(confirm('Confirmez vous la suppression de cet client?')) {document.getElementById('form-{{$commande->id}}').submit()}" class="btn"> <i class="fa-solid fa-trash" style="color:red"></i></i>
                                        <form action="{{route('commande_delete',$commande->id)}}" id="form-{{$commande->id}}" method="get" >
                                            @csrf
                                        </form>
                                    </div>
                                </div>
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
@endsection