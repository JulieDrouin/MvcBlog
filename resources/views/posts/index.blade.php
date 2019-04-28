@extends('layouts.app')

@section('content')
<div class="uper">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div><br />
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All POSTS
                    <div class="row justify-content-end" >
                        <a class="btn btn-link" href="{{ route('post.create') }}">
                            <button class="btn btn-warning">
                                {{ __('New POST') }}
                            </button>
                        </a>
                    </div>
                    </div>
                    @foreach($postsUser as $post)
                    <div class="card" style= "padding: 20px">
                        <h3>{{ $post->title }}</h3>
                        <p>{{ $post->content }}</p>
                        <div class="col-md-8">
                            <h6 style= "padding: 5px">{{ $post->tags}}</h6>
                        </div>
                        <div class="col-md-8">
                        @if($post->user != null)
                            <i style= "padding: 5px">From
                                {{ $post->user->username }}
                            </i>
                        @endif

                        </div>
                        <div class="row justify-content-center">
                            <a href="{{ route('postsShow', $post->id)}}" class="btn btn-primary btn-lg btn-block" style= "margin: 20px">View</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <p><b>{{ $post->title }}</b></p>
                            <p>{{ $post->body }}</p>
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container pagination justify-content-center">
    {{ $postsUser->links() }}
</div>
@endsection
