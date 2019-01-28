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
                    <div class="card-header">Create New Post</div>
                
                    <div class="card-body">
                        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="category">Select Category</label>
                                <select name="category_id" id="category" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tag">Tags</label>
                                <div class="checkbox">
                                    @foreach ($tags as $tag)
                                        <label for="tag"><input type="checkbox" name="tags[]" value="{{ $tag->id }}"> {{ $tag->tag }}</label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="featured">Featured Image</label>
                                <input type="file" name="featured" class="form-control-file">
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" id="summernote" cols="30" rows="10" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <div class="text-center">
                                    <button class="btn btn-success" type="submit">Create Post</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>

    <script>
      $('#summernote').summernote();
    </script>
@endsection
