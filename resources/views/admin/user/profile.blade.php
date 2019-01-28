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
                    <div class="card-header">Your Profile</div>
                
                    <div class="card-body">
                        <form action="{{ route('profile.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">
                            <div class="form-group">
                                <label for="tag">Name</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="tag">E-mail</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="featured">Avatar</label>
                                <input type="file" name="avatar" class="form-control-file">
                            </div>

                            <div class="form-group">
                                <label for="tag">Youtube Account</label>
                                <input type="text" name="youtube" value="{{ $user->profile->youtube }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="tag">Facebook Account</label>
                                <input type="text" name="facebook" value="{{ $user->profile->facebook }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="tag">About</label>
                                <textarea class="form-control" name="about" id="about" cols="6" rows="6">{{ $user->profile->about }}</textarea>
                            </div>

                            <div class="form-group">
                                <div class="text-center">
                                    <button class="btn btn-success" type="submit">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection