@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card uper">
    <div class="card-header">
        Edit Post
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
        </div>
    </div>
</div>
@endsection
