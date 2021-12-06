<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ $links['css'] }}">
    <script src="{{ $links['js'] }}"></script>
    <title>Welcome</title>
</head>
<style>
    .header{
        background-color: transparent;
    }
    body{
        
    }
</style>
<body>
    <div class="header-home">
        <span class="app-name">BetAssistant</span>
        <div class="display-flex-align" onclick="redirect('/signin')">
            <span class="material-icons-round">
            account_circle
            </span>
            <span class="app-name">Sign in</span>
        </div>
    </div>
    <div class="banner-home">
        <img src="https://www.unitedinfocus.com/static/uploads/14/2021/10/GettyImages-1347758654-768x506.jpg" alt="">
    </div>
    <div class="curved-top-home">
        <span class="statement">Get the promising <span class="font-kanit-statement">football</span> <span class="title">bet</span> <span class="title">predictions</span> and make that <span class="font-kanit-statement">dream</span> come true</span>
        <p>
            <span class="font-kanit">Predictions featured in</span>
        </p>
        <p>
            <div class="display-flex-align">
                <span class="material-icons-round icon-padding">
                swipe_left
                </span>
                <div class="leagues">
                    <span>Double score</span>&#183;
                    <span>Take the risk</span>&#183;
                    <span>Both to score</span>&#183;
                    <span>2.5 Goals</span>&#183;
                    <span>1.5 Goals</span>&#183;
                    <span>Sure 2</span>&#183;
                    <span>Single combo</span>
                </div>
            </div>
        </p>
        <p>
            <button onclick="redirect('/signup')">
                <span>Get started</span>
                <span class="material-icons-sharp">
                arrow_forward
                </span>
            </button>
        </p>
    </div>
</body>
</html>