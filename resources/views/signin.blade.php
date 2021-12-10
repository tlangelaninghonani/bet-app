<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ $links['css'] }}">
    <script src="{{ $links['js'] }}"></script>
    <title>Sign in</title>
</head>
<style>
    .header{
        background-color: transparent;
    }
</style>
<body>
    <div class="header-home">
        <span class="app-name"><span class="app-name-bold">Mabuza</span> BetAssistant</span>
    </div>
    <div class="banner-home">
        <img src="https://imgresizer.eurosport.com/unsafe/1280x960/smart/filters:format(jpeg)/origin-imgresizer.eurosport.com/2021/09/26/3226899-66055248-2560-1440.jpg" alt="">
    </div>
    <div class="curved-top-home">
        <div class="shadow-patch"></div>
        <div class="display-flex-space-between">
            <span>Sign in to your <span class="font-kanit">account</span></span>
            <span class="material-icons-sharp icon-fixed">
            account_circle
            </span>
        </div>
        <form class="display-none" id="googleauth" action="/google_auth" method="POST">
            @csrf
            @method("POST")
        </form>
        <form action="/signin/submit" method="POST">
            @csrf
            @method("POST")
            <p>
                <div class="input-box">
                    <span class="material-icons-sharp">
                    account_circle
                    </span>
                    <input type="text" name="phonenumberoremail" placeholder="Enter your phone number or email" required>
                </div>
            </p>
            <p>
                <div class="input-box">
                    <span class="material-icons-sharp">
                    dialpad
                    </span>
                    <input type="password" maxlength="5" minlength="5" name="pin" placeholder="Enter your pin" required>
                </div>
            </p>
            <p>
                <button>
                    <span>Sign in</span>
                    <span class="material-icons-sharp">
                    arrow_forward
                    </span>
                </button>
            </p>
            <p>
                <button class="signin-google auth-button" type="button" onclick="submitForm('googleauth')">
                    <img class="google-img" src="https://img.icons8.com/color/48/000000/google-logo.png" alt="">
                    <span>Sign in with Google</span>
                </button>
            </p>
            <!--<p>
                <button class="signin-google" type="button">
                    <img class="google-img" src="https://img.icons8.com/color/48/000000/facebook-new.png" alt="">
                    <span>Sign in with Facebook</span>
                </button>
            </p>-->
        </form>
        <p>
            <div onclick="redirect('/signup')">
                <span>Or <span class="font-kanit-small">Create an account</span></span>
            </div>
        </p>
    </div>
</body>
</html>