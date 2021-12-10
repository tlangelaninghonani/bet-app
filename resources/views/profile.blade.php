<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ $links['css'] }}">
    <script src="{{ $links['js'] }}"></script>
    <title>Profile</title>
</head>
<style>
    body{
        background-color: white;
        position: static;
    }
    *{
        color: black;
    }
    .input-box{
        padding: 0 18px;
    }
</style>
<body>
    <div class="menu-black" id="menu">
        <div class="display-flex-end">
            <span class="material-icons-round" onclick="showHide('menu')">
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
            <span class="app-name"><span class="app-name-bold">Mabuza</span> BetAssistant</span>
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
            <div class="text-align-center truncate" onclick="redirect('/subscription')">
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
        <p>
            <span class="title"><span class="font-kanit">Personal</span> information</span>
        </p>
        <p>
            <div class="input-box">
                <span class="material-icons-round">
                account_circle
                </span>
                <input type="text" placeholder="Enter your fullname" value="{{ $user->full_name }}">
                <div class="clear" onclick="clearText('firstteam')">
                    <span>Clear</span>
                </div>
            </div>
        </p>
        <p>
            <div class="input-box">
                <span class="material-icons-round">
                smartphone
                </span>
                <input type="number" placeholder="Enter your phone number" value="{{ $user->phone_number }}">
                <div class="clear" onclick="clearText('firstteam')">
                    <span>Clear</span>
                </div>
            </div>
        </p>
        <p>
            
        </p>
        <p>
            <button onclick="redirect('/signup')">
                <span class="material-icons-sharp">
                update
                </span>
                <span>Save changes</span>
            </button>
        </p>
    </div>
</body>
</html>