@extends('layouts.admin.app')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@section('content')
    <div class="container card ">
        <div class="row gesiton_titre mb-2 text-uppercase text_italic py-2"> Enregistrer une commande</div>

        @if (session()->has('update_success'))
            <div class="container text_gras text_blue mt-2 mb-2">
                {{ session()->get('update_success') }}
            </div>
        @endif

        @if (session()->has('update_denied'))
            <div class="container text_gras text_red  mt-2 mb-2">
                {{ session()->get('update_denied') }}
            </div>
        @endif

        <form  action="{{ route('commande_update_save') }}" method="POST" >
        {!! csrf_field() !!}
        <div class="container border mb-2"> 
            <div class="row  mb-2"> 
                <div class="container col-xl-8 col-lg-8 mt-3">
                    <input type="hidden" name="commande_id" value="{{$commande->id}}">
                    <label  class="form-label text_gras mt-2">Client</label>
                    <select class="form-select dynamic_search" name="custumer_id" id="sport">
                        @foreach($custumers as $custumer)
                            @if($commande->custumer->id == $custumer->id)
                                <option selected value="{{$custumer->id}}"> <span class="text_gras text-uppercase"> {{$custumer->first_name}} </span>  {{$custumer->last_name}} {{$custumer->phone}}</option>
                            @else
                                <option  value="{{$custumer->id}}"> <span class="text_gras text-uppercase"> {{$custumer->first_name}} </span>  {{$custumer->last_name}} {{$custumer->phone}}</option>
                            @endif
                        @endforeach
                    </select>

                    <label hidden class="form-label text_gras mt-2"> Produit </label>
                    <select hidden class="form-control" name="produit_id" id="produit_id">
                        @foreach($produits as $produit)
                            <option value="{{$produit->id}}"> {{$produit->name}}</option>
                        @endforeach
                    </select>

                    <label  class="form-label text_gras mt-2"> Quantité <span class="text_red">*</span></label>
                    <input type="number"  name="quantity"  value="{{ $commande->quantity }}"  class="form-control @error('quantity') is-invalid @enderror" >
                    @error("quantity")
                        <div class="text_red"> Le champs quantité est demandé  </div>
                    @enderror 

                    <label  class="form-label text_gras mt-2">Surplus</label>
                    <input type="number" id="last_name" name="excess"  class="form-control"  value="{{ $commande->excess }}">

                    <label  class="form-label text_gras mt-2">Commentaire </label>
                    <textarea class="form-control" name="note" id="note" cols="30" rows="5">{{$commande->note}} </textarea> 
                </div>
                <div class="container mt-4 ">
                    <button class="btn btn-success float-end mt-3 mb-3 text_gras" type="submit"> Enregistré</button>
                </div>
            </div>
        </div>
        </form>
    </div>
<script>
    $(document).ready(function() {
        const sportlist =10
        console.log(sportlist)
        $("#sport").select2();
    });
</script>
@endsection