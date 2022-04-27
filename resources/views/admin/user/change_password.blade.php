@extends('admin.dashboard.admin_master')
@section('admin')
<div class="card card-default shadow p-3 mb-5 bg-body rounded">
        <div class="card-header card-header-border-bottom bg-secondary text-light">
            <h2 class="text-light">Change Password</h2>
        </div>
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <p> {{ session('error') }}</p>
        </div>
        @endif

        <div class="card-body">
            <form action="{{ route('update.password') }}" method="post" class="form-pill">
                @csrf

                <div class="form-group">
                    <label class="text-muted">Current Password</label>
                    <input type="password" name="oldpassword" id="current_password" class="form-control" >
                    @error('oldpassword')
                        <label class=" text-danger">{{ $message }}</label>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="text-muted">New Password</label>
                    <input type="password" name="password" id="password" class="form-control" >
                    @error('password')
                        <label class=" text-danger">{{ $message }}</label>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="text-muted">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" >
                    @error('password_confirmation')
                        <label class=" text-danger">{{ $message }}</label>
                    @enderror
                </div>


                    <input type="submit"  class="form-control btn btn-secondary" value="Update Password">


            </form>
        </div>
    </div>

@endsection
