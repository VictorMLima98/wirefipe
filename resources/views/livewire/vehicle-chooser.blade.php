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
            <option>Carros</option>
            <option>Motos</option>
            <option>Caminhões</option>
        </x-native-select>
    </div>
    <div class="basis-1/4">
        <x-native-select :disabled="$type === self::NOT_SELECTED || $brand === self::NOT_SELECTED" class="bg-secondary-900 text-primary-50 text-base md:!text-lg" wire:model="name">
            <option value="{{ self::NOT_SELECTED }}">Modelo</option>
            <option>Carros</option>
            <option>Motos</option>
            <option>Caminhões</option>
        </x-native-select>
    </div>
    <div>
        <x-native-select :disabled="$type === self::NOT_SELECTED || $brand === self::NOT_SELECTED || $name === self::NOT_SELECTED" class="bg-secondary-900 text-primary-50 text-base md:!text-lg" wire:model="year">
            <option value="{{ self::NOT_SELECTED }}">Ano</option>
            <option>Carros</option>
            <option>Motos</option>
            <option>Caminhões</option>
        </x-native-select>
    </div>
</div>