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
            $items = \App\Models\Item::take(4)->get();
        }}
    @endphp
    @include('layouts.navigation')
    <div style="background: url('{{@asset('/images/hero.webp')}}') rgba(0,0,0,0.3);
                background-size: cover;
                background-blend-mode: multiply;"
         class="top-16 w-full h-screen bg-dots-darker flex items-center justify-center">
        <div class="text-white z-1 text-5xl flex flex-col items-center">
            <h1 class="mb-4">Kuća Ručnih Radova</h1>
            <x-primary-button><a class="w-full h-full" href="{{route('category.all')}}">Prodavnica</a></x-primary-button>
        </div>
    </div>
    <div class="my-8 flex flex-col items-center justify-between">
        <h2 class="my-8 text-4xl">Nađite Savršen Poklon</h2>
        <div class="mb-8 flex flex-wrap w-3/4 justify-between">
            @foreach($items as $item)
            <x-item-card :item="$item"></x-item-card>
            @endforeach
        </div>
        <x-primary-button><a class="w-full h-full" href="{{route('category.all')}}">Pogledaj poklone</a></x-primary-button>
    </div>
</div>
</body>
</html>
