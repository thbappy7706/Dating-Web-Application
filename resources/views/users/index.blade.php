
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
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Email</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Age</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                           @forelse($users as $id => $user)
                            <tr>
                                <th scope="row">{{ ++$id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <img src="{{ !is_null($user->avatar) ?asset('img/'. $user->avatar) : asset('img/user.png')  }}" alt="image" class="img-fluid zoom-image">
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->age }} year(s)</td>
                                <td>
                                    <button  data-action="{{ route('like.storeOrToggle') }}"
                                        type="button"
                                        class="btn btn-sm like-unlike btn-{{ Auth::user()->isLiked($user->id)? 'danger':'success' }}"
                                        data-id="{{ $user->id }}">
                                        {{ Auth::user()->isLiked($user->id) ? 'Dislike':'Like' }}
                                    </button>
                                </td>
                            </tr>
                            @empty
                               <h4> No user available</h4>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

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
