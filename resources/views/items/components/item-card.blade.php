<a href="{{route('items.show',$item)}}" class="m-5 rounded-xl border border-gray-300 w-64 h-92 flex flex-col items-center">
    <div class="h-16 inline-flex items-center my-3 text-lg text-center">
        <h3>{{$item->name}}</h3>
    </div>
    <img src="{{$item->images}}"/>
    <div class="h-16 inline-flex items-center">
        <p>{{$item->price}} RSD</p>
    </div>
</a>
