<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}-404</title>
    <style>
        .middle{
            position:relative;
            top:50%;
            text-align: center;
        }

        img{
            width: 600px;
            margin:auto;
        }
        .middle div a{
            text-decoration: none;
            display: inline-block;
            background: #eb0766;
            padding:10px 20px;
            color:#fff;
            font-family: tahoma,"sans-serif";
            font-size: 18px;
            border-radius:20px;
        }
    </style>
</head>
<body>  
    <div class="middle">
        <img src="{{asset('img/500.gif')}}" alt="500-image">
        <div>
             <a href="{{url('/home')}}">Back Return to Home</a>
        </div>
    </div>
</body>
</html>