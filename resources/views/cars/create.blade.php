@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="uppercase bold text-5xl">
                create car
            </h1>
        </div>
        <div class="flex justify-center pt-20">
            <form action="/cars" method="POST">
                @csrf
                <div class="block">
                    <input type="text"
                    class="block w-80 shadow-5xl mb-10 p-2 italic placeholder-gray-400"
                    name="name"
                    placeholder="Brand name....">
                </div>
                <div class="block">
                    <input type="text"
                    class="block w-80 shadow-5xl mb-10 p-2 italic placeholder-gray-400"
                    name="founded"
                    placeholder="Founded....">
                </div>
                <div class="block">
                    <input type="text"
                    class="block w-80 shadow-5xl mb-10 p-2 italic placeholder-gray-400"
                    name="description"
                    placeholder="Description...">
                </div>
                <button type="submit" class="uppercase shadow-5xl w-80 p-2 mb-10 bg-green-500 block font-bold">
                    Submit
                </button>
            </form>
        </div>
        
        @if ($errors->any())
            <div class="w-4/8 m-auto text-center">
                @foreach ($errors->all() as $error)
                    <li class="text-red-500 list-none">
                        {{ $error }}
                    </li>
                @endforeach
            </div>
        @endif

    </div>
@endsection
