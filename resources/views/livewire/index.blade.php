<div>
    <div class="relative bg-primary-900">
        <div class="absolute inset-0">
            <img class="object-cover w-full h-full" src="{{ asset('assets/static/traffic.jpg') }}" alt="Background">
            <div class="absolute inset-0 bg-black/90 bg-gradient-to-r to-primary-900 from-secondary-900 mix-blend-multiply" aria-hidden="true"></div>
        </div>
        <div class="relative px-6 py-24 mx-auto max-w-7xl sm:py-40 lg:px-8">
            <img class="max-w-[230px] lg:max-w-sm" src="{{ asset('assets/static/logo-no-background.svg') }}" alt="Logo">
            <p class="max-w-3xl mt-6 text-2xl shadow-lg text-primary-50">Descubra o valor de veículos novos, seminovos e usados na tabela FIPE</p>
            <div>
                <livewire:home.vehicle-chooser />
            </div>
            <div>
                <livewire:home.fipe-information />
            </div>
        </div>
    </div>
</div>
