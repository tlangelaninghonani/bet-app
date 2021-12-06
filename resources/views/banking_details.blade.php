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
        <img src="https://gianlucadimarzio.com/images/kane_tottenham_getty_gallery_.jpg?p=intextimg&s=1bee95d2d21d07086ffca5fa7e6ab516" alt="">
    </div>
    <div class="curved-top-home">
        <form action="/signup/banking/submit" method="POST">
            @csrf
            @method("POST")
            <div class="display-flex-space-between">
                <span>Your <span class="title">banking</span> details to verify your <span class="font-kanit">subscription</span></span>
                <span class="material-icons-round icon-fixed">
                payment
                </span>
            </div>
            <p>
                <div class="display-flex-align">
                    <span class="material-icons-round icon-padding">
                    swipe_left
                    </span>
                    <div class="display-flex-auto">
                        @foreach($banks as $bank)
                            <div onclick="selectedBank(this, 'selected', '{{ $bank }}')">
                                <span>{{ $bank }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </p>
            <input type="hidden" name="bankname" id="bankname">
            <p>
                <div class="input-box">
                    <span class="material-icons-sharp">
                    account_circle
                    </span>
                    <input type="text" name="accountholder" placeholder="Enter account holder name" required>
                </div>
            </p>
            <p>
                <div class="input-box">
                    <span class="material-icons-round">
                    payment
                    </span>
                    <input type="number" name="accountnumber" placeholder="Enter account number" required>
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