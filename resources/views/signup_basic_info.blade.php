<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ $links['css'] }}">
    <script src="{{ $links['js'] }}"></script>
    <title>Sign up</title>
</head>
<style>
    .header{
        background-color: transparent;
    }
</style>
<body>
    <div class="header-home">
        <div class="display-flex-align">
            <span class="material-icons-round icon-mid" onclick="redirectBack()">
            arrow_back
            </span>
            <span class="app-name"><span class="font-kanit">Mabuza</span> BetAssistant</span>
        </div>
    </div>
    <div class="banner-home">
        <img src="https://gianlucadimarzio.com/images/kane_tottenham_getty_gallery_.jpg?p=intextimg&s=1bee95d2d21d07086ffca5fa7e6ab516" alt="">
    </div>
    <div class="curved-top-home">
        <div class="display-flex-space-between">
            <span>We need just <span class="font-kanit">basic</span> info from you to get you <span class="title">started</span> </span>
            <span class="material-icons-sharp icon-fixed">
            person_add
            </span>
        </div>
        <form class="display-none" id="googleauth" action="/google_auth" method="POST">
            @csrf
            @method("POST")
        </form>
        <form class="display-none" id="facebookauth" action="/facebook_auth" method="POST">
            @csrf
            @method("POST")
        </form>
        <form action="/signup/info" method="POST">
            @csrf
            @method("POST")
            <p>
                <div class="input-box">
                    <span class="material-icons-sharp">
                    account_circle
                    </span>
                    <input type="text" name="fullname" placeholder="Enter your Full name" required>
                </div>
            </p>
            <p>
                <div class="predictions-centered">
                    <div class="selected" onclick="swapSignupPhoneEmail(this, 'phone')">
                        <span>Use phone</span>
                    </div>
                     <div onclick="swapSignupPhoneEmail(this, 'email')">
                        <span>Use email</span>
                    </div>
                </div>
            </p>
            <script>
                function swapSignupPhoneEmail(self, mode){
                    document.querySelector("#phone").style.display = "none";
                    document.querySelector("#email").style.display = "none";

                    if(mode == "phone"){
                        document.querySelector("#phone").style.display = "block";
                    }else{
                        document.querySelector("#email").style.display = "block";
                    }
                    for (let i = 0; i < document.querySelectorAll(".selected").length; i++) {
                        const element = document.querySelectorAll(".selected")[i];
                        element.classList.remove("selected");
                    }
                    self.classList.add("selected");
                }
            </script>
            <div id="phone">
                <p>
                    <div class="input-box">
                        <span class="material-icons-sharp">
                        call
                        </span>
                        <input type="number" name="phonenumber" maxlength="10" minlength="10" placeholder="Enter your phone number">
                    </div>
                </p>
            </div>
            <div class="display-none" id="email">
                <p>
                    <div class="input-box">
                        <span class="material-icons-round">
                        email
                        </span>
                        <input type="email" name="email" placeholder="Enter your email">
                    </div>
                </p>
            </div>
            <p>
                <button>
                    <span>Next</span>
                    <span class="material-icons-sharp">
                    arrow_forward
                    </span>
                </button>
            </p>
            <p>
                <div class="text-align-center">
                    <span class="font-kanit-small">Or</span>
                </div>
            </p>
            <p>
                <button class="signin-google" type="button" onclick="submitForm('googleauth')">
                    <img class="google-img" src="https://img.icons8.com/color/48/000000/google-logo.png" alt="">
                    <span>Sign up with Google</span>
                </button>
            </p>
            <!--<p>
                <button class="signin-google" type="button" onclick="submitForm('facebookauth')">
                    <img class="google-img" src="https://img.icons8.com/color/48/000000/facebook-new.png" alt="">
                    <span>Sign up with Facebook</span>
                </button>
            </p>-->
            <p>
                <div onclick="redirect('/signin')">
                    <span>Or <span class="font-kanit-small">sign in</span></span>
                </div>
            </p>
        </form>
    </div>
</body>
</html>