@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{Auth::user()->username}} is logged in!
                </div>
                <div class="row justify-content-center">
                    <div class="card-body">
                        <div class="col-md-8 offset-md-4" style="padding:5px">
                            {{ __('New Post for MvC_Blog?') }}
                            <div class="justify-content-center">
                                <a class="btn btn-link" href="{{ route('post.create') }}">
                                    <button class="btn btn-warning">
                                        {{ __('New POST') }}
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12 offset-md-4" style="padding:5px">
                            {{ __('Would you like to show your post?') }}
                            <div class="justify-content-center">
                                <a class="btn btn-link" href="{{ route('post.index', Auth::user()->id) }}">
                                    <button type="submit" class="btn btn-dark">
                                        {{ __('Show POST') }}
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="card-body">
                        <div class="col-md-12 offset-md-4" style="padding:5px">
                            {{ __('Would you like to see your profile?') }}
                            <div class="justify-content-center">
                                <a class="btn btn-link" href="{{ route('show', Auth::user()->id) }}">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Show Profil') }}
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12 offset-md-4" style="padding:5px">
                            {{ __('Would you like to see your profile?') }}
                            <div class="justify-content-center">
                                <a class="btn btn-link" href="{{ route('showUpPass', Auth::user()->id) }}">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Change Password Profil') }}
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-8 offset-md-4" style="padding:5px">
                        {{ __('Would you like to delete your profile?') }}
                        <div class="justify-content-center">
                            <a class="btn btn-link" href="{{ route('deleteUser', Auth::user()->id) }}">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Delete Profil') }}
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
