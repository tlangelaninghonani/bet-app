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
            <span class="app-name">BetAssistant</span>
        </div>
    </div>
    <div class="banner-home">
        <img src="https://assets.manutd.com/AssetPicker/images/0/0/15/9/985494/MUFC_v_GCF_97_copy1618529768932_medium.jpg" alt="">
    </div>
    <div class="curved-top-home">
        <div class="display-flex-space-between">
            <span>Create a <span class="title">pin</span> for your <span class="font-kanit">account</span></span>
            <span class="material-icons-sharp icon-fixed">
            person_add
            </span>
        </div>
        <form action="/signup/pin" method="POST">
            @csrf
            @method("POST")
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
                    <span>Create account</span>
                    <span class="material-icons-sharp">
                    arrow_forward
                    </span>
                </button>
            </p>
        </form>
    </div>
</body>
</html>