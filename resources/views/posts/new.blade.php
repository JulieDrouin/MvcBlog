@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Post') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('post.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-md-12 col-form-label text-md-center">{{ __('Title') }}</label>

                            <div class="col-md-12">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>

                                @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="content" class="col-md-12 col-form-label text-md-center">{{ __('Content') }}</label>

                            <div class="col-md-12">
                            
                                <textarea cols="30" rows="4" id="content" type="text" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" value="{{ old('content') }}" required >
                                    @if ($errors->has('content'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                    @endif
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tags" class="col-md-12 col-form-label text-md-center">{{ __('Tags') }}</label>

                            <div class="col-md-12">
                                <input id="tags" type="text" class="form-control{{ $errors->has('tags') ? ' is-invalid' : '' }}" name="tags" required>

                                @if ($errors->has('tags'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tags') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-12-center offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Post') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="col-md-8 offset-md-4" style="padding:5px">
                            {{ __('Would you like to see your profil?') }}
                            <a class="btn btn-link" href="{{ route('show', Auth::user()->id) }}">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Show Profil') }}
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
