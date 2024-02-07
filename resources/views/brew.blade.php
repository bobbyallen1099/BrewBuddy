@extends('layouts.page')

@section('content')
    <div class="py-32 bg-indigo-700 font-sans">
        <div class="container mx-auto">
            <div class="max-w-6xl mx-auto flex flex-col lg:flex-row items-center justify-between">
                <img src="{{$brew->image_url}}" class="max-w-30 max-h-60 p-4 bg-white rounded-lg shadow">
                <div class="p-3">
                    <div class="text-indigo-100 text-white font-semibold text-3xl">{{ $brew->name }}</div>
                    <div class="text-indigo-200 font-semibold text-xl">{{ $brew->tagline }}</div>
                    <div class="text-indigo-400 font-semibold text-md">{{ $brew->since }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto p-2">
        <div class="max-w-6xl mx-auto bg-white -mt-20 py-6 px-3 rounded-lg shadow">
            <div class="grid grid-cols-2 sm:grid-cols-4  gap-4 text-gray-600 text-2xl text-center">
                <div>
                    <div class="font-semibold text-3xl">PH</div>
                    <div>{{ $brew->ph }}</div>
                </div>
                <div>
                    <div class="font-semibold text-3xl">ABV</div>
                    <div>{{ $brew->abv }}</div>
                </div>
                <div>
                    <div class="font-semibold text-3xl">IBU</div>
                    <div>{{ $brew->ibu }}</div>
                </div>
                <div>
                    <div class="font-semibold text-3xl">Volume</div>
                    <div>{{ $brew->volume }}</div>
                </div>
            </div>
            <div class="mt-6 pt-5 px-2 border-t grid grid-cols-2 gap-4 ">
                <div>
                    <div class="font-semibold underline">Description</div>
                    <div>{{ $brew->description }}</div>
                </div>
                <div>
                    <div class="font-semibold underline">Food Paring</div>
                    <ol class="list-decimal ml-5">
                        @foreach($brew->food_pairing as $pairing)
                            <li>{{ $pairing }}</li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
        <div class="mt-5 text-center">
            <a class="px-4 py-3 rounded bg-gray-100 text-gray-800 font-semibold" href="{{route('home')}}">Go back</a>
        </div>
    </div>
@endsection