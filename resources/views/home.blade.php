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
            <span class="app-name"><span class="app-name-bold">Mabuza</span> BetAssistant</span>
        </div>
    </div>
    <div class="container">
        <div class="shadow-patch"></div>
            <div class="display-flex-center">
                <span>Balance</span>
                <div class="amount">
                    <span class="font-kanit">R{{ number_format($subscription->balance, 2) }}</span>
                </div>
            </div>
            <p>
                <div class="text-align-center">
                    <span><span class="font-kanit">R{{ number_format($book->price, 2) }}</span> will be <span class="title">deducted</span> from your <span class="font-kanit">balance</span></span>
                </div>
            </p>
        <form class="display-none" action="/purchase" id="purchaseform" method="POST">
            @csrf
            @method("POST")
        </form>
        <p>
            <button onclick="submitForm('purchaseform')">
                <span>Get the predictions</span>
            </button>
        </p>
       <!--<p>
           <div class="display-flex-space-around">
                <div class="text-align-center" onclick="submitForm('package5')">
                    <span class="material-icons-round icon-big">
                    groups
                    </span><br>
                    <span>05 teams</span><br>
                    <span class="font-kanit">R5.00</span>
                </div>
                <div class="text-align-center" onclick="submitForm('package10')">
                    <span class="material-icons-round icon-big">
                    groups
                    </span><br>
                    <span>10 teams</span><br>
                    <span class="font-kanit">R10.00</span>
                </div>
           </div>
       </p>-->
    </div>
    <!--<div class="curved-top-plain">
        <p>
           <div class="display-flex">
           <span class="material-icons-round">
            warning
            </span>
           <span>Please note, <span class="font-kanit">BetAssistant</span> will not be <span class="title">responsible</span> for any losing bet slip</span>
           </div>
       </p>
    </div>
    <p>
        <div class="display-flex-center">
            <span class="material-icons-sharp">
            person
            </span>
            <span class="title-small">App owned by <span class="font-kanit-small">Nhlekza</span></span>
        </div>
    </p>-->
</body>
</html>