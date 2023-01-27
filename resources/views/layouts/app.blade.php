<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="antialiased">
    <x-header />

    {{ $slot }}
    
    <wireui:scripts />
    @vite('resources/js/app.js')
    @livewireScripts
</body>

</html>
