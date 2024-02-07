<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div>
            @foreach($categories as $category)
                <a href="{{route('category.items',$category)}}">{{$category->name}}</a>
            @endforeach
        </div>
        <form action="{{ route('items.search') }}" method="GET">
            <input type="text" name="search" placeholder="Search Products">
            <button type="submit">Search</button>
        </form>
        <form method="POST" action="{{ route('items.store') }}" enctype="multipart/form-data">
            @csrf
            <input
                type="text"
                name="name"
                placeholder="Naziv artikla"
                class="block w-96 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            />
            <textarea
                name="description"
                placeholder="Opis artikla"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            ></textarea>
            <input
                type="number"
                name="price"
                placeholder="Cena artikla"
                class="block w-96 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            />
            <input
                type="number"
                name="quantity"
                placeholder="Količina artikla"
                class="block w-96 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            />
            <label for="image">Select images to upload:</label>
            <input type="file" name="images[]" id="image" multiple/>
            <div>
                <label for="dropdown">Select an option:</label>
                <select id="itemCategories" name="categories[]" multiple="multiple" required>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Item') }}</x-primary-button>
        </form>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($items as $item)
                <div class="p-6 flex space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800">{{ $item->user->name }}</span>
                                <small class="ml-2 text-sm text-gray-600">{{ $item->created_at->format('j M Y, g:i a') }}</small>
                                @unless ($item->created_at->eq($item->updated_at))
                                    <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                @endunless
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
                                        <form method="POST" action="{{ route('cart.store', $item) }}">
                                            @csrf
                                            @method('post')
                                            <x-dropdown-link :href="route('cart.store', $item)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Add to cart') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            @endif
                        </div>
                        <p class="mt-4 text-lg text-gray-900">Naziv: {{ $item->name }}</p>
                        <p class="mt-4 text-lg text-gray-900">Opis: {{ $item->description }}</p>
                        <p class="mt-4 text-lg text-gray-900">Cena: {{ $item->price }}</p>
                        <p class="mt-4 text-lg text-gray-900">Kolicina: {{ $item->quantity }}</p>
                        @php
                        {{
                            $imageNames = explode(';', $item->images);
                        }}
                        @endphp
                        <div class="flex">
                        @foreach($item->categories as $category)
                           <p class="mr-2 rounded-md bg-amber-400 px-1 py-0.5">{{$category->name}}</p>
                        @endforeach
                        </div>
                        @foreach($imageNames as $imageName)
                            <img class="border-gray-100 m-2 rounded-lg"src="{{$imageName }}" alt="{{$imageName}}">
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
