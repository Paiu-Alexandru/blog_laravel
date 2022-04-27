@extends('admin.dashboard.admin_master')
@section('admin')
<div class="py-12" >

    <div class="col-md-10 mx-auto">

            <div class="card card-default">
            <div class="card-header-sm text-light bg-secondary p-3"> Insert In About Section</div>

                <div class="card-body">


                    <form action="{{ url('about/update/'.$editPage->id)}}" method="post" enctype="multipart/form-data">
                    @csrf

                        <label for="textInput" class="form-label">Title</label>
                        <input type="text"  name="title" value="{{ $editPage->title }}" id="textInput" class="form-control"  style="border: 1 solid black; border-radius: 5px;">
                            @error('title')
                                <label class=" text-danger">{{ $message }}</label>
                            @enderror
                            <br>

                            <label class="form-label mt-3" >Short Description</label>
                            <textarea name="short_description" class="form-control"  rows="3"> {{ $editPage->short_description }} </textarea>

                            @error('short_description')
                                <label class=" text-danger">{{ $message }}</label>
                            @enderror
                            <br>
                            <label class="form-label mt-3" >Description</label>
                            <textarea name="description" class="form-control"  rows="4"> {{ $editPage->description }} </textarea>

                            @error('description')
                                <label class=" text-danger">{{ $message }}</label>

                            @enderror


                        <button type="submit" name="submit"  class="form-control mt-4" style="background:#220C2D; color:#FFFFFF;">Update</button>
                    </form>
                </div>
            </div>

    </div>
</div>
@endsection
