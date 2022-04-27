@extends('admin.dashboard.admin_master')
@section('admin')
<div class="py-12">
<div class="col-md-6  mx-auto d-block">
                        @if(session('success'))
                            <div class="card-header text-light bg-info mb-2" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div calss="text-end" style="text-align:right;">
                            <a href="{{ url('brand/')}}" class=" btn btn-secondary btn-sm">X</a>
                        </div>

     <div class="card-body">

                        <form action="{{ url('brand/update/'.$brand ->id)}}" method="post" enctype="multipart/form-data">
                            @csrf <!-- without @csrf we can't send the form -->
                                    <input type="hidden" name="old_img" value="{{$brand -> brand_image}}">
                                    <label >Brand Name</label>
                                    <input type="text" name="brand_name" class="form-control" value="{{$brand -> brand_name}}">
                                        @error('brand_name')
                                        <label class=" m-2 text-danger">{{ $message }}</label>
                                        <br>
                                        @enderror
                                    <label class="col-form-label" >Add Image</label>
                                    <input type="file" name="brand_img" class="form-control-file" value="{{$brand -> brand_name}}">
                                        @error('brand_img')
                                            <label class=" m-2 text-danger">{{ $message }}</label>
                                        @enderror
                                    <img src="{{ asset($brand -> brand_image) }}" class="rounded mx-auto d-block img-fluid my-4" style="width:300px; heigth:300px;">
                                    <input type="submit" value="Submit" class="form-control " style="background:#220C2D; color:#FFFFFF;">


                        </form>

    </div>
</div>
</div>
@endsection
