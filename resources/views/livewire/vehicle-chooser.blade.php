<div class="flex flex-wrap md:flex-nowrap py-8 gap-x-8 gap-y-4">
    <div>
        <x-native-select class="bg-secondary-900 text-primary-50 text-base md:!text-lg" wire:model="type">
            <option value="{{ self::NOT_SELECTED }}">Tipo</option>
            <option value="{{ self::TYPE_CARS }}">Carros</option>
            <option value="{{ self::TYPE_BIKES }}">Motos</option>
            <option value="{{ self::TYPE_TRUCKS }}">Caminhões</option>
        </x-native-select>
    </div>
    <div class="basis-1/4">
        <x-native-select :disabled="$type === self::NOT_SELECTED" class="bg-secondary-900 text-primary-50 text-base md:!text-lg" wire:model="brand">
            <option value="{{ self::NOT_SELECTED }}">Marca</option>
            @foreach ($brands as $selectableBrand)
                <option value="{{ $selectableBrand['id'] }}">{{ $selectableBrand['name'] }}</option>
            @endforeach
        </x-native-select>
    </div>
    <div class="basis-1/4">
        <x-native-select :disabled="$type === self::NOT_SELECTED || $brand === self::NOT_SELECTED" class="bg-secondary-900 text-primary-50 text-base md:!text-lg" wire:model="model">
            <option value="{{ self::NOT_SELECTED }}">Modelo</option>
            @foreach ($models as $selectableModel)
                <option value="{{ $selectableModel['id'] }}">{{ $selectableModel['name'] }}</option>
            @endforeach
        </x-native-select>
    </div>
    <div>
        <x-native-select :disabled="$type === self::NOT_SELECTED || $brand === self::NOT_SELECTED || $model === self::NOT_SELECTED" class="bg-secondary-900 text-primary-50 text-base md:!text-lg" wire:model="year">
            <option value="{{ self::NOT_SELECTED }}">Ano</option>
            @foreach ($years as $selectableYear)
                <option value="{{ $selectableYear['id'] }}">{{ $selectableYear['name'] }}</option>
            @endforeach
        </x-native-select>
    </div>
</div>