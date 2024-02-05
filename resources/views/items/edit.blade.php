<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('items.update',$item) }}">
            @csrf
            @method('patch')
            <input
                type="text"
                name="name"
                value="{{$item['name']}}"
                class="block w-96 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            />
            <textarea
                name="description"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{$item['description']}}</textarea>
            <input
                type="number"
                name="price"
                value="{{$item['price']}}"
                class="block w-96 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            />
            <input
                type="number"
                name="quantity"
                value="{{$item['quantity']}}"
                class="block w-96 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            />
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <div>
                <label for="dropdown">Select an option:</label>
                <select id="itemCategories" name="categories[]" multiple="multiple" required>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('items.index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
