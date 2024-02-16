<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    @vite('resources/css/app.css')
</head>
<body class="antialiased">
<div class="w-full">
    @php
        {{
            $gifts = \App\Models\Item::take(3)->get();
            $categories = \App\Models\Category::take(3)->get();
            $souvenirCategory = \App\Models\Category::where('id',61)->get()[0];
            $souvenirs = $souvenirCategory->items;
        }}
    @endphp
    @include('layouts.navigation')
    <div style="background: url('{{@asset('/images/hero.webp')}}') rgba(0,0,0,0.3);
                background-size: cover;
                background-blend-mode: multiply;"
         class="top-16 w-full h-screen bg-dots-darker flex items-center justify-center">
        <div class="text-white z-1 text-5xl flex flex-col items-center">
            <h1 class="mb-4">Kuća Ručnih Radova</h1>
            <x-primary-button><a class="w-full" href="{{route('category.all')}}">Prodavnica</a></x-primary-button>
        </div>
    </div>
    <div class="my-12 pb-12 border-b border-gray-300 flex flex-col items-center justify-between">
        <h2 class="my-8 text-4xl">Nađite Savršen Poklon</h2>
        <div class="mb-8 flex flex-wrap w-3/4 justify-between">
            @foreach($gifts as $item)
            <x-item-card :item="$item"></x-item-card>
            @endforeach
        </div>
        <x-primary-button><a class="w-full" href="{{route('category.all')}}">Svi pokloni</a></x-primary-button>
    </div>
    <div class="my-12 pb-12 border-b border-gray-300 flex items-center justify-around">
        @foreach($categories as $item)
            <div class="w-72 h-72 shadow shadow-gray-300 flex items-end"
                 style="background: url('https://picsum.photos/id/{{rand(1,100)}}/300') rgba(0,0,0,0.3);
                        background-blend-mode: multiply;">
                <div class="m-9">
                    <h2 class="text-3xl text-white mb-4">{{$item->name}}</h2>
                    <x-primary-button><a class="w-full" href="{{route('category.items',$item)}}">Vidi artikle</a></x-primary-button>
                </div>
            </div>
        @endforeach
    </div>
    <div class="w-3/4 text-lg mx-auto text-center my-12 pb-12 border-b border-gray-300 flex flex-col items-center justify-around">
        <h2 class="mb-4 text-3xl">O nama</h2>
        <p class="my-4">Mi smo strastveni entuzijasti koji se dive lepoti ručno izrađenih predmeta. U srcu naših radova leže kreativnost, posvećenost i ljubav prema umetnosti stvaranja nečeg posebnog.</p>
        <p class="my-4">Naša misija je promovisati lepotu ručnih radova i podržati lokalne umetnike i majstore svojim radom. Svaki komad koji napravimo nosi u sebi priču, pažnju i individualnost. Ovde ne stvaramo samo predmete, već i veze s onima koji cene unikatnost i autentičnost.</p>
        <p class="my-4">U našem asortimanu možete pronaći široku paletu proizvoda, od unikatnog nakita i dekorativnih predmeta do funkcionalnih i estetski privlačnih komada za svakodnevnu upotrebu. Svaki od njih pažljivo je oblikovan i izrađen s ljubavlju, težimo stvaranju predmeta koji će oplemeniti vaš dom i život.</p>
        <p class="my-4">Pridružite nam se u otkrivanju lepote ručnog rada i podržite lokalnu umetničku scenu. Budite deo naše priče i dopustite da vas inspirišemo svojim delima.
        <p class="my-4">Hvala vam što ste tu s nama.</p>
    </div>
    <div class="mt-12 pb-12 border-b border-gray-300 flex flex-col items-center justify-between">
        <h2 class="my-8 text-4xl">Nađite Suvenire za Vas</h2>
        <div class="mb-8 flex flex-wrap w-3/4 justify-between">
            @foreach($souvenirs as $item)
                <x-item-card :item="$item"></x-item-card>
            @endforeach
        </div>
        <x-primary-button><a class="w-full" href="{{route('category.items',$souvenirCategory)}}">Svi suveniri</a></x-primary-button>
    </div>
</div>
@include('layouts.footer')
</body>
</html>
