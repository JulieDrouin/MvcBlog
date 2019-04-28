@extends('layouts.app')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card uper">
                    <div class="card-header">
                        Edit User
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                        @endif
                        <form method="post" action="{{ route('update', Auth::user()->id) }}">
                            <div class="form-group">
                                @csrf
                                @method('POST')
                                <label for="username">Username :</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}"/>
                            </div>
                            <div class="form-group">
                                <label for="name">Name :</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}"/>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Lastname :</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" value="{{$user->lastname}}"/>
                            </div>
                            <div class="form-group">
                                <label for="birthdate">Birthdate :</label>
                                <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{$user->birthdate}}"/>
                            </div>
                            <div class="form-group">
                                <label for="email">Email :</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}"/>
                            </div>
                            <button type="submit" class="btn btn-light">Update User</button>
                        </form>
                    </div>
                </div>
            </div><br>
        </div>
        <div class="col-sm-6">
            <div class="card-body">
                <div class="col-md-8 offset-md-4" style="padding:5px">
                    {{ __('Would you like to change your password?') }}
                    <a class="btn btn-link" href="{{ route('showUpPass', Auth::user()->id) }}">
                        <button type="submit" class="btn btn-success">
                            {{ __('Change  Password') }}
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
