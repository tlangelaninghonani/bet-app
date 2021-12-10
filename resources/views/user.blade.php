<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ $links['css'] }}">
    <script src="{{ $links['js'] }}"></script>
    <title>User</title>
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
            <span class="material-icons-round icon-mid" onclick="redirectBack()">
            arrow_back
            </span>
            <span class="app-name">User</span>
        </div>
    </div>
    <div class="display-flex-align container">
        <div class="shadow-patch"></div>
        <span class="material-icons-round icon-big">
        account_circle
        </span>
        <div class="truncate">
            <span class="title">{{ $user->full_name }}</span><br>
            @if($user->email != "")
                <div class="truncate">
                    <span>{{ $user->email }}</span><br>
                </div>
            @endif
            <span>{{ $user->phone_number }}</span><br>
            <!--<div class="display-flex-align">
                @if($user->state == "trial")
                    <span class="material-icons-round icon-font-small">
                    alarm
                    </span>
                    <span class="title-small">Trial</span>
                @elseif($user->state == "subscribed")
                    <span class="material-icons-round icon-font-small">
                    task_alt
                    </span>
                    <span class="title-small">Subscribed</span>
                @elseif($user->state == "unsubscribed")
                    <span class="material-icons-round icon-font-small">
                    block
                    </span>
                    <span class="title-small">Unubscribed</span>
                @endif
            </div>-->
        </div>
    </div>
    <div class="container">
        <div class="card">
            <p>
                <div>
                    <span class="title">{{ $banking->bank_name }}</span><br><br>
                    <div class="display-flex-space-between">
                        <div>
                            <span class="title-small">{{ $banking->account_holder }}</span><br>
                            <span class="title-small">{{ $banking->account_number }}</span>
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
        <hr>
        <form action="/user/{{ $user->id }}/payment/verified" method="POST">
            @csrf
            @method("POST")
            <p>
                <div class="input-box">
                    <span class="material-icons-round">
                    payments
                    </span>
                    <input type="number" step="0.01" name="balance" placeholder="Enter amount deposited" required>
                </div>
            </p>
            <p>
                <button>
                    <span>Verify payment</span>
                </button>
            </p>
        </form>
    </div>
</body>
</html>