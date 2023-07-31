@extends('layouts.admin.app')
@section('content')
<div class="container card">
    <div class="row gesiton_titre mb-2 text-uppercase text_italic py-2"> Commande impayés ({{$compter}})  </div>
        <div class="container mt-4 mb-4">
            <div class="container">
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
            @livewire('filtre-commande', ['commandes' => $commandes])
        </div>
</div>
@endsection