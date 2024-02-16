<x-app-layout>
    <div style="width:1280px" class="flex flex-col items-center">
        @include('order.form')
        <div class="my-6 flex w-5/6 flex-wrap bg-white shadow-sm rounded-lg divide-y justify-between">
            @php
                {{
                    $cartItems = session()->get('cart');
                }}
            @endphp
            @if($cartItems!=null&&is_array($cartItems))
                @foreach (session()->get('cart') as $item)
                    <x-item-card :item="$item"></x-item-card>
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
