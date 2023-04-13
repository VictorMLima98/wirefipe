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

<body class="flex flex-col h-screen antialiased bg-secondary-950">
    <x-header />

    <div class="container flex-grow mx-auto">
        {{ $slot }}
    </div>

    <x-notifications />
    <x-footer />

    <div class="fixed flex items-center justify-center w-screen h-screen overflow-hidden bg-secondary-950/25 backdrop-blur-md" x-data="{
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
