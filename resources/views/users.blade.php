@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Users
                           <div class="pull-right">
                              <a class="btn btn-secondary" href="{{ URL('/create') }}"> Create User</a>
                           </div>
                    </div>

                    <div class="pull-right">
                    </div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                            @foreach ($users as $user)
                                <div class="panel-body">
                            {{ $user->name }}
                                <div class="pull-right">
                                    <a class="btn btn-primary" href="{{ route('update', ['id' => $user->id]) }}"> Update</a>
                                    <a class="btn btn-danger" href="{{ url('delete', ['id' => $user->id]) }}"> Delete</a>
                                </div>
                                </div>
                            @endforeach

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
