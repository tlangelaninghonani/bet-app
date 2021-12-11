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
        <span class="app-name"><span class="app-name-bold">Signning in to your account</span></span>
    </div>
    <div class="banner-home">
        <div class="banner-layer"></div>
        <img src="https://www.thescottishsun.co.uk/wp-content/uploads/sites/2/2021/11/NINTCHDBPICT000691556527.jpg" alt="">
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
                    <input class="clear-input" type="text" name="phonenumberoremail" placeholder="Phone number or email" required>
                </div>
            </p>
            <p>
                <div class="input-box">
                    <span class="material-icons-sharp">
                    dialpad
                    </span>
                    <input class="clear-input" type="password" maxlength="5" minlength="5" name="pin" placeholder=" Pin" required>
                </div>
            </p>
            <p>
                <button>
                    <span>Sign in</span>
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
    <script>
       setTimeout(() => {
            for (let i = 0; i < document.querySelectorAll(".clear-input").length; i++) {
                const element = document.querySelectorAll(".clear-input")[i];
                element.value = "";
            }   
       }, 600);
    </script>
</body>
</html>