<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ $links['css'] }}">
    <script src="{{ $links['js'] }}"></script>
    <title>Fixtures</title>
</head>
<style>
    body{
        background-color: white;
        position: static;
        margin-bottom: 70px;
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
    <div class="header-fixtures">
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
        <div class="shadow-patch"></div>
        <div class="fixtures-auto">
            @if($fixturesId)
                <form action="/delete/fixtures/{{ $fixtureId }}" method="POST" class="display-none" id="deletefixtureAll">
                    @csrf
                    @method("POST")
                </form>
                <form action="/publish/{{ $fixturesId->id }}" method="POST" class="display-none" id="publishform">
                    @csrf
                    @method("POST")
                </form>
                @if($fixturesId->published)
                    <div class="versus-margin">
                        <div class="display-flex-align">
                            <span class="material-icons-round">
                            published_with_changes
                            </span>
                            <span class="title-mid">Published</span>
                        </div>
                    </div>
                @else
                    <div class="display-flex-align versus-margin" onclick="submitForm('deletefixtureAll')">
                        <span class="material-icons-round">
                        delete
                        </span>    
                        <span>Delete</span>
                    </div>
                    <div class="display-flex-align versus-margin">  
                        <span class="material-icons-round">
                        published_with_changes
                        </span>   
                        <span onclick="submitForm('publishform')">Publish</span>
                    </div>
                    <div class="display-flex-align versus-margin" onclick="redirect('/fixture/{{ $fixtureId }}')">
                        <span class="material-icons-round">
                        add
                        </span>
                        <span class="norwrap">Add fixture</span>
                    </div>
                    <div class="display-flex-align add-fixture versus-margin" onclick="submitForm('newfixtureform')">
                        <span class="norwrap">New fixures</span>
                    </div>
                @endif
            @endif
        </div>
        <p>
            @if($admin->published_fixtures_id > 1)  
                <div class="display-flex-align">
                    <div class="football-categories">
                        @foreach($fixturesIdClass::all() as $fixturesIdCl)
                            @if($fixturesIdCl->published_fixtures_id == $fixtureId)
                                <div id="selectedcategory" class="selected display-flex-align" onclick="redirect('/admin_fixtures/{{ $fixturesIdCl->id }}')">
                                    @if($fixturesIdCl->category == "Both to score")
                                        <span class="material-icons-round">
                                        swap_vert
                                        </span>
                                    @elseif($fixturesIdCl->category == "Double chance")
                                        <span class="material-icons-round">
                                        close
                                        </span>
                                    @elseif($fixturesIdCl->category == "1.5 Goals")
                                        <span class="material-icons-round">
                                        hdr_weak
                                        </span>
                                    @elseif($fixturesIdCl->category == "2.5 Goals")
                                        <span class="material-icons-round">
                                        hdr_strong
                                        </span>
                                    @elseif($fixturesIdCl->category == "Take the risk")
                                        <span class="material-icons-round">
                                        question_mark
                                        </span>
                                    @elseif($fixturesIdCl->category == "Sure 2")
                                        <span class="material-icons-round">
                                        check_circle
                                        </span>
                                    @endif
                                    <span>{{ $fixturesIdCl->category }}</span><br>
                                </div>
                                <script>
                                    document.querySelector(".football-categories").prepend(document.querySelector("#selectedcategory"));
                                </script>
                            @else
                                <div class="display-flex-align" onclick="redirect('/admin_fixtures/{{ $fixturesIdCl->id }}')">
                                    @if($fixturesIdCl->category == "Both to score")
                                        <span class="material-icons-round">
                                        multiple_stop
                                        </span>
                                    @elseif($fixturesIdCl->category == "Double chance")
                                        <span class="material-icons-round">
                                        close
                                        </span>
                                    @elseif($fixturesIdCl->category == "1.5 Goals")
                                        <span class="material-icons-round">
                                        hdr_weak
                                        </span>
                                    @elseif($fixturesIdCl->category == "2.5 Goals")
                                        <span class="material-icons-round">
                                        hdr_strong
                                        </span>
                                    @elseif($fixturesIdCl->category == "Sure 2")
                                        <span class="material-icons-round">
                                        check_circle
                                        </span>
                                    @endif  
                                    <span>{{ $fixturesIdCl->category }}</span><br>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>  
            @endif
        </p>
        <!--<p>
            @if($fixturesId)
                <div class="display-flex-align">
                    @if($fixturesId->category == "Both to score")
                        <span class="material-icons-round icon-category">
                        multiple_stop
                        </span>
                    @elseif($fixturesId->category == "Double chance")
                        <span class="material-icons-round icon-category">
                        close
                        </span>
                    @endif
                    <span class="title">{{ $fixturesId->category }} <span class="font-kanit">category</span></span>
                </div>
            @endif
        </p>-->
        @if($admin->published_fixtures_id == 1) 
            <div>
                <span><span class="font-kanit">{{ $fixturesId->category }}</span> category</span>
            </div>
        @endif
        @if($fixturesId)
        <p>
            <div class="input-box">
                <span class="material-icons-sharp">
                search
                </span>
                <input type="text" name="search" placeholder="Search for a team or prediction">
            </div>
        </p>
        @endif
        <div class="display-none">
            {{ $counter = 1 }}
        </div>
        @if(! $fixturesId)
            <p>
                <div class="text-align-center">
                    <span class="material-icons-round icon-big">
                        info
                    </span>
                </div>
            </p>
            <p>
                <div class="text-align-center">
                    <span>From here you will be able to <span class="font-kanit-small">add, edit, delete or update</span> your <span class="font-kanit">fixtures</span></span>
                </div>
            </p>
            <form action="/new_fixture" method="POST" class="display-none" id="newfixtureform">
                @csrf
                @method("POST")
            </form>
            <p>
                <button onclick="submitForm('newfixtureform')">
                    <span class="material-icons-sharp">
                    add
                    </span>
                    <span>New fixtures</span>
                </button>
            </p>
        @else
            <form action="/new_fixture" method="POST" class="display-none" id="newfixtureform">
                @csrf
                @method("POST")
            </form>
            <!--<div class="new-fixture" onclick="submitForm('newfixtureform')">
                <span class="material-icons-round">
                add
                </span>
                <span>New fixtures</span>
            </div>-->
        @endif
        @foreach($fixtures as $fixture)
            <div class="fixtures-auto">
                <div class="fixtures">
                    <p>
                        <div class="display-flex">
                            <!--<div class="bet-number">
                                <span>{{ $counter++ }}</span>
                            </div>-->
                            <div class="fixture-item">
                                <div class="display-flex-space-between">
                                    <div class="club-logo truncate">
                                        <span >{{ $fixture->first_team }} {{ $fixture->first_team_odds }}</span><br>
                                    </div>
                                    <span class="font-kanit-small versus">VS</span>
                                    <div class="club-logo truncate">
                                        <span>{{ $fixture->second_team }} {{ $fixture->second_team_odds }}</span>
                                    </div>
                                </div>
                                <div class="display-flex-space-between">
                                    <div>
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
                                    <form action="/delete/{{ $fixture->id }}" method="POST" class="display-none" id="deletefixture{{ $fixture->id }}">
                                        @csrf
                                        @method("POST")
                                    </form>
                                    <form action="/edit/{{ $fixture->id }}" method="POST" class="display-none" id="editfixture{{ $fixture->id }}">
                                        @csrf
                                        @method("POST")
                                    </form>
                                    <div class="display-flex-align">
                                        <div>
                                            <span class="material-icons-round delete-fixure-icon primary-color" onclick="submitForm('editfixture{{ $fixture->id }}')">
                                            edit
                                            </span>
                                        </div>
                                        <div>
                                            <span class="material-icons-round delete-fixure-icon primary-color" onclick="submitForm('deletefixture{{ $fixture->id }}')">
                                            delete
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>