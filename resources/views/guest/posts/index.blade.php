@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @foreach ($posts as $post)
                    <div class="post m-5">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{$post->title}}</h5>
                                <p class="card-text">{{$post->body}}</p>
                                <p class="card-text">@foreach ($post->tags as $tag) <a href="#">#{{$tag->name}}</a> @endforeach</p>
                            </div>
                            <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                                <p class="card-text m-0">{{$post->user->name}} il {{$post->created_at}}</p>
                                <a class="btn btn-info" href="{{route('posts.show', $post->slug)}}">View</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection