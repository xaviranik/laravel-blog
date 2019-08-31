@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @include('admin.includes.sidebar')
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Posts</div>
                 
                    <div class="card-body">
                        @if (count($posts) == 0)
                            <h4>No post to display!</h4>
                        @else
                            <table class="table table-hover">
                                <thead>
                                    <th>Post Name</th>
                                    <th>Edit</th>
                                    <th>Trash</th>
                                </thead>
                               
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $post->title }}</td>
                                            <td><a class="btn btn-sm btn-outline-primary" href="{{ route('post.edit', ['id' => $post->id]) }}"><i class="far fa-edit"></i></a></td>
                                             
                                            <td>
                                                <form action="{{ route('post.destroy', ['id' => $post->id]) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></button>
                                                </form>
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