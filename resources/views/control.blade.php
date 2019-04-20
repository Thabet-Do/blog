@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            {{--<div class="panel-heading">Control</div>--}}
            <div class="panel-body">
                <div class="w-75 align-items-center mx-auto d-flex">
                    <h4 class="mx-3">Filter:</h4>
                    <input type='number' class="form-control m-2 mb-3" id='txt_id' placeholder='Search By ID'>
                    <input type='text' class="form-control m-2 mb-3" id='txt_name' placeholder='Search By Name'>
                    <input type='text' class="form-control m-2 mb-3" id='txt_email' placeholder='Search By Email'>
                </div>
                <table class="table w-75 mx-auto" id="usersTable">
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
                            <td>#{{$user->id}}</td>
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

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#txt_id').keyup(function () {
                selectedCol(0,'txt_id')
            });
            $('#txt_name').keyup(function () {
                selectedCol(1,'txt_name')
            })
            ;$('#txt_email').keyup(function () {
                selectedCol(2,'txt_email')
            });
        });
        function selectedCol(colNumber,inputID) {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById(inputID);
            filter = input.value.toUpperCase();
            table = document.getElementById("usersTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[colNumber];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endsection