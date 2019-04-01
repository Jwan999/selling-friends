<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../semantic/dist/semantic.min.css">

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

        .card {
            border-radius: 19px;

        }
        
    </style>
    <title>Sell Your Friends</title>
</head>
<body class="bg-light">
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="ui centered mini mx modal">

        </div>

    </div>
</div>

<!-- Site content !-->
<div id="main">
    <div class="row">
        <div class="col mt-3">
            <button class="ui bg-light small right attached fixed button mt-1 sticky">
                <i class="user plus icon"></i>
                <a href="/sell"></a>
            </button>
            <button class="ui bg-light small right attached fixed button mt-5 sticky">
                <i class="list ul icon"></i>
                <a href="/friends"></a>
            </button>

            <button class="ui bg-light small left attached fixed button float-right">
                <a class="text-dark" href="/">Main page</a>
                <br>
                <br>
                @unless(Auth::check())
                    <a @click="showModal" class="text-dark">Sign up</a>
                    {{--<a href="{{ url('/redirect/facebook') }}"><i--}}
                    {{--class="fa fa-facebook mr-1"></i>Sign in with facebook</a>--}}
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

<script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
<script src="../semantic/dist/semantic.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
    new Vue({
        el: "#main",
        data: {},
        methods: {
            showModal() {
                $('.mini.modal')
                    .modal('show')
                ;
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