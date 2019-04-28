@extends('layouts.app')

@section('content')
<div class="col-sm-6">
    <div class="container">
        <div class="card">
            <div class="card uper">
                <div class="card-header">
                    Edit Password USER
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
                    <form method="get" action="{{ route('updatePassword', Auth::user()->id) }}">
                        <div class="form-group">
                            @csrf
                            @method('PUT')
                            <label for="currentPassword">Old Password :</label>
                            <input type="password" class="form-control" id="password" name="currentPassword" value=""/>
                        </div>
                        <div class="form-group">
                            <label for="newPassword">New Password :</label>
                            <input type="password" class="form-control" id="newPassword" name="newPassword" value=""/>
                        </div>
                        <div class="form-group">
                            <label for="newPasswordVerif">Verif NEW Password :</label>
                            <input type="password" class="form-control" id="newPasswordVerif" name="newPasswordVerif" value=""/>
                        </div>
                        <button type="submit" class="btn btn-light">Update Password User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
