<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>eau dounia</title>

        <!-- Scripts -->
        @livewireStyles
        @include('layouts.template.locale.mycss')
    </head>
    <body>
        @include('layouts.menu.menu')
        @include('layouts.template.locale.myjs')
        @livewireScripts
    </body>
</html>
