@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <h1 class="display-one mt-5 display-4">{{ config('app.name') }}</h1>
                <p class="pt-3">Login and start blogging now ! Have Fun!</p>
                <br>
                <a href="{{route('index')}}" class="btn btn-outline-primary">Login MyBlog</a>
            </div>
        </div>
    </div>
@endsection