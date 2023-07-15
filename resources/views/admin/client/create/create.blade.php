@extends('layouts.admin.app')
@section('content')
    <div class="container card ">
        <div class="row gesiton_titre mb-2 text-uppercase text_italic py-2"> Ajouter un client</div>

        @if (session()->has('create_success'))
            <div class="container text_gras text_blue mt-2 mb-2">
                {{ session()->get('create_success') }}
            </div>
        @endif

        @if (session()->has('create_denied'))
            <div class="container text_gras text_red  mt-2 mb-2">
                {{ session()->get('create_denied') }}
            </div>
        @endif

        <form  action="{{ route('custumer_create_save') }}" method="POST" >
        {!! csrf_field() !!}
        <div class="container"> 
            <div class="row  border mb-2"> 
                <div class="container col-xl-8 col-lg-8 mt-3">
                        <label  class="form-label text_gras mt-2">Nom<span class="red-color">*</span></label>
                        <input type="text"  name="first_name"  value="{{ old('first_name') }}"  class="form-control @error('first_name') is-invalid @enderror" placeholder="Nom">
                        @error("first_name")
                            <div class="text_red"> Le champs nom est demandé  </div>
                        @enderror 

                        <label  class="form-label text_gras mt-2">Prenom<span class="red-color">*</span></label>
                        <input type="text" id="last_name" name="last_name"  class="form-control @error('last_name') is-invalid @enderror"  value="{{ old('last_name') }}" placeholder="Prenom">
                        @error("last_name")
                            <div class="text_red"> Le champs prenom est demandé  </div>
                        @enderror

                        <label  class="form-label text_gras mt-2">Telephone <span class="red-color">*</span></label>
                        <input type="number" name="phone" id="phone"  class="form-control  @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="75455370">
                        @error("phone")
                            <div class="text_red"> Le champs Telephone est demandé  </div>
                        @enderror 

                        
                        <label  class="form-label text_gras mt-2"> Localité <span class="red-color">*</span></label>
                        <input type="text" name="locality" class="form-control "  value="{{ old('locality') }}" placeholder="bouroum-bouroum">
                        @error("locality")
                            <div class="text_red"> Le champs localité est demandé  </div>
                        @enderror
                </div>
                <div class="container mt-4 ">
                    <button class="btn btn-success float-end mt-3 mb-3 text_gras" type="submit"> Enregistré</button>
                </div>
            </div>
        
            
        </div>
        </form>
    </div>
@endsection