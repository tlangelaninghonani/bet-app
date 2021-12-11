<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ $links['css'] }}">
    <script src="{{ $links['js'] }}"></script>
    <title>Home</title>
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
            <span class="material-icons-round icon-mid" onclick="redirectBack('')">
            arrow_back
            </span>
            <span class="app-name"><span class="app-name-bold" style="color: black !important">Error</span></span>
        </div>
    </div>
    <div class="container">
        <div class="shadow-patch"></div>
        @if($error == "signup")
            <form class="display-none" id="googleauth" action="/google_auth" method="POST">
                @csrf
                @method("POST")
            </form>
            <span class="title">Account seems to already <span class="font-kanit">exists</span></span>
            <p>
                <button >
                    <span class="material-icons-round" onclick="redirect('/signin')">
                    account_circle
                    </span>
                    <span>Sign in instead</span>
                </button>
            </p>
            <p>
                <button class="signin-google auth-button" type="button" onclick="submitForm('googleauth')">
                    <img class="google-img" src="https://img.icons8.com/color/48/000000/google-logo.png" alt="">
                    <span>Sign in with Google</span>
                </button>
            </p>
        @endif
        @if($error == "signin")
            <form class="display-none" id="googleauth" action="/google_auth" method="POST">
                @csrf
                @method("POST")
            </form>
            <span class="title">Account doesn't seem to already <span class="font-kanit">exists</span></span>
            <p>
                <button >
                    <span class="material-icons-round" onclick="redirect('/signup')">
                    account_circle
                    </span>
                    <span>Sign up instead</span>
                </button>
            </p>
            <p>
                <button class="signin-google auth-button" type="button" onclick="submitForm('googleauth')">
                    <img class="google-img" src="https://img.icons8.com/color/48/000000/google-logo.png" alt="">
                    <span>Sign up with Google</span>
                </button>
            </p>
        @endif
        <br>
    </div>
</body>
</html>