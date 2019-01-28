@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            @include('admin.includes.sidebar')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All users</div>

                <div class="card-body">
                    @if (count($users) == 0)
                    <h4>No user to display!</h4>
                    @else
                    <table class="table table-hover">
                        <thead>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Delete</th>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>
                                    <img src="{{ asset($user->profile->avatar) }}" alt="" width="35px" height="35px"
                                        style="border-radius: 50%;">
                                </td>

                                <td>
                                    {{ $user->name }}
                                </td>

                                <td>
                                    @if ($user->admin)
                                    <a href="{{ route('user.remove.admin', ['id' => $user->id]) }}" class="btn btn-sm btn-outline-danger">Remove
                                        Admin</a>
                                    @else
                                    <a href="{{ route('user.admin', ['id' => $user->id]) }}" class="btn btn-sm btn-outline-success">Make
                                        Admin</a>
                                    @endif
                                </td>

                                <td>
                                    @if (Auth::user()->id == $user->id)
                                    <button class="btn btn-sm" disabled><i class="fas fa-lock"></i></button>
                                    @else
                                    <form action="{{ route('user.destroy', ['id' => $user->id]) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                    @endif
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
