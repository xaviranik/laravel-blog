@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @include('admin.includes.sidebar')
            </div>
            <div class="col-md-8">
                @include('admin.includes.errors')

                <div class="card">
                    <div class="card-header">Create New Tag</div>
                
                    <div class="card-body">
                        <form action="{{ route('tags.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="tag">Tag</label>
                                <input type="text" name="tag" class="form-control">
                            </div>

                            <div class="form-group">
                                <div class="text-center">
                                    <button class="btn btn-success" type="submit">Create Tag</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection