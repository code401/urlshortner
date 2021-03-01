<!DOCTYPE html>
<html lang="en">
<head>
    <title>Url Shortner || make url short,easy to use and analysis</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }
    </style>
</head>
<body>

<div class="jumbotron text-center" style="margin-bottom:0">
    <h1>Url Shortner</h1>
    <p>Make long url to short and sign up to data analysis</p>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="#">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link" href="{{url('login')}}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('register')}}">Sign up</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container" style="margin-top:30px">
    <div class="row">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>
            function copyToClipboard(element) {
                var $temp = $("<input>");
                $("body").append($temp);
                $temp.val($(element).text()).select();
                document.execCommand("copy");
                $temp.remove();
            }

        </script>

        <div class="col-sm-8">

            <form method="post" action="{{route('url.short')}}">
                @csrf

                <input  type="url" placeholder="https://www.wpbeginner.com/wp-tutorials/how-to-add-the-wordpress-logout-link-to-navigation-menu/" class="form-control" name="url" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                <input type="submit" value="make it shorten"  class="btn btn-primary btn-lg" />


            </form>




            @isset($shorturl)
                <p>Your short url:</p>
                <p id="shorturl"> {{ $shorturl }} </p>

                <button type="button" class="btn btn-primary btn-sm" onclick="copyToClipboard('#shorturl')">click to copy</button>
            @endisset


        </div>
    </div>
</div>

<div class="jumbotron text-center" style="margin-bottom:0">
    <p>Footer</p>
</div>

</body>
</html>
