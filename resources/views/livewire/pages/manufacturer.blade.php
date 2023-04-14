<div class="flex flex-col m-12 rounded-lg shadow gap-y-8" x-data>

    <h1 class="text-5xl font-semibold tracking-wider text-secondary-50">
        {{ $manufacturer->name }}
    </h1>

    <div class="flex items-center">   
        <label for="cars-search" class="sr-only">Pesquisar</label>
        <div class="relative w-full">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <x-icon name="search" class="w-5 h-5 text-secondary-50" />
            </div>
            <input type="text" 
                id="cars-search" 
                class="bg-secondary-900 border-none placeholder:text-secondary-200 text-secondary-50 rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5" 
                wire:model.debounce.400ms='search'
                placeholder="Pesquise qualquer Modelo...">
        </div>
    </div>

    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach ($this->vehicles as $vehicle)
            <x-vehicles.card :$vehicle />
        @endforeach
    </ul>

    @if ($this->vehicles->hasMorePages())
        <div class="rounded-lg" wire:loading wire:target='loadMore'>
            <x-svg.loader  />
        </div>
        <div x-intersect="$wire.call('loadMore')"></div>
    @endif
</div>