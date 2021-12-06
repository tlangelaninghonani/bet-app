<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ $links['css'] }}">
    <script src="{{ $links['js'] }}"></script>
    <title>Sell fixtures</title>
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
            <span class="app-name">Account</span>
        </div>
    </div>
    <div class="banner-home">
        <img src="https://assets.manutd.com/AssetPicker/images/0/0/15/9/985494/MUFC_v_GCF_97_copy1618529768932_medium.jpg" alt="">
    </div>
    <div class="curved-top-home">
        <form action="/signup/pin" method="POST">
            @csrf
            @method("POST")
            <p>
                <span><span class="font-kanit">Phone</span> number to send fixtures <span class="title">link</span></span>
            </p>
            <p>
                <div class="input-box">
                    <span class="material-icons-sharp">
                    call
                    </span>
                    <input type="password" name="pin" placeholder="Enter phonenumber" required>
                </div>
            </p>
            <p>
                <span>Select <span class="title">fixtures</span> package to <span class="font-kanit">sell</span></span>
            </p>
            <p>
                <div class="display-flex-space-around">
                        <div class="text-align-center">
                            <span class="material-icons-round icon-big">
                            groups
                            </span><br>
                            <span>05 teams</span><br>
                            <span class="font-kanit">R5.00</span>
                        </div>
                        <div class="text-align-center">
                            <span class="material-icons-round icon-big">
                            groups
                            </span><br>
                            <span>10 teams</span><br>
                            <span class="font-kanit">R10.00</span>
                        </div>
                </div>
            </p>
            <span>Select <span class="title">betting company</span> you <span class="font-kanit">selling</span> for</span>
            <p>
                <div class="display-flex-align">
                    <span class="material-icons-round icon-padding">
                    swipe_left
                    </span>
                    <div class="predictions">
                    @foreach($companies as $company)
                        <div onclick="selectedCompany(this, 'selected', '{{ $company }}')">
                            <span>{{ $company }}</span>
                        </div>
                    @endforeach
                    </div>
                </div>
            </p>
            <p>
                <button>
                    <span>Send fixtures link</span>
                    <span class="material-icons-sharp">
                    arrow_forward
                    </span>
                </button>
            </p>
        </form>
    </div>
</body>
</html>