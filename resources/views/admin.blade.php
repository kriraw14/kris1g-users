@extends('layouts.app')

@section('content')
    <div class="table-responsive table-hover">
        <table class="table table-condensed .info">
        <thead>
        <th>First Name</th>
        <th>Last Name</th>
        <th>E-Mail <i class="fa fa-envelope" aria-hidden="false"></i></th>
        <th>User <i class="fa fa-user" aria-hidden="true"></i></th>
        <th>Admin <i class="fa fa-user" aria-hidden="true"></i></th>
        <th></th>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <form action="{{ route('admin.assign') }}" method="post">
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user-> email }}"></td>
                    <td><input type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }} name="role_user"></td>
                    <td><input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin"></td>
                    {{ csrf_field() }}
                    <td><button type="submit" class="btn btn-success"><i class="icon-circle-arrow-right icon-large"></i>Assign Roles</button></td>
                </form>
            </tr>
        @endforeach
        </tbody>
        </table>
    </div>
@endsection