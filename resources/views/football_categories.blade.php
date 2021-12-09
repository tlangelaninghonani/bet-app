<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ $links['css'] }}">
    <script src="{{ $links['js'] }}"></script>
    <title>Football categories</title>
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
    <div class="menu-black" id="menu">
        <div class="display-flex-end">
            <span class="material-icons-round icon-mid" onclick="showHide('menu')">
            close
            </span>
        </div>
        <p>
            <div class="display-flex-align" onclick="redirect('/signout')">
                <span class="title">Sign out</span>
            </div>
        </p>
    </div>
    <div class="header-fixtures">
        <div class="display-flex-space-between">
            <span class="app-name"><span class="font-kanit">Mabuza</span> BetAssistant</span>
            <span class="material-icons-round" onclick="showHide('menu')">
            more_vert
            </span>
        </div>
        <br>
        <div class="display-flex-space-between">
            <div class="text-align-center" onclick="redirect('/football_categories')">
                <span class="material-icons-round">
                sports_soccer
                </span><br>
                <span>Fixtures</span><br>
            </div>
            <div class="text-align-center" onclick="redirect('/subscription')">
                <span class="material-icons-round">
                payment
                </span><br>
                <span>Subscription</span>
            </div>
            <div class="text-align-center" onclick="redirect('/account')">
                <span class="material-icons-round">
                account_circle
                </span><br>
                <span>Account</span>
            </div>
        </div>
    </div>
    <div class="container">
       <span>Choose a <span class="font-kanit">football category</span></span>
       <form class="display-none" action="/purchase/5" id="package5" method="POST">
            @csrf
            @method("POST")
        </form>
        <form class="display-none" action="/purchase/10" id="package10" method="POST">
            @csrf
            @method("POST")
        </form>
        <p>
            <div class="input-box">
                <span class="material-icons-sharp">
                search
                </span>
                <input type="text" name="search" placeholder="Search for a football category">
            </div>
        </p>
       <p>
           <div class="display-flex-space-around">
                <div class="text-align-center" onclick="redirect('/fixtures/Double chance')">
                    <span class="material-icons-round icon-big-shadow">
                    close
                    </span><br>
                    <p>
                        <span>Double chance</span><br>
                    </p>
                </div>
                <div class="text-align-center" onclick="redirect('/fixtures/Take the risk')">
                    <span class="material-icons-round icon-big-shadow">
                    question_mark
                    </span><br>
                    <p>
                        <span>Take the risk</span><br>
                    </p>
                </div>
            </div>
            <div class="display-flex-space-around">
                <div class="text-align-center" onclick="redirect('/fixtures/Both to score')">
                    <span class="material-icons-round icon-big-shadow">
                    multiple_stop
                    </span><br>
                    <p>
                        <span>Both to score</span><br>
                    </p>
                </div>
                <div class="text-align-center" onclick="redirect('/fixtures/2.5 Goals')">
                    <span class="material-icons-round icon-big-shadow">
                    hdr_strong
                    </span><br>
                    <p>
                        <span>2.5 Goals</span><br>
                    </p>
                </div>
            </div>
            <div class="display-flex-space-around">
                <div class="text-align-center" onclick="redirect('/fixtures/1.5 Goals')">
                    <span class="material-icons-round icon-big-shadow">
                    hdr_weak
                    </span><br>
                    <p>
                        <span>1.5 Goals</span><br>
                    </p>
                </div>
                <div class="text-align-center" onclick="redirect('/fixtures/Sure 2')">
                    <span class="material-icons-sharp icon-big-shadow">
                    check
                    </span><br>
                    <p>
                        <span>Sure 2</span><br>
                    </p>
                </div>
            </div>
            <div class="display-flex-space-around">
                <div class="text-align-center" onclick="redirect('/fixtures/Single combo')">
                    <span class="material-icons-round icon-big-shadow">
                    merge_type
                    </span><br>
                    <p>
                        <span>Single combo</span><br>
                    </p>
                </div>
           </div>
       </p>
    </div>
</body>
</html>