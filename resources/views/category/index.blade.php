<x-app-layout>
    <div>
        <form method="POST" action="{{route('categories.store')}}">
            @csrf
            <label for="name">Category name</label>
            <input name="name" type="text"/>
            <x-primary-button class="mt-4">{{ __('Dodaj kategoriju') }}</x-primary-button>
        </form>
        <div class="flex flex-wrap">
            @foreach($categories as $category)
                <div x-data="{showEdit: false}">
                    <div x-show="!showEdit"class="mx-4 my-4 w-64 h-9 border-b-blue-950 flex justify-between items-center">
                        <p>{{$category->name}}</p>
                        <div class="flex">
                            <form method="POST" action="{{route('categories.destroy',$category)}}" class="my-0 mr-2">
                                @csrf
                                @method('DELETE')
                                <x-primary-button>{{ __('Obrisi') }}</x-primary-button>
                            </form>
                            <x-primary-button x-on:click="showEdit= true" class="edit-btn">{{ __('Izmeni') }}</x-primary-button>
                        </div>
                    </div>
                    <form x-show="showEdit" class="mx-4 my-4 w-64 h-9 border-b-blue-950 flex justify-between items-center" method="POST" action="{{route('categories.update',$category)}}">
                        @csrf
                        @method("PATCH")
                        <input class="w-32 p-1" name="name" type="text" value="{{$category->name}}"/>
                        <x-primary-button>{{ __('Izmeni') }}</x-primary-button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
