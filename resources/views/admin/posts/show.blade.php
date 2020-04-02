@extends('layouts.app')

@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">PostID</th>
            <th scope="col">UserID</th>
            <th scope="col">Title</th>
            <th scope="col">Tags</th>
            <th scope="col">Body</th>
            <th scope="col">Created On</th>
            <th scope="col">Updated On</th>
            <th colspan="2"></th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->user_id}}</td>
                <td>{{$post->title}}</td>
                <td>@foreach ($post->tags as $tag) <p>{{$tag->name}}</p> @endforeach</td>
                <td>{{$post->body}}</td>
                <td>{{$post->created_at}}</td>
                <td>{{$post->updated_at}}</td>
                <td><a class="btn btn-secondary" href="{{route('admin.posts.edit', $post->slug)}}">Edit</a></td>
                <td>
                    <form action="{{route('admin.posts.destroy', $post->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
@endsection