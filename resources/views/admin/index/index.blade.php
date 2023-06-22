@extends('layouts.admin.app')
@section('content')
<div class="container">
    <div class="row ">
        <div class="">
            <div class="card">
                <div class="card-header gesiton_titre .title-bar-color">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('vous etes connecteé!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
