@extends('layouts.admin.app')
@section('content')
    <div class="container  card">
        <div class="row gesiton_titre mb-2 text-uppercase text_italic py-2"> Ajouter un agent</div>

        @if (session()->has('create_success'))
            <div class="container text_gras text_blue mt-2 mb-2">
                {{ session()->get('create_success') }}
            </div>
        @endif

        @if (session()->has('email_find_error'))
            <div class="container text_gras text_red  mt-2 mb-2" role="alert">
                {{ session()->get('email_find_error') }}
            </div>
        @endif

        @if (session()->has('create_denied'))
            <div class="container text_gras text_red  mt-2 mb-2">
                {{ session()->get('create_denied') }}
            </div>
        @endif

        <form  action="{{ route('save_user_create') }}" method="POST" >
        {!! csrf_field() !!}
        <div class="container"> 
            <div class="row mt-4"> 
                <div class=" col-xl-6 col-lg-6 ">
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

                        <label  class="form-label text_gras mt-2"> Localité <span class="red-color">*</span></label>
                        <input type="text" name="locality" class="form-control "  value="{{ old('locality') }}" placeholder="bouroum-bouroum">
                        @error("locality")
                            <div class="text_red"> Le champs localité est demandé  </div>
                        @enderror
                </div>

                <div class=" col-xl-6 col-lg-6 ">
                    <label  class="form-label text_gras mt-2">Telephone <span class="red-color">*</span></label>
                    <input type="number" name="phone" id="phone"  class="form-control  @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="75455370">
                    @error("phone")
                        <div class="text_red"> Le champs Telephone est demandé  </div>
                    @enderror 

                    <label  class="form-label text_gras mt-2">Email <span class="red-color">*</span></label>
                    <input type="email" name="email" class="form-control "  value="{{ old('email') }}" placeholder="example@gmail.com">

                    <label for="" class="text_gras mb-2 mt-2">Role</label>
                    <select class="form-select" name="role_id" aria-label="Default select example">
                        @foreach($roles as $role)
                            @if($role->name == "administrateur")
                                @if($role_name == "administrateur")
                                    <option class="text-uppercase" value="{{$role->id}}"> {{$role->name}}</option>
                                @endif
                            @else
                                <option class="text-uppercase" value="{{$role->id}}" > {{$role->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        
            <div class="container mt-4">
                <button class="btn btn-success float-end mt-3 mb-3 text_gras" type="submit"> Enregistré</button>
            </div>
        </div>
        </form>
    </div>
@endsection