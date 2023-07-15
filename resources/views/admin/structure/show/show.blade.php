@extends('layouts.admin.app')
@section('content')

<div class="container bgr_first card">
    <div class="row gesiton_titre .title-bar-color mb-2">Information de l'entreprise</div>
    <div class="container bgr_second border mt-1 mb-3">
        <div class="row mt-3">
            <div class="col-xl-6 col-lg-6">
                <div class="container">
                    <label for="name" class="form-label mt-3 text_gras"> Nom</label>
                    <span class="form-control size_x_large" > {{ $structure->name }} </span>   
            
                    <label for="" class="form-label mt-3 text_gras">Email</label>
                    <span class="form-control size_x_large"> {{ $structure->email }} </span>

                    <label class="form-label mt-3 text_gras">Matricule</label>
                    <span class="form-control size_x_large" > {{ $structure->matricule}} </span>

                    <label for="" class="form-label mt-3 text_gras">Detail localité</label>
                    <textarea readonly class="form-control size_x_large" > {{$structure->locality}} </textarea>  

                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="container">
                    <label class="form-label mt-3 text_gras">Pays</label></label>
                    <span class="form-control size_x_large"> {{ $structure->city->country->name }} </span>   

                    <label  class="form-label mt-3 text_gras">Ville</label> </label>
                    <span class="form-control  size_x_large" > {{ $structure->city->name }} </span> 

                    
                        <label for="" class="form-label mt-3 text_gras">Site web </label>
                        <span class="form-control size_x_large" > 
                            @if($structure->web_link != null) 
                                {{ $structure->web_link}}
                            @else
                                Null 
                            @endif   
                        </span> 
                </div>
            </div>
            <div class="container py-3 ">
                    <form action="{{ route('get_structure_update' , $structure->id) }}" method="get">
                    <button type="submit" class="text-center btn btn-success float-end mt-2 text_gras" > Modifier</button>
                </form>
            </div> 
        </div>
    </div>  
</div>
@endsection