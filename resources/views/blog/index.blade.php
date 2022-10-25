@extends('layouts.app')
@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-4">Our Blog!</h1>
                        <p>Enjoy reading our posts. Click on a post to read!</p>
                    </div>
                    <div class="col-4 text-center">
                        <p>Create new Post</p>
                        <a href="/blog/create/post" class="btn btn-outline-primary">Add Post</a>
                    </div>
                </div>
                <br>
                <table class="table table-bordered">
                    @forelse($posts as $post)
                    <tr>
                        <td><li><a href="./blog/{{ $post->id }}">{{ ucfirst($post->title) }}</a></li></td>
                    </tr>
                    @empty
                        <p class="text-warning">No blog Posts available</p>
                    @endforelse
                    
                </table>                
            </div>
        </div>
    </div>
@endsection