@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="post">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{$post->title}}</h5>
                            <p class="card-text">{{$post->body}}</p>
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                            <p class="card-text m-0">{{$post->user->name}} il {{$post->created_at}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 d-flex justify-content-center">
                <a class="btn btn-success" href="">Add Comment</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                @foreach($post->comments as $comment)
                    <div class="comment mb-5">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{$comment->title}}</h5>
                                <p class="card-text">{{$comment->body}}</p>
                            </div>
                            <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                                <p class="card-text m-0">{{$comment->name}} il {{$comment->created_at}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection