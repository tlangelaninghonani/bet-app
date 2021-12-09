<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ $links['css'] }}">
    <script src="{{ $links['js'] }}"></script>
    <title>Admin</title>
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
    <!--<span class="material-icons-round icon-float">
    verified
    </span>-->
    <div class="menu" id="menu">
        <div class="display-flex-end">
            <span class="material-icons-round icon-mid" onclick="showHide('menu')">
            close
            </span>
        </div>
        <p>
            <div class="display-flex-align" onclick="redirect('/sell_fixtures')">
                <span class="material-icons-round icon-mid">
                sports_volleyball
                </span>
                <span class="title">Sell fixtures</span>
            </div>
        </p>
        <p>
            <div class="display-flex-align" onclick="redirect('/signout')">
                <span class="material-icons-round icon-mid">
                arrow_back
                </span>
                <span class="title">Sign out</span>
            </div>
        </p>
    </div>
    <div class="header">
        <div class="display-flex-space-between">
            <span class="app-name"><span class="font-kanit">Mabuza</span> BetAssistant</span>
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
        <div class="dashboard">
            <div class="dashboard-item">
                <div class="text-align-center">
                    <span class="material-icons-round icon-big">
                    people
                    </span><br>
                    <span><span class="font-kanit">{{ $users::get()->count() }}</span> Accounts</span>
                </div>
            </div>
            <div class="dashboard-item">
                <div class="text-align-center">
                    <span class="material-icons-round icon-big">
                    sports_soccer
                    </span><br>
                    @if($fixturesId::latest()->first())
                        <div>
                            <span class="font-kanit">{{ $fixturesId::latest()->first()->category }}</span><br>
                            <span class="title-small">{{ $fixturesId::latest()->first()->created_at }}</span>
                        </div>
                    @else
                        <div>
                            <span>Unpublished</span>
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
        <div class="dashboard">
            <div class="dashboard-item">
                <div class="text-align-center">
                    <span class="material-icons-round icon-big">
                    pie_chart
                    </span><br>
                    <div>
                        <span>Revenue from App</span><br>
                        <span class="font-kanit">R{{ number_format($book->revenue, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>