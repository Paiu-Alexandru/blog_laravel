@extends('admin.dashboard.admin_master')
@section('admin')
<div class="py-12" >

    <div class="col-md-12 ">

        <div class="card card-default p-2">
        @if(session('success'))
                    <div class="card-header-sm text-light bg-success my-3 p-2 rounded" style="margin-top:20px;">
                        {{ session('success') }}
                    </div>
                @endif

                            <div class="card-header-sm text-light bg-secondary p-3" >All Messages</div>
                            <table class="table table-dark table-bordered" style="text-align:center;">
                                <thead class="border-white">
                                    <tr>
                                        <th scope="col" >Sl No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col" >Email</th>
                                        <th scope="col" >Subject</th>
                                        <th scope="col" >Message</th>
                                        <th scope="col" >Action</th>
                                    </tr>
                                </thead>

                                @php ($i = 1)
                                @foreach($mess as $message)

                                    <tr style="border-bottom:2px solid white;">

                                        <th scope="row">{{ $i++ }}</th>
                                        <td ><p class="text text-left"> {{ $message -> name }}</p> </td>

                                        <td >
                                            <div>
                                                <p class="text text-left"  >{{ $message ->email }}</p>
                                            </div>
                                        </td>

                                        <td >
                                            <div >
                                                <p class="text text-left"  style="white-space: pre-wrap; overflow-wrap: break-word;">{{ $message -> subject }}</p>
                                            </div>
                                        </td>
                                        <td >
                                            <div  style="max-height:150px; width:auto; overflow:auto; " >
                                                <p class="text text-left"  style="white-space: pre-wrap; overflow-wrap: break-word;">{{ $message -> message }}</p>
                                            </div>
                                        </td>
                                        <td style="width:150px; height:100px;">
                                            <a href="{{ url('dashboard/message/delete/'.$message->id)}}" class="btn btn-danger ml-1 p-2" onclick="return confirm('Are you sure!')">Delete</a>
                                        </td>

                                    </tr>

                                @endforeach
                            </table>



        </div>
    </div>
</div>

@endsection
