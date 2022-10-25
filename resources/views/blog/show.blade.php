@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-5">
                <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
                <h1 class="display-one pt-3 display-5">{{ ucfirst($post->title) }}</h1>
                <p class="m-3">{!! $post->body !!}</p> 
                <br><hr class="pt-3">
                @if ($post->user_id == auth()->user()->id)
                    <a href="{{route('edit', [$post->id]), 'edit'}}" class="btn btn-outline-primary">Edit Post</a>
                @else
                    
                @endif
                <br><br>
                @if ($post->user_id == auth()->user()->id)
                    <form id="delete-frm" class="" action="" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Delete Post</button>
                    </form>
                @else
                    
                @endif
            </div>
        </div>
    </div>
@endsection