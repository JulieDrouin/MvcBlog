@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Page Contact</div>
                <div class="panel-body">
                    <h2>Test Email</h2>
                    <p>{{ $message }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
