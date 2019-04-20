@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Profile</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        ID: {{Auth::user()->id}} <hr>
                            Name: {{Auth::user()->name}} <hr>
                            Username: {{Auth::user()->username}} <hr>
                            Email: {{Auth::user()->email}}<hr>
                        <div>
                            <button class="btn btn-primary" onclick="window.open('/id/edit/{{Auth::user()->id}}')">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
