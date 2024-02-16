<x-app-layout>
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
</x-app-layout>
