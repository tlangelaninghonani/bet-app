<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ $links['css'] }}">
    <script src="{{ $links['js'] }}"></script>
    <title>Free trial fixtures</title>
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
            <div class="text-align-center">
                <span class="material-icons-round">
                help
                </span><br>
                <span>Support</span>
            </div>
        </div>
    </div>
    <div class="container">
        @if($user->fixtures_published)
            <div class="football-categories">
                <div onclick="redirect('/fixtures/Double chance')">
                    <span class="material-icons-round">
                    close
                    </span>
                    <span>Double chance</span>
                </div>
                <div onclick="redirect('/fixtures/Take the risk')">
                    <span class="material-icons-round">
                    question_mark
                    </span>
                    <span>Take the risk</span>
                </div>
                <div onclick="redirect('/fixtures/Both to score')">
                    <span class="material-icons-round">
                    multiple_stop
                    </span>
                    <span>Both to score</span>
                </div>
                <div onclick="redirect('/fixtures/1.5 Goals')">
                    <span class="material-icons-round">
                    hdr_weak
                    </span>
                    <span>1.5 Goals</span>
                </div>
                <div onclick="redirect('/fixtures/2.5 Goals')">
                    <span class="material-icons-round">
                    hdr_strong
                    </span>
                    <span>2.5 Goals</span>
                </div>
                <div onclick="redirect('/fixtures/Sure 2')">
                    <span class="material-icons-round">
                    check_circle
                    </span>
                    <span>Sure 2</span>
                </div>
                <div onclick="redirect('/fixtures/single_combo')">
                    <span class="material-icons-round">
                    merge_type
                    </span>
                    <span>Single combo</span>
                </div>
            </div>
            <hr>
            <p>
                <div class="input-box">
                    <span class="material-icons-sharp">
                    search
                    </span>
                    <input type="text" name="search" placeholder="Search for a team or prediction">
                </div>
            </p>
            <div class="display-none">
                {{ $counter = 1 }}
            </div>
            @foreach($fixtures as $fixture)
                <p>
                    <div class="fixtures">
                        <p>
                            <div class="display-flex">
                                <!--<div class="bet-number">
                                    <span>{{ $counter++ }}</span>
                                </div>-->
                                <div class="fixture-item">
                                    <div class="display-flex-space-between">
                                        <div class="club-logo truncate">
                                            <span>{{ $fixture->first_team }} {{ $fixture->first_team_odds }}</span>
                                        </div>
                                        <span class="font-kanit-small">V</span>
                                        <div class="club-logo truncate">
                                            <span>{{ $fixture->second_team }} {{ $fixture->second_team_odds }}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="title">{{ $fixture->prediction }}</span>
                                    </div>
                                    <div class="display-flex-align">
                                        <span class="material-icons-round icon-font-small">
                                        swap_horiz
                                        </span>
                                        <span class="title-small">Draw odds</span><span>{{ $fixture->draw_odds }}</span>
                                    </div>
                                    <div class="display-flex-align">
                                        <span class="material-icons-round icon-font-small">
                                        schedule
                                        </span>
                                        <span class="title-small">{{ $fixture->date }}</span>
                                    </div>
                                </div>
                            </div>
                        </p>
                    </div>
                </p>
            @endforeach
            <hr>
            <p>
                <div class="display-flex">
                <span class="material-icons-round">
                    warning
                    </span>
                    <span>Please note, <span class="app-name"><span class="font-kanit">Mabuza</span> BetAssistant</span>  will not be responsible for any losing bet slip, bet on your <span class="font-kanit-small">own risk</span></span>
                </div>
            </p>
        @else
            <div class="football-categories">
                <div onclick="redirect('/fixtures/Double chance')">
                    <span class="material-icons-round">
                    close
                    </span>
                    <span>Double chance</span>
                </div>
                <div onclick="redirect('/fixtures/Take the risk')">
                    <span class="material-icons-round">
                    question_mark
                    </span>
                    <span>Take the risk</span>
                </div>
                <div onclick="redirect('/fixtures/Both to score')">
                    <span class="material-icons-round">
                    multiple_stop
                    </span>
                    <span>Both to score</span>
                </div>
                <div onclick="redirect('/fixtures/2.5 Goals')">
                    <span class="material-icons-round">
                    hdr_strong
                    </span>
                    <span>2.5 Goals</span>
                </div>
                <div onclick="redirect('/fixtures/1.5 Goals')">
                    <span class="material-icons-round">
                    hdr_weak
                    </span>
                    <span>1.5 Goals</span>
                </div>
                <div onclick="redirect('/fixtures/Sure 2')">
                    <span class="material-icons-round">
                    check_circle
                    </span>
                    <span>Sure 2</span>
                </div>
                <div onclick="redirect('/fixtures/single_combo')">
                    <span class="material-icons-round">
                    merge_type
                    </span>
                    <span>Single combo</span>
                </div>
            </div>
            <p>
                <div class="text-align-center">
                    <span class="material-icons-round icon-big">
                    unpublished
                    </span><br>
                    <span>No <span class="font-kanit">published</span> predictions yet</span>
                </div>
            </p>
        @endif
    </div>
</body>
</html>