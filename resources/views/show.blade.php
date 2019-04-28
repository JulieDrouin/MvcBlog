@extends('layouts.app')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="container">
@if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div><br />
    @endif
    @if(session()->get('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div><br />
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User profil</div>
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
                </div>
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img class="img-circle avatar avatar-original" style="-webkit-user-select:none;
                        display:block; margin:auto;" src="http://robohash.org/sitsequiquia.png?size=120x120">
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="only-bottom-margin">{{Auth::user()->username}}</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <span class="text-muted">Name : </span>{{Auth::user()->name}}<br>
                                <span class="text-muted">Lastname : </span>{{Auth::user()->lastname}}<br>
                                <span class="text-muted">Email : </span>{{Auth::user()->email}}<br>
                                <span class="text-muted">Birthday : </span>{{Auth::user()->birthdate}}<br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-8 offset-md-4" style="padding:5px">
                        {{ __('Do you want to change your data?') }}
                        <a class="btn btn-link" href="{{ route('updateUser', Auth::user()->id) }}">
                            <button type="submit" class="btn btn-success">
                                {{ __('Edit Profil') }}
                            </button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-8 offset-md-4" style="padding:5px">
                        {{ __('Would you like to show your post?') }}
                        <a class="btn btn-link" href="{{ route('post.index', Auth::user()->id) }}">
                            <button type="submit" class="btn btn-dark">
                                {{ __('Show POST') }}
                            </button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-8 offset-md-4" style="padding:5px">
                        {{ __('Do you want to post something?') }}
                        <a class="btn btn-link" href="{{ route('post.create', Auth::user()->id) }}">
                            <button type="submit" class="btn btn-warning">
                                {{ __('Create Post') }}
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
