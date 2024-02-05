<x-app-layout>
    <div x-data="{showEdit: false}">
        <form method="POST" action="{{route('category.store')}}">
            @csrf
            <label for="name">Category name</label>
            <input name="name" type="text"/>
            <x-primary-button class="mt-4">{{ __('Dodaj kategoriju') }}</x-primary-button>
        </form>
        <form x-show="showEdit" x-transition method="POST" action="{{route('category.update')}}">
            @csrf
            @method("PATCH")
            <label for="name">Category name</label>
            <input name="name" type="text"/>
            <x-primary-button class="mt-4">{{ __('Izmeni kategoriju') }}</x-primary-button>
        </form>
        <div class="flex flex-wrap">
            @foreach($categories as $category)
                <div x-data="{data=@json($category->id)}" class="mx-4 my-4 w-64 border-b-blue-950 flex justify-between items-center">
                    <p>{{$category->name}}</p>
                    <div class="flex">
                        <form method="POST" action="{{route('category.destroy',$category)}}" class="my-0 mr-2">
                            @csrf
                            @method('DELETE')
                            <x-primary-button>{{ __('Obrisi') }}</x-primary-button>
                        </form>
                        <x-primary-button x-on:click="showEdit=true">{{ __('Izmeni') }}</x-primary-button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
