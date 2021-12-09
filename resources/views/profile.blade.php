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
                <span class="material-icons-round icon-mid">
                arrow_back
                </span>
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
            <div class="text-align-center">
                <span class="material-icons-round">
                help
                </span><br>
                <span>Support</span>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="profile-update">
            <div>
                <span class="material-icons-round">
                update
                </span>
                <span>Update changes</span>
            </div>
        </div>
        <p>
            <span style="padding-left: 18px"><span class="font-kanit-small">Personal</span> information</span>
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
                call
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
            <span style="padding-left: 18px"><span class="font-kanit-small">Banking</span> information</span>
        </p>
        <div class="card">
            <p>
                <div>
                    <span class="title">{{ $banking->bank_name }}</span><br><br>
                    <div class="display-flex-space-between">
                        <div>
                            <span class="title-small">{{ $banking->account_holder }}</span><br>
                            <span class="title-small">{{ $banking->account_number }}</span>
                        </div>
                        <div>
                            <span class="material-icons-round">
                            memory
                            </span>
                        </div>
                    </div>
                </div>
            </p>
        </div>
    </div>
</body>
</html>