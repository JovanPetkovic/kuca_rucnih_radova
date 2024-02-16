<x-app-layout>
    <div class="relative w-full h-[calc(100vh-120px)]">
        <div class="absolute p-6 bg-white shadow shadow-gray-300 rounded-xl w-4/5 flex top-1/2 left-1/2 justify-between -translate-x-1/2 -translate-y-1/2">
            <img class="w-2/5" src="{{$item->images}}" />
            <div class="max-h-full pl-6 flex flex-col justify-between w-2/5">
                <h2 class="text-2xl">{{$item->name}}</h2>
                <p>{{$item->description}}</p>
                <div class="flex">
                    @foreach($item->categories as $category)
                        <a href="{{route('category.items',$category)}}" class="mx-2 px-4 py-1 rounded-md bg-amber-300">{{$category->name}}</a>
                    @endforeach
                </div>
                <p>Cena: {{$item->price}} RSD</p>
                <form method="POST" action="{{ route('cart.store', $item) }}">
                    @csrf
                    @method('post')
                    <x-primary-button>
                        {{ __('Add to cart') }}
                    </x-primary-button>
                </form>
            </div>
            @if ($item->user->is(auth()->user()))
                <x-dropdown>
                    <x-slot name="trigger">
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('items.edit', $item)">
                            {{ __('Edit') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('items.destroy', $item) }}">
                            @csrf
                            @method('delete')
                            <x-dropdown-link :href="route('items.destroy', $item)" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Delete') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            @endif
        </div>
    </div>
</x-app-layout>
