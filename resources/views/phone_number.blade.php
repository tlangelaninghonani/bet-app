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
            <span class="app-name"><span class="app-name-bold">Mabuza</span> BetAssistant</span>
        </div>
    </div>
    <div class="banner-home">
        <img src="https://gianlucadimarzio.com/images/kane_tottenham_getty_gallery_.jpg?p=intextimg&s=1bee95d2d21d07086ffca5fa7e6ab516" alt="">
    </div>
    <div class="curved-top-home">
        <div class="shadow-patch"></div>
        <div class="display-flex-space-between">
            <span>Hi <span class="font-kanit">{{ Session::get("name") }}</span>, We need your <span class="title">phone number</span> for <span class="font-kanit">better and fast</span> communication</span>
            <span class="material-icons-round icon-fixed">
            smartphone
            </span>
        </div>
        <form action="/signup/phone_number" method="POST">
            @csrf
            @method("POST")
            <p>
                <div class="input-box">
                    <span class="material-icons-round">
                    smartphone
                    </span>
                    <input type="number" name="phonenumber" maxlength="10" minlength="10" placeholder="Enter your phone number" required>
                </div>
            </p>
            <p>
                <button>
                    <span>Next</span>
                    <span class="material-icons-sharp">
                    arrow_forward
                    </span>
                </button>
            </p>
        </form>
    </div>
</body>
</html>