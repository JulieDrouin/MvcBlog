@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Delete my Comment</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="{{ route('comm.destroy', $com->id) }}">
                        @csrf
                        @method('DELETE')
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-danger">
                                    Delete COMMENT
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
