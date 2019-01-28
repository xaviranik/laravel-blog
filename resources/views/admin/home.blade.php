@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            @include('admin.includes.sidebar')
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-header">
                            <strong>Published Post</strong>
                        </div>
                
                        <div class="card-body">
                            <h1>{{ $post_count }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-header">
                            <strong>Trashed Post</strong>
                        </div>
                
                        <div class="card-body">
                            <h1>{{ $trashed_post_count }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-header">
                            <strong>Users</strong>
                        </div>
                
                        <div class="card-body">
                            <h1>{{ $user_count }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-header">
                                <strong>Category</strong>
                            </div>
                    
                            <div class="card-body">
                                <h1>{{ $category_count }}</h1>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
