@extends('layouts.admin.app')
@section('content')
<div class="container card">
    <div class="row gesiton_titre mb-2 text-uppercase text_italic py-2"> Liste des clients  </div>
        <div class="container mt-4 mb-4">
            <div class="container border border-success" style="overflow-x:auto;">
                <table class="table  table-bordered">
                    <tbody>
                        <tr>
                            <div class="container mt-3">
                                <div class="row">
                                    <div class="col-6">
                                        <ul class="list-group">
                                            <li class="text-uppercase text_gras list-group"> {{$commande->custumer->structure->name}} </li>
                                            <li class="list-group"> <span>{{$commande->custumer->structure->email}}</span>  </li>
                                            <li class="text-uppercase list-group">
                                                @foreach ($commande->custumer->structure->telephones as $telephone) 
                                                    {{$telephone->phone}} @if($telephone->id != 3) / @endif
                                                @endforeach
                                            </li>
                                            <li class="list-group"> <span>{{$commande->custumer->structure->city->name}}</span>  </li>
                                        </ul>
                                    </div>
                                    <div class="col-6"> 
                                        <ul class="list-group float-end">
                                            <li class="list-group"> <span class="text-uppercase "> Date : {{$commande->created_at->toDateString()}} </span>  </li>
                                            <li class="list-group"> <span class="text-uppercase "> heure : {{$commande->created_at->toTimeString()}} </span>  </li>
                                            <li class="list-group"> <span class="text-uppercase "> ID : {{$commande->code}} </span>  </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </tr>

                        <tr>
                            <div class="container invoice_back text-center mt-4 mb-3 text_italic text_gras text-uppercase"> 
                                <div> Recu pour la commande </div> 
                            </div>
                        </tr>

                        <tr class="py-3 text-uppercase">
                            <td class=" text_gras py-3"> client </td>
                            <td class="py-3 text">
                                {{$commande->custumer->first_name}}-{{$commande->custumer->last_name}}
                            </td>
                        </tr>

                        <tr class="py-3 text-uppercase">
                            <td class=" text_gras py-3"> telephone </td>
                            <td class="py-3 text">
                                {{$commande->custumer->phone}}
                            </td>
                        </tr>

                        <tr class="py-3 text-uppercase">
                            <td class=" text_gras py-3"> localite </td>
                            <td class="py-3 text">
                                {{$commande->custumer->locality}}
                            </td>
                        </tr>

                        <tr>
                            <td class="text-uppercase text_gras py-3"> quantité </td>
                            <td>
                                {{$commande->quantity}}
                            </td>                       
                        </tr>
                        
                        <tr>
                            <td class="text-uppercase text_gras py-3"> Surplus </td>
                            <td>
                                {{$commande->excess}}
                            </td>                       
                        </tr>

                        <tr>
                            <td class="text-uppercase text_gras py-3"> cout </td>
                            <td>
                                @php 
                                    $cost = $commande->produit->amount  * $commande->quantity;
                                @endphp
                                <span> {{$cost}} F </span>
                            </td>                       
                        </tr>

                        <tr class="text-uppercase">
                            <td class="text_gras py-3"> Commentaire </td>
                            <td>
                                <span> {{$commande->note}} </span>
                            </td>                       
                        </tr>
                    </tbody>
                </table>
                <div class="container text-center mb-3 invoice_margin">
                      <span class=" text_gras invoice_police"> Eau dounia vous souhaite un tres bon marché. </span>  
                </div>
                <div class="container ">                
                    <button class="btn btn-success float-end mb-3 text_gras"> imprimer </button>
                </div>
            </div>
        </div>
</div>
@endsection