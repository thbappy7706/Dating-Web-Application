@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection















{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-10">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        <span class="badge badge-success" style="font-size: medium">Active User:  </span>--}}
{{--                        {{Auth::user()->name}}--}}

{{--                        <b style="float: right">Total Users <span class="badge badge-danger"> {{count($users)}}</span></b>--}}
{{--                        <h4 style="text-align: center; color: #5add8e;font-weight: bold;font-family: 'Times New Roman'">USERS OF PEXCON</h4>--}}


{{--                    </div>--}}

{{--                    <div class="card-body">--}}

{{--                        <table class="table">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th scope="col">SL No</th>--}}
{{--                                <th scope="col">Name</th>--}}
{{--                                <th scope="col">Email</th>--}}
{{--                                <th scope="col">Created At</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}

{{--                            @php($i=1)--}}


{{--                            @foreach($users as $row)--}}
{{--                                <tr>--}}
{{--                                    <th>{{$i++}}</th>--}}
{{--                                    <td>{{$row->name}}</td>--}}
{{--                                    <td>{{$row->email}}</td>--}}
{{--                                    <td>{{$row->created_at->diffForhumans()}}</td>--}}
{{--                                </tr>--}}


{{--                            @endforeach--}}

{{--                            </tbody>--}}
{{--                        </table>--}}



{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

