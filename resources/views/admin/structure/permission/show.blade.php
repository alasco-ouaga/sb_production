@extends('layouts.admin.app')
@section('content')
<div class="container card ">
    <div class="row gesiton_titre mb-2 text-uppercase text_italic py-2"> Les Permisions pour : {{ $role_name }} </div>
    <div  class="container mt-2">
        <table class="table table-light table-responsive-md">
            <thead>
                <tr>
                    <th scope="col">Permissions ( {{$compter}} )</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        @foreach($role->permissions as $permission)
                            <span class="form-control text-uppercase mt-1"> {{$permission->name}} </span>
                        @endforeach
                    </td>
                </tr>
            </tbody>        
        </table>
    </div>
</div>
@endsection