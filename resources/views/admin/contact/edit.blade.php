@extends('admin.dashboard.admin_master')
@section('admin')
<div class="py-12" >

    <div class="col-md-10 mx-auto">

            <div class="card card-default">
            <div class="card-header-sm text-light bg-secondary p-3"> Update Contacts</div>

                <div class="card-body">


                    <form action="{{ url('contact/update/'.$editContact->id)}}" method="post" enctype="multipart/form-data">
                    @csrf

                        <label for="textInput" class="form-label">Email</label>
                        <input type="email"  name="email" value="{{$editContact->email}}"  id="textInput" class="form-control"  style="border: 1 solid black; border-radius: 5px;">
                            @error('email')
                                <label class=" text-danger">{{ $message }}</label>
                            @enderror
                            <br>

                            <label class="form-label mt-3" >Adress</label>
                            <textarea name="adress" class="form-control"  rows="3">{{$editContact->adress}}</textarea>

                            @error('adress')
                                <label class=" text-danger">{{ $message }}</label>
                            @enderror
                            <br>
                            <label class="form-label mt-3" >Phone</label>
                            <input type="text"  name="phone"  value="{{$editContact->phone}}" id="textInput" class="form-control"  style="border: 1 solid black; border-radius: 5px;">

                            @error('phone')
                                <label class=" text-danger">{{ $message }}</label>

                            @enderror


                        <button type="submit" name="submit"  class="form-control mt-4" style="background:#220C2D; color:#FFFFFF;">Update Contact</button>
                    </form>
                </div>
            </div>

    </div>
</div>
@endsection
