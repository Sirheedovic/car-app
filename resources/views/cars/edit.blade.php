@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="uppercase bold text-5xl">
                update car
            </h1>
        </div>
        <div class="flex justify-center pt-20">
            <form action="/cars/{{ $car->id }}/" method="POST">
                @csrf
                @method('PUT')
                <div class="block">
                    <input type="text"
                    class="block w-80 shadow-5xl mb-10 p-2 italic placeholder-gray-400"
                    name="name"
                    value="{{ $car->name }}">
                </div>
                <div class="block">
                    <input type="text"
                    class="block w-80 shadow-5xl mb-10 p-2 italic placeholder-gray-400"
                    name="founded"
                    value="{{ $car->founded }}">
                </div>
                <div class="block">
                    <input type="text"
                    class="block w-80 shadow-5xl mb-10 p-2 italic placeholder-gray-400"
                    name="description"
                    value="{{ $car->description }}">
                </div>
                <button type="submit" class="uppercase shadow-5xl w-80 p-2 mb-10 bg-green-500 block font-bold">
                    Submit
                </button>
            </form>
        </div>

    </div>
@endsection
