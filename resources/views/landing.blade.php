<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sugar</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Lato';
        }

        #app-layout {
            padding-top: 70px;
            height: 100%;
            background: black;
            color: white;
            overflow: hidden;
        }

        #app-layout:before {
            content: ' ';
            display: block;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
            opacity: 0.5;
            background: url(landing_background.jpg) no-repeat center top scroll;
            -o-background-size: cover;
            -moz-background-size: cover;
            -webkit-background-size: cover;
            background-size: cover;
        }

        #app-layout a {
            color: white;
            text-decoration: underline;
        }
    </style>
</head>
<body id="app-layout" class="text-center">
    <h1>Sugar</h1>
    <p>I love to Code, but I have no idea what to...</p>
    <p>Any <a href="https://github.com/shavenking/project-sugar/labels/feature" target="_blank">feature issue <i class="fa fa-external-link-square"></i></a> would be welcome.</p>
    <p><a href="{{ url('login') }}">Try Application.</a></p>
    <h3>BIG THX!</h3>
</body>
</html>
