@extends('admin.dashboard.admin_master')
@section('admin')
<div class="py-12" >

    <div class="container">
        <div class="row ">
            <div class="col-8 ">
                 @if(session('success'))
                    <div class="card-header text-light bg-info mb-2" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                @if(session('delete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('delete') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card-header text-light bg-secondary">Brands</div>
                    <table class="  table table-dark table-bordered border-gray" style="text-align:center;">
                        <thead class="border-white">
                            <tr>
                                <th scope="col">Sl No</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Brand Image</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <!-- increment solution for one page
                        @php ($i = 1)
                        -->
                        @foreach($brands as $brand)
                            <tr>
                                <th scope="col"> </th>
                                <th scope="col"> {{ $brand -> brand_name }} </th>
                                <th scope="col" class="text-center"  > <img src="{{ asset($brand -> brand_image) }}"  style="width:50px; heigth:50px;" > </th>

                                <th scope="col">
                                    @if ($brand -> created_at == NULL )
                                        <label class="text-danger">No date to show </label>
                                    @else
                                    <!-- With Eloquent ORM $category -> created_at->diffForHumans()  -->
                                    <!-- Query builder method -->
                                    {{ Carbon\Carbon::parse($brand->created_at)->diffForHumans() }}

                                    @endif
                                </th>
                                <th scope="col">

                                    <a href="{{ url('brand/edit/'.$brand->id)}}" class="btn btn-success">Edit</a>
                                    <a href="{{ url('soft/delete/'.$brand->id)}}" class="btn btn-secondary" onclick="return confirm('Are you sure!')"><i class="fa fa-trash"></i> Trash</a>

                                </th>


                            </tr>
                        @endforeach


                    </table>
                    {{ $brands->links() }}
            </div>
            <div class="col-md-4">
                <div class="card-header ms-3 me-3 text-light bg-secondary"> Add Brand</div> <!--ms-3 margin left, me-3margin right-->

                        <div class="card-body">
                                <form action="{{ route('store.brand')}}" method="post" enctype="multipart/form-data">
                                @csrf <!-- without @csrf we can't send the form -->
                                    <label for="textInput" class="form-label">Brand Name</label>
                                    <input type="text"  name="brand_name" id="textInput" class="form-control"  style="border: 1 solid black; border-radius: 5px;">
                                        @error('brand_name')
                                        <label class=" m-2 text-danger">{{ $message }}</label>
                                        <br>
                                        @enderror
                                    <input type="file" name="brand_img" name="brand_img" id="fileinput" class="form-control-file my-3 p-2" style="border-bottom: 0.3px solid black;">
                                        @error('brand_img')

                                             <label class=" m-2 text-danger">{{ $message }}</label>

                                        @enderror
                                    <button type="submit" class=" form-control" class="form-control" style="background:#220C2D; color:#FFFFFF;">Submit</button>
                                </form>
                        </div>
                    </div>





            </div>



        </div>

    </div>

    <div class="container">
        <div class="row ">
            <div class="col-8 ">

                <div class="card-header text-light bg-secondary"><i class="fa fa-trash"></i> Trash</div>
                <table class="  table table-dark table-bordered border-gray" style="text-align:center;">
                    <thead class="border-white">
                        <tr>
                            <th scope="col">Sl No</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Added by</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <!-- increment solution for one page
                    @php ($i = 1)
                    -->

                    @foreach($brandTrash as $bTrash)


                        <tr>
            <!-- increment solution for one page i++
                 increment solution for Query builder  $categories -> firstItem() + $loop->index
                            <th scope="col"> {{ $i++ }} </th>
            -->
                                               <!--eloquent return error  -->
                            <th scope="col"> </th>

                                <th scope="col"> {{ $bTrash -> brand_name }} </th>
                                <th scope="col" class="text-center" > <img src="{{ asset($bTrash -> brand_image) }}" class="rounded mx-auto d-block img-fluid" style="width:60px; heigth:60px;" > </th>

                                <th scope="col">
                                    @if ($bTrash -> created_at == NULL )
                                        <label class="text-danger">No date to show </label>
                                    @else
                                    <!-- With Eloquent ORM $category -> created_at->diffForHumans()  -->
                                    <!-- Query builder method -->
                                    {{ Carbon\Carbon::parse($bTrash->created_at)->diffForHumans() }}

                                    @endif
                                </th>


                            <th scope="col">
                                <a href="{{ url('brand/restore/'.$bTrash->id)}}" class="btn btn-success">Restore</a>
                                <a href="{{ url('brand/delete/'.$bTrash->id)}}" class="btn btn-danger">Delete</a>
                            </th>


                        </tr>
                    @endforeach

                </table>
                {{ $brandTrash->links( )}}
            </div>



        </div>
    </div>



</div>
@endsection
