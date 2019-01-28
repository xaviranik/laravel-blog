@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @include('admin.includes.sidebar')
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Tags</div>
                 
                    <div class="card-body">
                        @if (count($tags) == 0)
                            <h4>No tags to display!</h4>
                        @else
                            <table class="table table-hover">
                                <thead>
                                    <th>Category Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </thead>
                               
                                <tbody>
                                    @foreach ($tags as $tag)
                                        <tr>
                                            <td>{{ $tag->tag }}</td>
                                            <td><a class="btn btn-sm btn-outline-primary" href="{{ route('tags.edit', ['id' => $tag->id]) }}"><i class="far fa-edit"></i></a></td>
                                             
                                            <td>
                                                <form action="{{ route('tags.destroy', ['id' => $tag->id]) }}" method="POST">
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