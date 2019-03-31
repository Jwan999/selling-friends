@extends('layouts.master')
@section('content')

    <div id="sold" class="row justify-content-center">

        <div v-for="friend in friends" class="col-md-4">
            <div class="card mt-2">
                <div class="card-body font">
                    <div class="image">
                        <img :src="friend.image">
                    </div>
                    <div class="content text-center">
                        <a class="header ">@{{ friend.name }}</a>
                        <div class="meta">
                            <span class="date">@{{ friend.price }}</span>
                        </div>
                        <div class="description">@{{ friend.reason }}</div>
                    </div>
                    <div class="extra content">
                        {{--<hr>--}}
                        {{--<div class="social-buttons">--}}
                            {{--<a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"--}}
                               {{--target="_blank">--}}
                                {{--<i class="fa fa-facebook-official"></i>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection

@push('scripts')
    <script>
        let vue = new Vue({
            el: "#sold",
            data: {
                friends: {
                    friend: {},
                },
            },
            methods: {
                getFriends() {
                    axios.get('/api/friends').then(response => {
                        this.friends = response.data.friends;
                    })
                }
            },
            mounted() {
                this.getFriends()
            }
        })
    </script>
    <script>

        var popupSize = {
            width: 780,
            height: 550
        };

        $(document).on('click', '.social-buttons > a', function (e) {

            var
                verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
                horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

            var popup = window.open($(this).prop('href'), 'social',
                'width=' + popupSize.width + ',height=' + popupSize.height +
                ',left=' + verticalPos + ',top=' + horisontalPos +
                ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

            if (popup) {
                popup.focus();
                e.preventDefault();
            }

        });
    </script>

@endpush
