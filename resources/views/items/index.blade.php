<x-app-layout>
    <div class="flex flex-col mx-auto py-4" style="width: 1280px;">
        <div class="flex justify-center items-center col-span-6 h-24 bg-white shadow-sm rounded-lg mb-3">
            <form class="w-11/12" method="POST" action="{{route('items.search')}}">
                @csrf
                <input class="w-10/12 form-input rounded-lg border border-amber-400 mr-3" type="text" name="searchTerm" />
                <x-primary-button>Search</x-primary-button>
            </form>
        </div>
        <div>
            <div class="inline-flex flex-col bg-white shadow-sm rounded-lg mr-3 p-3" style="width: 180px;">
                <h2 class="text-lg mb-2 mt-0">Categories</h2>
                @foreach($categories as $category)
                    <a href="{{route('category.items',$category)}}">{{$category->name}}</a>
                @endforeach
            </div>
            <div class="inline-flex flex-wrap justify-around bg-white shadow-sm rounded-lg"
                 style="width: 1080px;">
                @foreach ($items as $item)
                    <x-item-card :item="$item"></x-item-card>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
