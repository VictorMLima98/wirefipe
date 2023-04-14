<div class="m-12 rounded-lg shadow">
    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

        @foreach ($this->manufacturers as $manufacturer)
            <x-manufacturers.card :$manufacturer />
        @endforeach
    </ul>
</div>