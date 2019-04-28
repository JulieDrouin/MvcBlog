@extends('layouts.app')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">SHOW Post</div>
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
                <div class="card text-center">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">

                                    @if($post->user != null)
                                    <h1 class="only-bottom-margin">{{$post->user->username}}</h1>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="card-text"><span class="text-muted">Title : </span>{{$post->title}}</p><br>
                                        <p class="card-text"><span class="text-muted">Content : </span>{{$post->content}}</p><br>
                                        <p class="card-text"><span class="text-muted">Tags : </span>{{$post->tags}}</p><br>
                                        <p class="card-text"><span class="text-muted">Created : </span>{{$post->created}}</p><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(Auth::user()->id === $post->user_id)
                <div class="card-body">
                    <div class="col-md-8 offset-md-4" style="padding:5px">
                        {{ __('Do you want to change your  POST data?') }}
                        <a class="btn btn-link" href="{{ route('posts.edit', $post->id)}}">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Edit DATA POST') }}
                            </button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-8 offset-md-4" style="padding:5px">
                        {{ __('Do you want to post something?') }}
                        <a class="btn btn-link" href="{{ route('post.delete', $post->id) }}">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Delete POST') }}
                            </button>
                        </a>
                    </div>
                </div>
                @endif
                <div class="card-header">
                    <div class="card-body">
                        <div class="col-md-8 offset-md-4">
                            {{ __('Do you want to post something?') }}
                            <a class="btn btn-link" href="{{ route('post.create', Auth::user()->id) }}">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create POST') }}
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <h5>Comments :</h5>
                @foreach($post->comments as $comment)
                <div class="card-body">
                    <div class="display-comment">
                        <strong>{{ $comment->user->username }}</strong>
                        <p class="card-text">{{ $comment->body }}</p>
                    </div>
                </div>
                <hr>
                @endforeach
                <div class="card">
                    <div class="card-body">
                        <p><b>{{ $post->title }}</b></p>
                        <p>
                            {{ $post->body }}
                        </p>
                        <hr />
                        <h4>Add comment</h4>
                        <form method="post" action="{{ route('comm.store', Auth::user()->id) }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="body" class="form-control" />
                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-warning" value="Add Comment" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
