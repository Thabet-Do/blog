@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            {{--<div class="panel-heading">Control</div>--}}
            <div class="panel-body">
                <table class="table w-75 mx-auto">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Role</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">#{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if(Auth::user()->role == 2 || $user->id == 1)
                                    Disabled
                                @else
                                    <div class="form-group mb-0">
                                        <form method="post" action="/update-role/{{$user->id}}">
                                            @csrf
                                            <select class="form-control" name="role" onchange="this.form.submit()">
                                                <option value="1" {{ $user->role == 1 ? 'selected' : null }} >Admin</option>
                                                <option value="2" {{ $user->role == 2 ? 'selected' : null }} >Manager</option>
                                                <option value="3" {{ $user->role == 3 ? 'selected' : null }} >User</option>
                                            </select>
                                        </form>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection