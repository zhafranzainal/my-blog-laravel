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
                    <div class="col-4">
                        <p>Create new Post</p>
                        <a href="{{route('create')}}" class="btn btn-outline-primary">Add Post</a>
                    </div>
                </div>
                <br>
                <table class="table table-bordered">
                    <tr class="text-center">
                        <th>Blog</th>
                        <th>Author</th>
                    </tr>
                    @forelse($posts as $post)
                    <tr>
                        <td><a href="{{route('show', [$post->id])}}">{{ ucfirst($post->title)}}</a></td>
                        <td class="text-center">{{ ucfirst($post->user->name)}}</td>
                    </tr>
                    @empty
                        <p class="text-warning">No blog Posts available</p>
                    @endforelse
                    
                </table>                
            </div>
        </div>
    </div>
@endsection