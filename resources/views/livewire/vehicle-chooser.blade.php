<div class="flex flex-wrap py-8 md:flex-nowrap gap-x-8 gap-y-4">
    <div class="basis-full md:basis-1/4">
        <x-native-select class="!bg-secondary-900 text-primary-50 text-base md:!text-lg" wire:model="type">
            <option value="{{ self::EMPTY_VALUE }}">Tipo</option>
            @foreach ($this->types as $selectableType)
                <option value="{{ $selectableType->id }}">{{ str($selectableType->description)->title() }}</option>
            @endforeach
        </x-native-select>
    </div>
    <div class="basis-full md:basis-1/4">
        <x-native-select :disabled="$type === null" class="!bg-secondary-900 text-primary-50 text-base md:!text-lg" wire:model="manufacturer">
            <option value="{{ self::EMPTY_VALUE }}">Marca</option>
            @foreach ($this->manufacturers as $selectableManufacturer)
                <option value="{{ $selectableManufacturer->id }}">{{ str($selectableManufacturer->name)->upper() }}</option>
            @endforeach
        </x-native-select>
    </div>
    <div class="basis-full md:basis-1/4">
        <x-native-select :disabled="$type === null || $manufacturer === null" class="!bg-secondary-900 text-primary-50 text-base md:!text-lg" wire:model="vehicle">
            <option value="{{ self::EMPTY_VALUE }}">Modelo</option>
            @foreach ($this->vehicles as $selectableVehicle)
                <option value="{{ $selectableVehicle->id }}">{{ str($selectableVehicle->name)->upper() }}</option>
            @endforeach
        </x-native-select>
    </div>
    <div class="basis-full md:basis-1/4" x-data>
        <x-native-select :disabled="$type === null || $manufacturer === null || $vehicle === null" class="!bg-secondary-900 text-primary-50 text-base md:!text-lg" wire:model="year"
            x-on:change="$dispatch('show-loader')">
            <option value="{{ self::EMPTY_VALUE }}">Ano</option>
            @foreach ($this->years as $selectableYear)
                <option value="{{ $selectableYear->id }}">{{ str($selectableYear->year)->upper() }}</option>
            @endforeach
        </x-native-select>
    </div>
</div>