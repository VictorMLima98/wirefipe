<div class="overflow-hidden bg-secondary-900 shadow sm:rounded-lg" x-data="{
    fipe: @entangle('fipe')
}" x-show="fipe" x-cloak x-transition>
    @if ($fipe)
    <div class="px-4 py-5 sm:px-6 flex flex-col justify-center items-center">
        <div>
            <h3 class="text-3xl font-bold leading-10 text-primary-300">{{ $fipe['brand'] }} {{ $fipe['model'] }} - {{ $fipe['year'] }} {{ $fipe['fuel_description'] }}</h3>
            <span class="text-primary-50 text-sm font-mono">Código FIPE: <span class="font-semibold">{{ $fipe['fipe_id'] }}</span></span>
            <div class="py-2">
                <h1 class="text-5xl py-1 font-bold text-primary-50">{{ $fipe['price'] }}</h1>
                <span class="text-primary-50">Preço médio em <span class="font-semibold">{{ str()->ucfirst($fipe['fipe_period']) }}</span></span>
            </div>
        </div>
    </div>
    @endif
</div>
