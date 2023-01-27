<nav class="bg-secondary-50 shadow" x-data="{
    mobileMenu: false
}">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <button type="button"
                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-500"
                    aria-controls="mobile-menu" aria-expanded="false" x-on:click="mobileMenu = !mobileMenu">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8 text-lg">
                    @foreach ($links as $link)
                        <a href="{{ $link['href'] }}" @class([
                            'inline-flex items-center border-b-2 border-primary-500 text-secondary-900' => $link['active'],
                            'border-transparent text-secondary-500 hover:border-secondary-300 hover:text-secondary-700' => !$link['active'],
                            'inline-flex items-center border-b-2 px-1 pt-1 font-medium'])>
                            {{ $link['label'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="sm:hidden" id="mobile-menu" x-show="mobileMenu" x-cloak x-transition>
        <div class="space-y-1 pt-2 pb-4">
            @foreach ($links as $link)
                <a href="{{ $link['active'] }}"
                    @class([
                        'border-primary-500 bg-primary-50 text-primary-700' => $link['active'],
                        'border-transparent text-secondary-500 hover:border-secondary-300 hover:bg-secondary-50 hover:text-secondary-700' => !$link['active'],
                        'block border-l-4 py-2 pl-3 pr-4 text-base font-medium'])>
                    {{ $link['label'] }}
                </a>
            @endforeach
        </div>
    </div>
</nav>
