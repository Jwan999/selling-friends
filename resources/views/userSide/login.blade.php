@extends('layouts.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mt-3">
                <div class="card-body">
                    <form class="ui form" action="/user/signin" method="post">
                        @csrf
                        <div class="field">
                            <label>First Name</label>
                            <input type="text" name="name" placeholder="First Name">
                        </div>
                        <div class="field">
                            <label>Last Name</label>
                            <input type="text" name=password" placeholder="Last Name">
                        </div>
                        <button class="ui button" type="submit">Submit</button>
                        <a href="{{ url('/redirect/facebook') }}" class="float-right mt-3">or with <i
                                    class="fa fa-facebook mr-1 "></i></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection