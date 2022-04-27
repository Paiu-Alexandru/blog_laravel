@extends('admin.dashboard.admin_master')
@section('admin')
<div class="py-12" >

    <div class="col-md-12 ">

        <div class="card card-default px-3">
        <div class="text-right" role="alert">
                            <a  href="{{ route('add.contact') }}" class="btn btn-info my-2">Add Contact</a>
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

                            <div class="card-header-sm text-light bg-secondary p-3" >Contact Section</div>
                            <table class="table table-dark table-bordered" style="text-align:center;">
                                <thead class="border-white">
                                    <tr>
                                        <th scope="col" >Sl No</th>
                                        <th scope="col">Email</th>
                                        <th scope="col" >Adress</th>
                                        <th scope="col" >Phone</th>
                                        <th scope="col" >Action</th>
                                    </tr>
                                </thead>

                                @php ($i = 1)
                                @foreach($contacts as $contact)

                                    <tr style="border-bottom:2px solid white;">

                                        <th scope="row">{{ $i++ }}</th>
                                        <td ><p class="text text-left"> {{ $contact -> email }}</p> </td>

                                        <td >
                                            <div style="max-height:150px; width:auto; overflow:auto; " >
                                                <p class="text text-left"  style="white-space: pre-wrap; overflow-wrap: break-word;">{{ $contact ->adress }}</p>
                                            </div>
                                        </td>

                                        <td >
                                            <div >
                                                <p class="text text-left"  style="white-space: pre-wrap; overflow-wrap: break-word;">{{ $contact -> phone }}</p>
                                            </div>
                                        </td>
                                        <td style="width:150px; height:100px;">

                                            <a href="{{ url('contact/edit/'.$contact->id)}}" class="btn btn-success p-2">Edit</a>
                                            <a href="{{ url('contact/delete/'.$contact->id)}}" class="btn btn-danger ml-1 p-2" onclick="return confirm('Are you sure!')">Delete</a>

                                        </td>

                                    </tr>

                                @endforeach
                            </table>



        </div>
    </div>
</div>

@endsection
