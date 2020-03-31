@extends('layouts.app')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Post-ID</th>
                <th scope="col">User-ID</th>
                <th scope="col">Title</th>
                <th scope="col">Created On</th>
                <th scope="col">Updated On</th>
                <th colspan="3"></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->user_id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->created_at}}</td>
                <td>{{$post->updated_at}}</td>
                <td><a class="btn btn-primary" href="{{route('admin.posts.show', $post->slug)}}">View</a></td>
                <td><a class="btn btn-secondary" href="">Edit</a></td>
                <td><a class="btn btn-danger" href="">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection