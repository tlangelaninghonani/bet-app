<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ $links['css'] }}">
    <script src="{{ $links['js'] }}"></script>
    <title>Fixture</title>
</head>
<style>
    body{
        background-color: white;
        position: static;
    }
    *{
        color: black;
    }

    .input-box{
        display: flex;
        align-items: center;
        gap: var(--gap);
        background-color: var(--input-silver);
        padding: 0 18px;
    }
</style>
<body>
    <div class="banner-home">
        <img src="https://talksport.com/wp-content/uploads/sites/5/2021/08/crop-926141-1.jpg?strip=all&w=960&quality=100" alt="">
        <div class="fixtures-edit">
            <div class="display-flex-space-between width-100">
                <span class="app-name">Match fixture</span>
                <span class="material-icons-round icon-mid" onclick="redirect('/admin_fixtures')">
                close
                </span>
            </div>
            <p>
                <div>
                    <span class="title"><span class="font-kanit">{{ $fixturesId->category }}</span> category</span>
                </div>
            </p>
        </div>
    </div>
    <div class="curved-top-home">
        <div class="shadow-patch"></div>
        <form action="/fixture/{{ $fixtureId }}/add_prediction" method="POST">
            <input type="hidden" id="outcome" name="outcome">
            @csrf
            @method("POST")
            <span class="title">Setup a <span class="font-kanit">fixture</span></span>
            <p>
                <div class="input-box">
                    <span class="material-icons-sharp primary-color-text">
                    groups
                    </span>
                    <input type="text" style="text-transform: capitalize" id="firstteam" name="firstteam" placeholder="First team" required>
                </div>
            </p>
            <div class="text-align-center">
                <span class="font-kanit">VS</span>
            </div>
            <p>
                <div class="input-box">
                    <span class="material-icons-sharp primary-color-text">
                    groups
                    </span>
                    <input type="text" style="text-transform: capitalize" id="secondteam" name="secondteam" placeholder="Second team" required>
                </div>
            </p>
            <p>
                <div>
                    <div class="text-align-center">
                    <span class="font-kanit">Time</span>
                </div>
            </p>
            <p>
                <div class="input-box">
                    <div class="display-flex-space-between" style="width: 100%">
                        <div>
                            <select name="day" id="day">
                                @for($i = 0; $i < 3; $i++)
                                    <option value="{{ date('d', strtotime('+ '.$i.' day')) }}">{{ date("d", strtotime("+ $i day")) }}</option>
                                @endfor
                            </select>
                            <span>{{ date("F") }}</span>
                        </div>
                        <div class="display-flex-align" style="gap: 0px !important">
                            <select name="hours" id="hours">
                                @for($i = 0; $i <= 23; $i++)
                                    @if($i < 10)
                                        <option value="0{{ $i }}">0{{ $i }}</option>
                                    @else
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endif
                                @endfor
                            </select>
                            <select name="minutes" id="minutes">
                                @for($i = 0; $i <= 59; $i++)
                                    @if($i < 10)
                                        <option value="0{{ $i }}">0{{ $i }}</option>
                                    @else
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endif
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
            </p>
            <p>
                <button>
                    <span>Next</span>
                </button>
            </p>
        </form>
    </div>
    <script>
        function clearText(id){
            let inputBox = document.querySelector("#"+id);
            inputBox.value = "";
        }
    </script>
</body>
</html>