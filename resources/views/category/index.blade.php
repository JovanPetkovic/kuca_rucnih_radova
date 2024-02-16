<x-app-layout>
    <div>
        <form method="POST" class="flex items-center py-4" action="{{route('categories.store')}}">
            @csrf
            <label for="categoryName">Category name</label>
            <input name="categoryName" class="mx-4" type="text"/>
            <x-primary-button>{{ __('Dodaj kategoriju') }}</x-primary-button>
        </form>
        <div style="width: 1280px" class="mx-auto flex flex-wrap justify-between">
            @foreach($categories as $category)
                <div x-data="{showEdit: false}">
                    <div style="width: 360px" x-show="!showEdit" class="rounded-lg bg-white p-6 mx-4 my-4 h-9 shadow-md flex justify-between items-center">
                        <p>{{$category->name}}</p>
                        <div class="flex">
                            <form method="POST" action="{{route('categories.destroy',$category)}}" class="my-0 mr-2">
                                @csrf
                                @method('DELETE')
                                <x-primary-button class="h-9 w-24">{{ __('Obrisi') }}</x-primary-button>
                            </form>
                            <x-primary-button  x-on:click="showEdit= true" class="edit-btn h-9 w-24">{{ __('Izmeni') }}</x-primary-button>
                        </div>
                    </div>
                    <form x-show="showEdit" style="width: 360px" class="rounded-lg bg-white p-6 mx-4 my-4 h-9 shadow-md flex justify-between items-center" method="POST" action="{{route('categories.update',$category)}}">
                        @csrf
                        @method("PATCH")
                        <input class="w-32 p-1" name="name" type="text" value="{{$category->name}}"/>
                        <x-primary-button class="h-9 w-24">{{ __('Izmeni') }}</x-primary-button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
