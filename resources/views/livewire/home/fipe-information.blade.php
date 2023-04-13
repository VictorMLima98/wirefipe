<div class="overflow-hidden shadow bg-secondary-900 sm:rounded-lg" x-data="{
    show: @entangle('show')
}" x-show="show" x-cloak x-transition>
    @if ($this->fipe)
        <div class="flex flex-col items-center justify-center px-4 py-5 sm:px-6">
            <div>
                <h3 class="text-xl font-bold leading-6 md:text-3xl md:leading-10 text-primary-300">{{ $this->fipe->manufacturer }} {{ $this->fipe->vehicle }} - {{ $this->fipe->year }} {{ $this->fipe->fuel }}</h3>
                <span class="font-mono text-sm text-primary-50">Código FIPE: <span class="font-semibold">{{ $this->fipe->id }}</span></span>
                <div class="py-2">
                    <h1 class="py-1 text-4xl font-bold md:text-5xl text-primary-50">{{ $this->fipe->price }}</h1>
                    <span class="text-primary-50">Preço médio em <span class="font-semibold">{{ str()->ucfirst($this->fipe->period) }}</span></span>
                </div>
            </div>
        </div>
    @endif
</div>
