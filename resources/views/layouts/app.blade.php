<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="antialiased bg-secondary-900 h-screen flex flex-col">
    <x-header />

    <div class="flex-grow">
        {{ $slot }}
    </div>

    <x-footer />
    
    <wireui:scripts />
    @vite('resources/js/app.js')
    @livewireScripts
</body>

</html>
