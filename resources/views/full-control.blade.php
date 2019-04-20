@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table  mx-auto">
                    <div class="tr">
                        <div class="th">ID</div>
                        <div class="th">Name</div>
                        <div class="th">Username</div>
                        <div class="th">E-mail</div>
                        <div class="th">Role</div>
                        <div class="th"></div>
                        <div class="th"></div>
                    </div>
                    @foreach($users as $user)
                        <form method="post" class="tr" action="/update-user/{{$user->id}}">
                            @csrf
                            <div class="td">
                                <input type="number" title="id" class="form-control" name="id" value="{{$user->id}}">
                            </div>
                            <div class="td">
                                <input type="text" title="name" class="form-control" name="name" value="{{$user->name}}">
                            </div>
                            <div class="td">
                                <input type="text" title="username" class="form-control" name="username" value="{{$user->username}}">
                            </div>
                            <div class="td">
                                <input type="email" title="email" class="form-control" name="email" value="{{$user->email}}">
                            </div>
                            <div class="td">
                                <div class="form-group mb-0">
                                    <select class="form-control" name="role" title="privilege">
                                        <option value="1" {{ $user->role == 1 ? 'selected' : null }} >Admin</option>
                                        <option value="2" {{ $user->role == 2 ? 'selected' : null }} >Manager</option>
                                        <option value="3" {{ $user->role == 3 ? 'selected' : null }} >User</option>
                                    </select>
                                </div>
                            </div>
                            <div class="td">
                                <button type="submit" class="btn btn-outline-primary" >Save</button>
                            </div>
                            <div class="td">
                                <button class="btn btn-outline-danger" onclick="window.open('/delete-user/{{$user->id}}','_self')">Delete</button>
                                <script src="">


                                </script>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection