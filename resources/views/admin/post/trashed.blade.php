@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @include('admin.includes.sidebar')
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Trashed Posts</div>
                 
                    <div class="card-body">
                        @if (count($posts) == 0)
                            <h4>No trashed post to display!</h4>
                        @else
                            <table class="table table-hover">
                                <thead>
                                    <th>Image</th>
                                    <th>Post Name</th>
                                    <th>Edit</th>
                                    <th>Restore</th>
                                    <th>Delete</th>
                                </thead>
                               
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td><img src="{{ $post->featured }}" alt="" width="80px" height="50px"></td>
                                            <td>{{ $post->title }}</td>
                                            <td><a class="btn btn-sm btn-outline-primary" href="{{ route('post.edit', ['id' => $post->id]) }}"><i class="far fa-edit"></i></a></td>
                                            <td>
                                                <a class="btn btn-sm btn-outline-success" href="{{ route('post.restore', ['id' => $post->id]) }}"><i class="fas fa-redo-alt"></i></a>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-outline-danger" href="{{ route('post.kill', ['id' => $post->id]) }}"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection