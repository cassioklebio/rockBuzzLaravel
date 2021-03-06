@extends('layouts.admin')

@section('content')
    <div class="container">
        <breadcrumb v-bind:lista="{{$listaBreadCrumb}}"></breadcrumb>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div><h2>Posts</h2></div>
                        <div class="text-right"><a class="btn btn-secondary" href="{{ url('posts/create') }}">create</a></div>
                    </div>

                    <div class="card-body">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        <a href="{{ url('posts/edit/' . $post->id) }}">edit</a>
                                        <a href="{{ url('posts/destroy/' . $post->id) }}">destroy</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
