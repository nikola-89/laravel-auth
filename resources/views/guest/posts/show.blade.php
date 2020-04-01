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
            <div class="col-12">
                @forelse ($post->comments as $comment)
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
                @empty
                    <div class="comment mb-5 font-italic text-center">
                        <h3>No comments</h3>
                    </div>
                @endforelse
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <form action="{{route('comments.store')}}" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-group row">
                        <label for="name" class="col-4 col-form-label">Name</label>
                        <div class="col-12">
                            <input id="name" name="name" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-4 col-form-label">eMail</label>
                        <div class="col-12">
                            <input id="email" name="email" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-4 col-form-label">Title</label>
                        <div class="col-12">
                            <input id="title" name="title" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="body" class="col-4 col-form-label">Body</label>
                        <div class="col-12">
                            <textarea id="body" name="body" cols="40" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <button name="submit" type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection