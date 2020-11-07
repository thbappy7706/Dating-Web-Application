
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <span class="badge badge-success" style="font-size: medium">Active User:  </span>
                        {{Auth::user()->name}}

                        <b style="float: right">Total Users <span class="badge badge-danger"> {{count($users)}}</span></b>
                        <h4 style="text-align: center; color: #501d04;font-weight: bold;font-family: 'Times New Roman'">USERS OF DATEME</h4>


                    </div>

                    <div class="card-body" >

                        <table class="table" style="color: skyblue">
                            <thead>
                            <tr style="color: white">
                                <th scope="col">SL No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Image</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Age</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php($i=1)


                            @foreach($users as $row)
                                <tr>
                                    <th>{{$i++}}</th>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->image}}</td>
                                    <td>{{$row->gender}}</td>
                                    <td>{{$row->age}}</td>
                                    <td>{{$row->created_at->diffForhumans()}}</td>


                                    <td>
{{--                                        <button  data-action=" "--}}
{{--                                                 type="button"--}}
{{--                                                 class="btn btn-sm like-unlike btn-{{ Auth::user()->isLiked($row->id)? 'danger':'success' }}"--}}
{{--                                                 data-id="{{ $row->id }}">--}}
{{--                                            {{ Auth::user()->isLiked($row->id) ? 'Dislike':'Like' }}--}}
{{--                                        </button>--}}
                                    </td>


                                </tr>


                            @endforeach

                            </tbody>
                        </table>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

