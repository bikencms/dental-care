<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <title>{{ config('app.name') }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet"
          href="{{ asset('assets/css/volt.css') }}">

</head>

<body>

@include('layouts.sidebar')

<main class="content">

    @include('layouts.navbar')

    <div class="py-4">

        @yield('content')

    </div>

</main>

<script src="{{ asset('assets/js/volt.js') }}"></script>

</body>

</html>