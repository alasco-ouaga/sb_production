@extends('layouts.admin.app')
@section('content')
<div class="container card ">
    <div class="row gesiton_titre mb-2 text-uppercase text_italic py-2"> Les roles </div>
    <div  class="container">
        <table class="table table-responsive-md">
            <thead>
                <tr>
                <th scope="col">Num</th>
                <th scope="col">Roles</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $num =0;
                @endphp
                @foreach($roles as $role)
                    @php
                        $num++;
                    @endphp
                    <tr class="text-uppercase">
                        <td> {{ $num}} </td>
                        <td> {{ $role->name}} </td>
                        <td>
                            <form action="{{route('show_user' , $role->id)}}">
                                <button class="btn btn-succes" > 
                                    <i class="fa-solid fa-eye" ></i>
                                </button>
                            </form> 
                        </td>
                    </tr>
                @endforeach
            </tbody>        
        </table>
    </div>
</div>
@endsection