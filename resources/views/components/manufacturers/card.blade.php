@props([
    'manufacturer'
])

<li class="flex flex-col col-span-1 text-center divide-y rounded-lg shadow divide-primary-500 bg-secondary-900">
    <div class="flex flex-col items-center justify-end flex-1 p-8 gap-y-4">
        <div>
            <img class="h-24 mx-auto"
                src="{{ $manufacturer->getLogo()?->getUrl() }}"
                alt="{{ $manufacturer->name }} Logo">
        </div>
        <div class="flex flex-col justify-between">
            <div class="text-sm text-secondary-200">
                <span class="font-medium">{{ $manufacturer->vehicles_count }}</span> modelos
            </div>
        </div>
    </div>
    <div class="transition-all hover:rounded-b-lg hover:bg-secondary-700">
        <div class="flex">
            <a href="#"
                class="relative inline-flex items-center justify-center flex-1 w-0 py-4 font-medium border border-transparent rounded-bl-lg text-secondary-100 gap-x-3">
                Ver Todos
            </a>
        </div>
    </div>
</li>