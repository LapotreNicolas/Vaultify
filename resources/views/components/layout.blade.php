<!doctype html>
<html lang={{ str_replace('_', '-', app()->getLocale()) }}>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Redacted+Script:wght@400">

    @vite(['resources/css/test-vite.css', 'resources/css/app.css', 'resources/css/normalize.css', 'resources/js/test-vite.js'])
    <title>{{$titre ?? "Application Laravel"}}</title>
</head>
<x-header></x-header>
<body>
    <main class="main-container">
        {{$slot}}
    </main>
    <x-footer></x-footer>
</body>
</html>
