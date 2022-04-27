@extends('admin.dashboard.admin_master')
@section('admin')
<div class="py-12" >

    <div class="col-md-10 mx-auto">

            <div class="card card-default">
            <div class="card-header-sm text-light bg-secondary p-3" > Add Slider</div>

                <div class="card-body">


                    <form action="{{ route('store.sliders')}}" method="post" enctype="multipart/form-data">
                    @csrf

                        <label for="textInput" class="form-label">Title</label>
                        <input type="text"  name="title" id="textInput" class="form-control"  style="border: 1 solid black; border-radius: 5px;">
                            @error('title')
                            <label class=" text-danger">{{ $message }}</label>
                            <br>
                            @enderror


                            <label class="form-label mt-3" >Description</label>
                            <textarea name="description" class="form-control"  rows="3"></textarea>

                            @error('description')
                                <label class=" text-danger">{{ $message }}</label>

                            @enderror

                        <input type="file"  name="slider_img" id="fileinput" class="form-control-file mt-3 p-2" style="border-bottom: 0.3px solid black;">
                            @error('slider_img')

                                    <label class="text-danger">{{ $message }}</label>

                            @enderror
                        <button type="submit" name="submit"  class="form-control mt-4" style="background:#220C2D; color:#FFFFFF;">Submit</button>
                    </form>
                </div>
            </div>

    </div>
</div>
@endsection
