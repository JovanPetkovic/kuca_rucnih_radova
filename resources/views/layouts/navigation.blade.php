<nav class="flex justify-between items-center z-1000 bg-white dark:bg-gray-800 border-b pb-1 border-gray-100 dark:border-gray-700 w-full h-16 fixed top-0 start-0">
    <a href="/">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="mx-9 bi bi-house-heart" viewBox="0 0 16 16">
            <path d="M8 6.982C9.664 5.309 13.825 8.236 8 12 2.175 8.236 6.336 5.309 8 6.982"/>
            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.707L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.646a.5.5 0 0 0 .708-.707L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
        </svg>
    </a>
    <div class="w-1/2 mx-auto h-16 flex items-center justify-between text-xl">
        <a class="cursor-pointer border-b-2 border-white hover:border-amber-400 w-1/5 h-full flex items-center justify-center" href="{{route('category.all')}}"><p>Prodavnica</p></a>
        <a class="cursor-pointer border-b-2 border-white hover:border-amber-400 w-1/5 h-full flex items-center justify-center" href="/category/61"><p>Suveniri</p></a>
        <a class="cursor-pointer border-b-2 border-white hover:border-amber-400 w-1/5 h-full flex items-center justify-center" href="/category/62"><p>Etno</p></a>
        <a class="cursor-pointer border-b-2 border-white hover:border-amber-400 w-1/5 h-full flex items-center justify-center" href="/category/63"><p>Vezovi</p></a>
        <a class="cursor-pointer border-b-2 border-white hover:border-amber-400 w-1/5 h-full flex items-center justify-center" href="/category/64"><p>Pokloni</p></a>
    </div>
    <div class="flex items-center">
    @if (Auth::check())
        <x-dropdown>
            <x-slot name="trigger">
                <button>
                    <p class="text-lg">Kontrola</p>
                </button>
            </x-slot>
            <x-slot name="content">
                <x-dropdown-link :href="route('categories.index')">
                    {{ __('Kategorije') }}
                </x-dropdown-link>
                <x-dropdown-link :href="route('items.add')">
                    {{ __('Dodaj artikal') }}
                </x-dropdown-link>
                <x-dropdown-link :href="route('orders.index')">
                    {{ __('Narudzbine') }}
                </x-dropdown-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                                     onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    @endif
    <a href="{{route('cart.index')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="mx-9 bi bi-bag" viewBox="0 0 16 16">
            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
        </svg>
    </a>
    </div>
</nav>
