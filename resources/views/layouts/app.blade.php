<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <main class="content">
        <div class="py-4">
            @yield('content')
        </div>
    </main>
</body>
</html>