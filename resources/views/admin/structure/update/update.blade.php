@extends('layouts.admin.app')
@section('content')
<div class="container bgr_first card black">
    <div class="row gesiton_titre .title-bar-color mb-2">Modification en cours</div>
    <div class="container border bgr_second mt-1 mb-3">
    <form action="{{ route('save_structure_update') }}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="row mt-3">
            <div class="col-xl-6 col-lg-6">
                <div class="container">
                    <label for="name" class="form-label mt-3 text_gras"> Nom</label>
                    <input type="text" name="name" class="form-control size_x_large" value="{{ $structure->name }}" />
                    <input type="hidden" name="structure_id" value="{{ $structure->id }}" />
                    @error("name")
                        <div class="text_red"> Le champs nom est demandé  </div>
                    @enderror  
            
                    <label for="" class="form-label mt-3 text_gras">Email</label>
                    <input type="text" name="email" class="form-control size_x_large" value="{{ $structure->email }}">  
                    @error("email")
                        <div class="text_red"> Le champs email est demandé  </div>
                    @enderror
                    
                    <label for="" class="form-label mt-3 text_gras">Detail localié</label>
                    <textarea class="form-control size_x_large " name="locality" > {{$structure->locality}} </textarea>
                    @error("locality")
                        <div class="text_red"> Le champs localité est demandé  </div>
                    @enderror
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="container">
                    <label  class="form-label mt-3 text_gras">Ville</label> </label>
                    <select name="city_id" class="form-control">
                        @foreach($cities as $city)
                            <option value="{{$city->id}}"> {{$city->name}} </option>
                        @endforeach
                    </select>

                    <label for="" class="form-label mt-3 text_gras">Site web </label>
                    <input type="text" name="web_link" class="form-control size_x_large" value="{{ $structure->web_link}}">                       
                    @error("web_link")
                        <div class="text_red"> Le champs site web est demandé  </div>
                    @enderror 

                </div>
            </div>
            <div class="container py-3">
                <button type="submit" class="text-center btn btn-success float-end mt-2 text_gras" > Enregistrer</button>
            </div> 
        </div>
    </form>
    </div>  
</div>
@endsection