<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ $links['css'] }}">
    <script src="{{ $links['js'] }}"></script>
    <title>Free trial</title>
</head>
<style>
    body{
        background-color: white;
        position: static;
    }
    *{
        color: black;
    }
    .container{
        padding-bottom: 0;
    }
</style>
<body>
    <div class="header-plain">
        <div class="display-flex-align">
            <span class="app-name"><span class="app-name-bold" style="color: black !important">Free trial</span></span>
        </div>
    </div>
    <div class="container">
        <div class="shadow-patch"></div>
        <p>
            <div class="text-align-center">
                <span class="material-icons-round icon-big">
                alarm
                </span>
            </div>
        </p>
       <div class="text-align-center">
        <span>Hello <span class="font-kanit">{{ explode(" ", $user->full_name)[0] }}</span>, to get you <span class="title">started</span>, you are on <span class="title">7 days free <span class="font-kanit">trial</span></span>
       </div>
        <p>
            <button onclick="redirect('/football_categories')">
                <span>Get the predictions</span>
            </button>
        </p>
        <br>
    </div>
</body>
</html>