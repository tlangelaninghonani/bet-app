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
        <div class="shadow-patch"></div>
        <form action="/account/update" method="POST">
            @csrf
            @method("POST")
            <p>
                <span class="title"><span class="font-kanit">Personal</span> information</span>
            </p>
            <p>
                <div class="input-box">
                    <span class="material-icons-round">
                    account_circle
                    </span>
                    <input type="text" placeholder="Full name" name="fullname" value="{{ $user->full_name }}">
                </div>
            </p>
            <p>
                <div class="input-box">
                    <span class="material-icons-round">
                    call
                    </span>
                    <input type="number" placeholder="Phone number" name="phonenumber" value="{{ $user->phone_number }}">
                </div>
            </p>
            <div class="display-flex">
                <span class="material-icons-round">
                info
                </span>
                <small>Update on phone number also updates <span class="font-kanit-small">sign in</span> phone number</small>
            </div>
            @if($user->email != "")
                <p>
                    <div class="input-box">
                        <span class="material-icons-round">
                        email
                        </span>
                        <input type="email" placeholder="Email" name="email" value="{{ $user->email }}">
                    </div>
                </p>
            @endif
            <p>
                <button>
                    <span>Save changes</span>
                </button>
            </p>
        </form>
    </div>
</body>
</html>