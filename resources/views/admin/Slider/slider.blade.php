@extends('admin.dashboard.admin_master')
@section('admin')
<div class="py-12" >

    <div class="col-md-12 ">

        <div class="card card-default px-3">
        <div class="text-right" role="alert">
                            <a  href="{{ route('add.slider') }}" class="btn btn-info my-2">Add Sliders</a>
                        </div>

                            @if(session('success'))
                                <div class="card-header-sm text-light bg-info my-3 p-3" role="alert" style="margin-top:-20px;">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if(session('delete'))
                                <div class="card-header-sm text-light bg-danger my-3 p-3" role="alert" style="margin-top:-20px;">
                                    {{ session('delete') }}
                                </div>
                            @endif

                            <div class="card-header-sm text-light bg-secondary p-3" >Sliders</div>
                            <table class="table table-dark table-bordered" style="text-align:center;">
                                <thead class="border-white">
                                    <tr>
                                        <th scope="col" width="1%">Sl No</th>
                                        <th scope="col" width="20%">Slider Title</th>
                                        <th scope="col" width="50%">Description</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                @php ($i = 1)
                                @foreach($sliders as $slider)

                                    <tr style="border-bottom:2px solid white;">

                                        <th scope="row">{{ $i++ }}</th>
                                        <td ><p class="text text-left"> {{ $slider -> title }}</p> </td>

                                        <td >
                                            <div style="max-height:150px; width:auto; overflow:auto; " >
                                                <p class="text text-left"  style="white-space: pre-wrap; overflow-wrap: break-word;">{{ $slider -> description }}</p>
                                            </div>
                                        </td>

                                        <td  class="text-center"  >
                                            <img src="{{ asset($slider->image) }}"  style="width:100px; height:auto;" >
                                        </td>
                                        <td style="width:150px; height:100px;">

                                            <a href="{{ url('slider/edit/'.$slider->id)}}" class="btn btn-success p-2">Edit</a>
                                            <a href="{{ url('slider/delete/'.$slider->id)}}" class="btn btn-danger ml-1 p-2" onclick="return confirm('Are you sure!')">Delete</a>

                                        </td>

                                    </tr>

                                @endforeach
                            </table>



        </div>
    </div>
</div>
@endsection
