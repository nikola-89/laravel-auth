@extends('layouts.app')

@section('content')
    @if (session('message'))
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="alert {{session('message')['success'] ? 'alert-success' : 'alert-danger'}} text-center">
                        <p>Operation Type: {{session('message')['type']}}</p>
                        <p>PostID: {{session('message')['id']}}</p>
                        <strong>{{session('message')['success'] ? 'SUCCESSFUL' : 'FAILED'}}</strong>
                        @if (!empty(session('message')['sms']))
                            <strong>{{session('message')['sms']}}</strong>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
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
                <td><a class="btn btn-secondary" href="{{route('admin.posts.edit', $post->slug)}}">Edit</a></td>
                <td>
                    <form action="{{route('admin.posts.destroy', $post->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection