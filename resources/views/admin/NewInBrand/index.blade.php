@extends('admin.dashboard.admin_master')
@section('admin')
<div class="py-12" >

    <div class="container">
        <div class="row ">

            <div class="col-md-8 mx-auto">
                <div class="card-header ms-3 me-3 text-light bg-secondary">Add what's new to your brand</div> <!--ms-3 margin left, me-3margin right-->
                    @if(session('success'))
                        <div class="card-header text-light bg-info mb-2" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card-body">
                                <form action="{{ route('store.new.in.brands') }}" method="post" enctype="multipart/form-data">
                                @csrf <!-- without @csrf we can't send the form -->
                                    <label class="form-label">Choose Brand</label>
                                    <select name="brand_id" class="form-select form-control form-select-lg"  aria-label="Default select example">
                                        <option value="0">Open this select menu</option>
                                        @foreach($allBrand as $brand)
                                        <option  value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                        @endforeach
                                    </select>
                                        @error('brand_id')
                                        <label class="text-danger">{{ $message }}</label>
                                        <br>
                                        @enderror
                                    <label class="form-label mt-3 w-100" style="border-top: 0.3px solid black;">Attach Multiple Images With ctrl+click</label>
                                    <input type="file" name="brand_img[]" class="form-control-file  p-2" style="border-bottom: 0.3px solid black;" multiple>
                                        @error('brand_img')
                                             <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    <button type="submit"  class="form-control mt-3" style="background:#220C2D; color:#FFFFFF;">Submit</button>
                                </form>
                    </div>
            </div>





        </div>
    </div>


            @foreach($allBrand as $brand)
            <div class="card-header mt-3  text-light bg-secondary">{{ $brand->brand_name}}</div>
            <div class="row bg-dark py-3 mb-2 mx-1">

                @foreach($newInBrand as $newInBrands)
                    @if( $brand->id == $newInBrands->brand_id)

                    <div class="col-3">
                        <div class="card">
                                <a href="{{ url('new/in/brand/delete/'.$newInBrands->id)}}" class="btn btn-danger m-1" style="position:absolute; top:0; right:0; ">Delete</a>
                                <img src="{{ asset($newInBrands -> image) }}" class="img-fluid img-thumbnail" style=" width:470px; display:inline;">

                        </div>
                    </div>
                    @endif
                @endforeach
                </div>
             @endforeach



</div>
@endsection
