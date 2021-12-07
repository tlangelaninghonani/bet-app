<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ $links['css'] }}">
    <script src="{{ $links['js'] }}"></script>
    <title>Subscription</title>
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
    <div class="header-plain">
        <div class="display-flex-align">
            <span class="material-icons-round icon-mid" onclick="redirectBack('')">
            arrow_back
            </span>
            <span class="app-name"><span class="font-kanit">Mabuza</span> BetAssistant</span>
        </div>
    </div>
    <div class="container">
        <p>
            <div class="text-align-center">
                <span class="material-icons-round icon-big">
                error
                </span>
            </div>
        </p>
        <div class="text-align-center">
            <span>Your account <span class="title">balance</span> is <span class="font-kanit">R{{ number_format($subscription->balance, 2) }}</span>, you need at least <span class="font-kanit">R5.00</span> to get <span class="font-kanit">predictions</span></span>
        </div>
        <br>
        @if($subscription->balance < 10 && $subscription->balance >= 5)
            <span>available <span class="font-kanit">package</span> for your account <span class="title">balance</span></span>
            <p>
            <form class="display-none" action="/purchase/5" id="package5" method="POST">
                @csrf
                @method("POST")
            </form>
                <div class="text-align-center" onclick="submitForm('package5')">
                    <span class="material-icons-round icon-big">
                    groups
                    </span><br>
                    <span>05 teams</span><br>
                    <span class="font-kanit">R5.00</span>
                </div>
            </p>
        @endif
        <p>
            <button onclick="redirect('/subscription')">
                <span class="material-icons-round">
                payment
                </span>
                <span>Subscribe</span>
            </button>
        </p>
    </div>
</body>
</html>