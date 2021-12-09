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
    <div class="menu-black" id="menu">
        <div class="display-flex-end">
            <span class="material-icons-round icon-mid" onclick="showHide('menu')">
            close
            </span>
        </div>
        <p>
            <div class="display-flex-align" onclick="redirect('/signout')">
                <span class="title">Sign out</span>
            </div>
        </p>
    </div>
    <div class="header-fixtures">
        <div class="display-flex-space-between">
            <span class="app-name"><span class="font-kanit">Mabuza</span> BetAssistant</span>
            <span class="material-icons-round" onclick="showHide('menu')">
            more_vert
            </span>
        </div>
        <br>
        <div class="display-flex-space-between">
            <div class="text-align-center" onclick="redirect('/football_categories')">
                <span class="material-icons-round">
                sports_soccer
                </span><br>
                <span>Fixtures</span><br>
            </div>
            <div class="text-align-center truncate" onclick="redirect('/subscription')">
                <span class="material-icons-round">
                payment
                </span><br>
                <span>Subscription</span>
            </div>
            <div class="text-align-center" onclick="redirect('/account')">
                <span class="material-icons-round">
                account_circle
                </span><br>
                <span>Account</span>
            </div>
        </div>
    </div>
    <div class="container">
        @if($user->state == "trial")
            <div class="display-flex-center">
                <span>Balance</span>
                <div class="amount">
                    <span class="font-kanit">R{{ number_format($subscription->balance, 2) }}</span>
                </div>
            </div>
            <p>
                <div class="text-align-center">
                    <span>You're on free <span class="font-kanit">trial</span></span>
                </div>
            </p>
        @else
            <div class="display-flex-center">
                <span>Balance</span>
                <div class="amount">
                    <span class="font-kanit">R{{ number_format($subscription->balance, 2) }}</span>
                </div>
            </div>
        @endif
    
        <p>
            <hr>
        </p>
        <div class="display-flex">
            <span class="material-icons-round">
            info
            </span>
            <div>
                <span>We are working on making <span class="font-kanit">payments</span> easier with <span class="font-kanit">online payment</span> platform</span>
                <p>
                    <span><span class="title">Alternatively</span>, recharge your account using our <span class="font-kanit">bank</span> information below, use your <span class="title">account number</span> as a reference</span>
                </p>
            </div>
        </div>
        <div class="card">
            <p>
                <div>
                    <span class="title">Capitec Bank Limited</span><br><br>
                    <div class="display-flex-space-between">
                        <div>
                            <span class="title-small">MR T NGHONANI</span><br>
                            <span class="title-small">1605117844</span>
                        </div>
                        <div>
                            <span class="material-icons-round">
                            memory
                            </span>
                        </div>
                    </div>
                </div>
            </p>
        </div>
        <p>
            <span>Usually takes 20 minutes to reflect</span>
        </p>
    </div>
</body>
</html>