<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.0/aos.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
        <link rel="shortcut icon" id="faviconTag"  type="image/x-icon" href="{{ asset('images/dark.png') }}">

        <!-- CSS -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">  
    </head>
    <body class="">
        
        @include('partials.navbar')
        <!-- Page Content -->
        <main>
            {{-- {{ $slot }} --}}
            {{-- @yield it's balise for the content and @section('content') @endsection it's balise for contain the content --}}
            @yield('content')
            <div class="cursor"></div>
            <div class="cursor2"></div>
        </main>

        <!-- SCRIPT -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.0/aos.js"></script>
        <script>
            AOS.init();
        </script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
