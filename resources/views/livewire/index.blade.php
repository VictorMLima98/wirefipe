<div>
    <div class="relative bg-primary-900">
        <div class="absolute inset-0">
            <img class="h-full w-full object-cover" src="{{ asset('assets/static/traffic.jpg') }}" alt="">
            <div class="absolute inset-0 bg-secondary-900 mix-blend-multiply" aria-hidden="true"></div>
        </div>
        <div class="relative mx-auto max-w-7xl py-24 px-6 sm:py-32 lg:px-8">
            <h1 class="text-4xl font-bold tracking-tight text-primary-300 sm:text-5xl lg:text-6xl">Tabela FIPE</h1>
            <p class="mt-6 max-w-3xl text-2xl text-primary-50 shadow-lg">Descubra o valor de veículos novos, seminovos e usados na tabela FIPE</p>
            <div>
                <livewire:vehicle-chooser />
            </div>
            <div>
                <livewire:fipe-information />
            </div>
        </div>
    </div>
</div>
