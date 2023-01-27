<div class="flex flex-wrap md:flex-nowrap py-8 gap-x-8 gap-y-4">
    <div>
        <x-native-select class="bg-secondary-900 text-primary-50 text-base md:!text-lg" wire:model="type">
            <option :value="null">Tipo</option>
            <option>Carros</option>
            <option>Motos</option>
            <option>Caminhões</option>
        </x-native-select>
    </div>
    <div class="basis-1/4">
        <x-native-select :disabled="!$type" class="bg-secondary-900 text-primary-50 text-base md:!text-lg" wire:model="brand">
            <option :value="null">Marca</option>
            <option>Carros</option>
            <option>Motos</option>
            <option>Caminhões</option>
        </x-native-select>
    </div>
    <div class="basis-1/4">
        <x-native-select :disabled="!$brand" class="bg-secondary-900 text-primary-50 text-base md:!text-lg" wire:model="name">
            <option :value="null">Modelo</option>
            <option>Carros</option>
            <option>Motos</option>
            <option>Caminhões</option>
        </x-native-select>
    </div>
    <div>
        <x-native-select :disabled="!$name" class="bg-secondary-900 text-primary-50 text-base md:!text-lg" wire:model="year">
            <option :value="null">Ano</option>
            <option>Carros</option>
            <option>Motos</option>
            <option>Caminhões</option>
        </x-native-select>
    </div>
</div>