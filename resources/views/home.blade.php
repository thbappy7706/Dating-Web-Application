
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

                                    <td>
{{--                                        <img src="{{asset($row->image)}}" style="height: 70px; width: 80px" alt=" Image">--}}
                                        <img src="{{ !is_null($row->image) ?asset('img/'. $row->image) : asset('img/user.png')  }}" alt="image" class="img-fluid zoom-image">
                                    </td>

                                    <td>{{$row->gender}}</td>
                                    <td>{{$row->age}} </td>
                                    <td>{{$row->created_at->diffForhumans()}}</td>


                                    <td>
                                        <button  data-action="{{route('user.react')}} "
                                                 type="button"
                                                 class="btn btn-sm like-unlike btn-{{ Auth::user()->isLiked($row->id)? 'danger':'success' }}"
                                                 data-id="{{ $row->id }}">
                                            {{ Auth::user()->isLiked($row->id) ? 'Dislike':'Like' }}
                                        </button>
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


@section('scripts')
    <script>
        $(document).ready( function(){
            $('.like-unlike').on('click', function(e){
                e.preventDefault();
                let url = $(this).attr('data-action');
                let id = $(this).attr('data-id');
                let data = {
                    id :id
                }
                axios.post(url,data).then(function( response){

                    alertify.success( response.data.is_like === true ? 'Liked' : 'Disliked');
                    if(response.data.is_mutual === true){
                        alertify.alert("It's a Match!");
                    }
                    console.log(response);
                    setTimeout(function(){
                        window.location.reload();
                    }, 1000);
                }).catch(function(error){

                });
            });

        });
    </script>
@stop


