@extends('layouts.master')

@section('content')

    <div id="app" class="row justify-content-center">

        <div class="col-md-4">
            <div class="card mt-3">
                <div class="card-body font">
                    <div class="image">
                        <img src="{{$friend->image}}">
                    </div>
                    <div class="content text-center">
                        <a class="header">{{ $friend->name }}</a>
                        <div class="meta">
                            <span class="date">{{ $friend->price }}</span>
                        </div>
                        <div class="description">{{ $friend->reason }}</div>
                    </div>
                    <div class="extra content">
                        <hr>
                        <div class="social-buttons text-center">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                               target="_blank">
                                <i class="fa fa-facebook-official"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


@endsection

@push('scripts')
    <script>
        new Vue({
            el: "#app",
            data: {},
            methods: {
                getSoldFriend() {

                }
            }

        })
    </script>

@endpush