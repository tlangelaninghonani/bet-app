<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ $links['css'] }}">
    <script src="{{ $links['js'] }}"></script>
    <title>Accounts</title>
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
    <div class="menu" id="menu">
        <div class="display-flex-end">
            <span class="material-icons-round" onclick="showHide('menu')">
            close
            </span>
        </div>
        <p>
            <div class="display-flex-align" onclick="redirect('/signout')">
                <span class="title">Sign out</span>
            </div>
        </p>
    </div>
    <div class="header">
        <div class="display-flex-space-between">
            <span class="app-name"><span class="app-name-bold">Mabuza</span> BetAssistant</span>
            <span class="material-icons-round" onclick="showHide('menu')">
            more_vert
            </span>
        </div>
        <br>
        <div class="display-flex-space-between">
            <div class="text-align-center" onclick="redirect('/admin')">
                <span class="material-icons-round">
                dashboard
                </span><br>
                <span>Dashboard</span>
            </div>
            <div class="text-align-center" onclick="redirect('/admin_fixtures')">
                <span class="material-icons-round">
                sports_soccer
                </span><br>
                <span>Fixtures</span>
            </div>
            <div class="text-align-center" onclick="redirect('/accounts')">
                <span class="material-icons-round">
                people
                </span><br>
                <span>Accounts</span>
            </div>
        </div>
    </div>
    <div class="container">
        <div>
            <span><span class="font-kanit-small">{{ $accounts::get()->count() }}</span> user(s)</span>
        </div>
        <p>
            <div class="input-box">
                <span class="material-icons-sharp">
                search
                </span>
                <input type="text" name="search" placeholder="Search for an account">
            </div>
        </p>
        @foreach($accounts::all() as $account)
        <!--onclick="redirect('/user/{{ $account->id }}')"-->
            <div class="display-flex-align" >
                <span class="material-icons-round icon-big">
                account_box
                </span>
                <div class="truncate">
                    <span class="title">{{ $account->full_name }}</span><br>
                    @if($account->email != "")
                        <div class="truncate">
                            <span>{{ $account->email }}</span><br>
                        </div>
                    @endif
                    <span>{{ $account->phone_number }}</span><br>
                    <!--<div class="display-flex-align">
                        @if($account->state == "trial")
                            <span class="material-icons-round icon-font-small">
                            alarm
                            </span>
                            <span class="title-small">Trial</span>
                        @elseif($account->state == "subscribed")
                            <span class="material-icons-round icon-font-small">
                            task_alt
                            </span>
                            <span class="title-small">Subscribed</span>
                        @elseif($account->state == "unsubscribed")
                            <span class="material-icons-round icon-font-small">
                            block
                            </span>
                            <span class="title-small">Unubscribed</span>
                        @endif
                    </div>-->
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>