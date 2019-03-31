<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
    <style>
        body.pushable > .pusher {

            font-family: 'Cairo', sans-serif;
            font-size: 15px;
            background: linear-gradient(to bottom right, #E98A98 0%, #B3B6EB 100%)
        }

        body {
            background: linear-gradient(to bottom right, #E98A98 0%, #B3B6EB 100%);
            /*background-repeat: no-repeat;*/
            /*background-image: cover;*/

        }

        .h {
            height: 9vh;
            z-index: 10000;
        }

        .w {
            width: 10vw;
        }

        .font {
            font-family: 'Cairo', sans-serif;
            font-size: 13px;
        }

        .image-size {
            width: 30%;
            margin: auto;
            display: block;
            /*margin-bottom: 10px;*/
            /*height: 10vh;*/
            object-fit: cover;
        }
    </style>
    <title>Document</title>
</head>
<body style="" class="bg-light">

<div class="ui sidebar bg-light vertical menu">
    <img src="{{auth()->user()->avatar}}">

    <a href="/sell" class="item mt-5">
        sell a friend
    </a>
    <a href="/friends" class="item">
        the friend's you've sold
    </a>
</div>
<div class="pusher">
    <!-- Site content !-->
    <div id="sideBar">
        <div class="row ">
            <div class="col ">
                <button @click="toggle" class="ui bg-light small right attached fixed button mt-3 sticky">
                    <i class="align left icon"></i>
                </button>
                <button class="ui bg-light small left mt-3 attached fixed button float-right">
                    @unless(Auth::check())
                        <a href="{{ url('/redirect/facebook') }}"><i
                                    class="fa fa-facebook mr-1"></i>Sign in with facebook</a>
                    @endunless
                    @if(Auth::check())
                        {{auth()->user()->name}}
                        <br>
                        <a class="text-dark" href="/logout">Logout</a>
                    @endif
                </button>
            </div>
        </div>

    </div>

    <div class="container">
        @yield('content')
    </div>
</div>

<script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
<script src="semantic/dist/semantic.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
    new Vue({
        el: "#sideBar",
        data: {},
        methods: {
            toggle() {
                $('.ui.sidebar')
                    .sidebar('toggle');
            }
        },
        mounted() {
            // $('.ui.sidebar').sidebar('toggle');
        }

    })

</script>
@stack('scripts')
</body>
</html>