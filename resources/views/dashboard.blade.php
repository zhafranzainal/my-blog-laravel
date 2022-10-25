<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>

    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-12 text-center pt-5">
                    <h1 class="display-one mt-5 display-4">{{ config('app.name') }}</h1>
                    <p class="pt-3">Login and start blogging now ! Have Fun!</p>
                    <br>
                    <a href="{{route('index')}}" class="btn btn-outline-primary">Show MyBlog</a>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
