<x-app-layout>
    <div style="width: 1280px" class="mx-auto flex flex-col items-center">

        @foreach($orders as $order)
            <div class="my-4 p-4 bg-white shadow-sm rounded-lg">
                <div class="mb-4">
                    <p>Ime: {{$order->full_name}}</p>
                    <p>Broj telefona: {{$order->phone_number}}</p>
                    <p>Adresa: {{$order->street_address}}</p>
                    <p>Grad: {{$order->city}}</p>
                    <p>Drzava: {{$order->country}}</p>
                    <p>Postanski broj: {{$order->postal_code}}</p>
                    <p>Imejl adresa: {{$order->email_address}}</p>
                    <p>Dodatne instrukcije: {{$order->delivery_instructions}}</p>
                    <p>Datum narucivanja: {{$order->order_date}}</p>
                </div>
                <hr/>
                <div class="mx-auto flex flex-wrap justify-around"
                     style="width: 1080px;">
                    @foreach($order->items as $item)
                        <x-item-card :item="$item"></x-item-card>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
