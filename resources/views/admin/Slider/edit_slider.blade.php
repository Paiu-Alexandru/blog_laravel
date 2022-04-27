@extends('admin.dashboard.admin_master')
@section('admin')
<div class="py-12" >

    <div class="col-md-10 mx-auto">

            <div class="card card-default">
            <div class="card-header-sm text-light bg-secondary p-3" > Edit Slider</div>

                <div class="card-body">


                    <form action="{{ url('update/slider/'.$edit ->id)}}" method="post" enctype="multipart/form-data">
                    @csrf

                         <input type="hidden" name="old_img" value="{{$edit -> image}}">
                        <label for="textInput" class="form-label">Title</label>
                        <input type="text"  name="title" value="{{$edit -> title}}" id="textInput" class="form-control"  style="border: 1 solid black; border-radius: 5px;">
                            @error('title')
                            <label class=" text-danger">{{ $message }}</label>
                            <br>
                            @enderror


                            <label class="form-label mt-3" >Description</label>
                            <textarea name="description" class="form-control"  rows="3" >{{$edit -> description}}</textarea>

                            @error('description')
                                <label class=" text-danger">{{ $message }}</label>

                            @enderror

                        <input type="file"  name="slider_img" value="{{$edit -> image}}" id="fileinput" class="form-control-file mt-3 p-2" style="border-bottom: 0.3px solid black;">
                            @error('slider_img')

                                    <label class="text-danger">{{ $message }}</label>

                            @enderror
                            <img src="{{ asset($edit -> image) }}" class="rounded mx-auto d-block img-fluid my-4" style="width:300px; heigth:300px;">
                        <button type="submit" name="submit"  class="form-control mt-4" style="background:#220C2D; color:#FFFFFF;">Submit</button>
                    </form>

                </div>
            </div>

    </div>
</div>
@endsection
