<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Descubra o valor de veículos novos, seminovos e usados na tabela FIPE."/>

    <meta property=”og:title” content="{{ config('app.name') }}" />
    <meta property=”og:url” content="{{ route('index') }}" />
    <meta property=”og:type” content="website" />
    <meta property="og:description" content="Descubra o valor de veículos novos, seminovos e usados na tabela FIPE." />
    <meta property="og:image" content="{{ asset('assets/static/logo-color.svg') }}" />

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.svg') }}">

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

    <div class="fixed h-screen w-screen flex items-center justify-center bg-secondary-900/20 backdrop-blur-md overflow-hidden" x-data="{
        show: false,

        init () {
            window.addEventListener('show-loader', () => {
                this.show = true;
            });

            window.addEventListener('hide-loader', () => {
                this.show = false;
            });
        }
    }" x-cloak x-show="show" x-transition>
        <div class="absolute z-50">
            <x-svg.loader  />
        </div>
    </div>
    
    <wireui:scripts />
    @vite('resources/js/app.js')
    @livewireScripts
</body>

</html>
