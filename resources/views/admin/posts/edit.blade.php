@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger text-center">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="border border-light p-5" action="{{route('admin.posts.update', $post)}}" method="post">
                    @csrf
                    @method('PATCH')

                    <p class="h4 mb-4 text-center">Edit Post</p>

                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control mb-4" placeholder="" value="{{$post->title}}">

                    <label for="body">Body</label>
                    <textarea id="body" name="body" class="form-control mb-4" rows="15" placeholder="">{{$post->body}}</textarea>

                    <input type="hidden" name="user_id" value="{{Auth::id()}}">

                    <button class="btn btn-success" type="submit">Save Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection