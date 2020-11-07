@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update profile
                    </div>

                    <div class="card-body">
                        {{-- @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif --}}
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{session('success')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form action="{{ route('update.user') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" Name">

                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">

                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Update</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('img/av.png') }}" height="280px;" width="20px;" alt="Card image cap">

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"></li>
                        <li class="list-group-item" style="font-weight: bold;font-family: 'Mongolian Baiti';color: darkblue"><h6 style="color: darkgreen ">Email:</h6> {{ Auth::user()->email }}</li>
                        <li class="list-group-item"><a href="{{route('change.password')}}" style="font-weight: bold; font-family: 'Times New Roman';color: orangered">Changer Password</a></li>
                    </ul>

                </div>
            </div>



        </div>



@endsection
