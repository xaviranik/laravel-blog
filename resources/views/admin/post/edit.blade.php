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
                    <div class="card-header">Update Post</div>
                
                    <div class="card-body">
                        <form action="{{ route('post.update', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                            </div>
                            <div class="form-group">
                                <label for="category">Select Category</label>
                                <select name="category_id" id="category" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"

                                            @if ($post->category->id == $category->id)
                                                selected
                                            @endif
      
                                        >{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tag">Tags</label>
                                <div class="checkbox">
                                    @foreach ($tags as $tag)
                                        <label for="tag"><input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                            
                                            @foreach ($post->tags as $t)
                                                @if ($tag->id == $t->id)
                                                    checked
                                                @endif
                                            @endforeach                           
                                             
                    
                                        > {{ $tag->tag }}</label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="featured">Featured Image</label>
                                <input type="file" name="featured" class="form-control-file">
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ $post->content }}</textarea>
                            </div>    
                            <div class="form-group">
                                <div class="text-center">
                                    <button class="btn btn-success" type="submit">Update Post</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection