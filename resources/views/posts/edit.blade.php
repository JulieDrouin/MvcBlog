@extends('layouts.app')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
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
        <form method="post" action="{{ route('posts.update', $post->id) }}">
        <div class="form-group">
                @csrf
                @method('PUT')
                <label for="title">Title :</label>
                <input type="text" class="form-control" id="title" name="title" value=" {{ $post->title }}"/>

            </div>
            <div class="form-group">
                <label for="content">Content :</label>
                <input type="text" class="form-control" id="content" name="content" value="{{ $post->content }}"/>

            </div>
            <div class="form-group">
                <label for="tags">Tags :</label>
                <input type="text" class="form-control" id="tags" name="tags" value="{{ $post->tags }}"/>

            </div>
            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
    </div>
</div>
@endsection
