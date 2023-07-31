<div class="container d-flex justify-content-end mb-2 mt-1 p-4 filtre_color">
    <div class="form-group px-3">
        <select class="form-control" wire:model.debounce.10000ms="filtreParEtat">
            <option value=""> Filtrer par Etat </option>
            <option value="1">Payé</option>
            <option value="0">Impayé</option>
        </select>
    </div>
    <div class="form-group">
        <input type="text" wire:model.debounce.1000ms="filtreParCode" class="form-control mb-2 mr-3" placeholder="rechercher ici" >
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">
            <i class="fas fa-search" style="color:white"></i>
        </button>
    </div>
</div>
<div class="tale_responsive">
    <table class="table  table-bordered">
        <thead>
            <tr class="text-uppercas text_italic">
                <th scope="col">clients</th>
                <th scope="col">commande </th>
                <th scope="col">cout(fcfa) </th>
                <th scope="col">Etat paiement </th>
                <th scope="col">Action </th>
            </tr>
        </thead>
        <tbody>
            @foreach($commandes as $commande)
                <tr>
                    <td>
                        {{ $commande->custumer->first_name }} {{ $commande->custumer->last_name }} <br>
                        <span class="text_green"> {{$commande->custumer->phone}} </span>
                    </td>
                    <td class="text_italic"> 
                        <span > {{$commande->quantity}} ({{$commande->excess}}) </span> <br>
                        <span > ID : {{$commande->code}} </span> <br>
                    </td>
                    <td class="text_italic">
                        @php 
                            $cost = $commande->produit->amount  * $commande->quantity;
                        @endphp
                        <span> {{$cost}} F </span>
                    </td>
                    <td>
                        @if($commande->completed)
                            <span class="text_gras text_blue"> payé</span>
                        @else
                            <span class="text_gras text_red"> impayé</span>
                        @endif
                    </td>
                    <td>
                    <div class="row">
                        <div class="col-xl-2 col-lg-2">
                            <i onclick="{document.getElementById('form-show-{{$commande->id}}').submit()}" class="btn fa-solid fa-eye"></i>
                            <form action="{{route('commande_show',$commande->id)}}" id="form-show-{{$commande->id}}" method="get" ></form>
                        </div>

                        <div class="col-xl-2 col-lg-2">
                            <i onclick="{document.getElementById('form-update-{{$commande->id}}').submit()}" class="btn fa fa-user-edit"></i>
                            <form action="{{route('commande_update',$commande->id)}}" id="form-update-{{$commande->id}}" method="get" ></form>
                        </div>

                        <div class="col-xl-2 col-lg-2 ">
                            <i onclick="if(confirm('Confirmez vous la suppression de cette commande ? ')) {document.getElementById('form-delete-{{$commande->id}}').submit()}" class="btn fa-solid fa-trash" style="color:red"></i>
                            <form action="{{route('commande_delete',$commande->id)}}" id="form-delete-{{$commande->id}}" method="get" ></form>
                        </div>
                    </div>
                    </td>
                </tr>
            @endforeach
            @if(empty($commandes))
                <tr>
                    <span class="text_red text_gras text_italic mt-4 mb-4 "> DONNEES INTROUVABLES : PAS DE COMMANDE TROUVES</span>
                </tr>
            @endif
        </tbody>
    </table>

    
</div>