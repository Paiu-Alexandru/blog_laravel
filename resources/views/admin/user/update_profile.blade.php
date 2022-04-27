@extends('admin.dashboard.admin_master')
@section('admin')
<div class="card card-default shadow p-3 mb-5 bg-body rounded">
        <div class="card-header card-header-border-bottom bg-secondary text-light">
            <h2 class="text-light">User Profile</h2>
        </div>
        @if(session('success'))
        <div class="alert alert-info alert-dismissible fade show p-2" role="alert">
            <p> {{ session('success') }}</p>
        </div>
        @endif

        <div class="card-body">
            <form action="{{ route('update.user.profile') }}" method="post" enctype="multipart/form-data" class="form-pill" >
                @csrf

                <div class="row mb-5">
                    <div class="col-4 ">
                    <img src="{{ asset($user['profile_photo_path']) }}" class="rounded" alt="...">
                    </div>

                </div>

                <div class="form-group">
                    <label class="text-muted">Profile Photo</label><br>
                    <input type="file" name="image" id="" >
                </div>

                <div class="form-group">
                    <label class="text-muted">User Name</label>
                    <input type="text" name="name"  class="form-control" value="{{ $user['name'] }}">
                </div>

                <div class="form-group">
                    <label class="text-muted">User Email</label>
                    <input type="email" name="email"  class="form-control" value="{{ $user['email'] }}">
                </div>

                    <input type="submit"  class="form-control btn btn-secondary" value="Update Profile">
            </form>
        </div>
    </div>

@endsection
