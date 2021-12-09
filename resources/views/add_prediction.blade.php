<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ $links['css'] }}">
    <script src="{{ $links['js'] }}"></script>
    <title>Add prediction</title>
</head>
<style>
    body{
        background-color: white;
        position: static;
    }
    *{
        color: black;
    }
    .fixtures-edit{
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        padding: var(--padding);
        background-color: rgba(0, 0, 0, .5);
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
    }

    .fixtures-edit *{
        color: white;
    }
</style>
<body>
    <div class="banner-home">
        <img src="https://talksport.com/wp-content/uploads/sites/5/2021/08/crop-926141-1.jpg?strip=all&w=960&quality=100" alt="">
        <div class="fixtures-edit">
            <div class="display-flex-align">
                <span class="material-icons-round icon-mid" onclick="redirectBack()">
                arrow_back
                </span>
                <span class="app-name">Match fixture</span>
            </div>
            <p>
                <div>
                    <span class="title"><span class="font-kanit">{{ $fixturesId->category }}</span> category</span>
                </div>
            </p>
        </div>
    </div>
    <div class="curved-top-home">
        <form action="/fixture/{{ Session::get('publishedfixturesid') }}/set" method="POST">
            <input type="hidden" id="outcome" name="outcome">
            @csrf
            @method("POST")
            <div id="predictions">
                <div>
                    <div class="text-align-center">
                    <span class="font-kanit">Odds</span>
                </div>
                <p>
                    <div class="display-flex-space-around">
                        <div class="text-align-center">
                            <div class="input-box" style="padding: 0 15px;">
                                <span class="material-icons-sharp">
                                groups
                                </span>
                                <input type="text" name="firstteamodds" placeholder="0.00" required>
                            </div><br>
                            <span id="firstteamodds">{{ Session::get("firstteam") }}</span>
                        </div>
                        <div class="text-align-center">
                            <div class="input-box" style="padding: 0 15px;">
                                <span class="material-icons-sharp">
                                swap_horiz
                                </span>
                                <input type="text" name="drawodds" placeholder="0.00" required>
                            </div><br>
                            <span id="drawodds">Draw</span>
                        </div>
                        <div class="text-align-center">
                            <div class="input-box" style="padding: 0 15px;">
                                <span class="material-icons-sharp">
                                groups
                                </span>
                                <input type="text" name="secondteamodds" placeholder="0.00" required>
                            </div><br>
                            <span id="secondteamodds">{{ Session::get("secondteam") }}</span>
                        </div>
                    </div>
                </p>
                @if($fixturesId->category == "Both to score")
                    <div>
                        <div class="text-align-center">
                        <span class="font-kanit">Prediction</span>
                    </div>
                    <p>
                        <div class="text-align-center">
                            <span>{{ $fixturesId->category }}</span>
                        </div>
                    </p>
                    <script>
                        document.querySelector("#outcome").value = "Both to score";
                    </script>
                @elseif($fixturesId->category == "Take the risk")
                    <div>
                        <div class="text-align-center">
                        <span class="font-kanit">Predictions</span>
                    </div>
                    <p>
                        <div class="display-flex-align">
                            <span class="material-icons-round icon-padding">
                            swipe_left
                            </span>
                            <div class="display-flex-auto">
                                <div onclick="selectedOutcome(this, 'selected', '{{ Session::get('firstteam') }} win')">
                                    <span>{{ Session::get("firstteam") }} win</span>
                                </div>
                                <div onclick="selectedOutcome(this, 'selected', '{{ Session::get('secondteam') }} win')">
                                    <span>{{ Session::get("secondteam") }} win</span>
                                </div>
                                <div onclick="selectedOutcome(this, 'selected', 'Draw')">
                                    <span>Draw</span>
                                </div>
                            </div>
                        </div>
                    </p>
                @elseif($fixturesId->category == "Double chance")
                    <div>
                        <div class="text-align-center">
                        <span class="font-kanit">Predictions</span>
                    </div>
                    <p>
                        <div class="display-flex-align">
                            <div class="predictions-centered">
                                <div onclick="selectedOutcome(this, 'selected', '{{ Session::get('firstteam') }} win')">
                                    <span>{{ Session::get("firstteam") }} win</span>
                                </div>
                                <div onclick="selectedOutcome(this, 'selected', '{{ Session::get('secondteam') }} win')"> 
                                    <span>{{ Session::get("secondteam") }} win</span>
                                </div>
                            </div>
                        </div>
                    </p>
                @elseif($fixturesId->category == "1.5 Goals")
                    <div>
                        <div class="text-align-center">
                        <span class="font-kanit">Predictions</span>
                    </div>
                    <p>
                        <div class="display-flex-center" >
                            <span class="material-icons-round">
                            arrow_upward
                            </span>    
                            <span>Over 1.5</span>
                        </div>
                    </p>
                    <script>
                        document.querySelector("#outcome").value = "Over 1.5";
                    </script>
                @elseif($fixturesId->category == "2.5 Goals")
                    <div>
                        <div class="text-align-center">
                        <span class="font-kanit">Predictions</span>
                    </div>
                    <p>
                        <div class="display-flex-align">
                            <div class="predictions-centered">
                                <div class="display-flex-align" onclick="selectedOutcome(this, 'selected', 'Over 2.5')">
                                    <span class="material-icons-round">
                                    arrow_upward
                                    </span>    
                                    <span>Over 2.5</span>
                                </div>
                                <div class="display-flex-align" onclick="selectedOutcome(this, 'selected', 'Under 2.5')"> 
                                    <span class="material-icons-round">
                                    arrow_downward
                                    </span>    
                                    <span>Under 2.5</span>
                                </div>
                            </div>
                        </div>
                    </p>
                @elseif($fixturesId->category == "Sure 2")
                    <div>
                        <div class="text-align-center">
                        <span class="font-kanit">Predictions</span>
                    </div>
                    <p>
                        <div class="display-flex-align">
                            <span class="material-icons-round icon-padding">
                            swipe_left
                            </span>
                            <div class="display-flex-auto">
                                <div onclick="selectedOutcome(this, 'selected', '{{ Session::get('firstteam') }} win')">
                                    <span>{{ Session::get("firstteam") }} win</span>
                                </div>
                                <div onclick="selectedOutcome(this, 'selected', '{{ Session::get('secondteam') }} win')">
                                    <span>{{ Session::get("secondteam") }} win</span>
                                </div>
                                <div onclick="selectedOutcome(this, 'selected', '1st Highest scoring half')">
                                    <span>1st Highest scoring half</span>
                                </div>
                                <div onclick="selectedOutcome(this, 'selected', '2st Highest scoring half')">
                                    <span>2st Highest scoring half</span>
                                </div>
                                <div onclick="selectedOutcome(this, 'selected', 'Both to score')">
                                    <span>Both to score</span>
                                </div>
                                <div onclick="selectedOutcome(this, 'selected', 'Home to win either half')">
                                    <span>Home to win either half</span>
                                </div>
                            </div>
                        </div>
                    </p>
                @endif
                <script>
                    function selectedOutcome(self, className, text){
                        for (let i = 0; i < document.querySelectorAll("."+className).length; i++) {
                            const element = document.querySelectorAll("."+className)[i];
                            element.classList.remove(className);
                        }
                        self.classList.add(className);
                        document.querySelector("#outcome").value = text;
                    }
                </script>
                <!--<div>
                    <div class="text-align-center">
                    <span class="font-kanit">Predictions</span>
                </div>
                <p>
                    <div class="display-flex-align">
                        <span class="material-icons-round icon-padding">
                        swipe_left
                        </span>
                        <div class="predictions">
                          
                        </div>
                    </div>
                </p>
                <script>
                    function predict(){
                        let predictions = document.querySelectorAll(".predict");
                        let predictClass = document.querySelector(".predictions");
                        let predictionsContainer = document.querySelector("#predictions");
                        var outcomes = [
                            "Draw", "Both to score", "Over 1.5", "Under 1.5", "Over 2.5",
                            "Under 2.5", "Over 3.5", "Under 3.5", "Over 4.5", "Under 4.5",
                            "Over 5.5", "Under 5.5"
                            ];
                        for (let i = 0; i < outcomes.length; i++) {
                            const outcome = outcomes[i];
                            var toPredict = document.createElement("div");
                            var toPredictSpan = document.createElement("span");
                            toPredict.classList.add("predict");
                            toPredict.setAttribute("onclick", "selectedOutcome(this, 'selected', '"+outcome+"')");
                            toPredictSpan.innerHTML = outcome;
                            toPredict.appendChild(toPredictSpan);
                            predictClass.appendChild(toPredict);   
                        }
                    }
                    function selectedOutcome(self, className, text){
                        for (let i = 0; i < document.querySelectorAll("."+className).length; i++) {
                            const element = document.querySelectorAll("."+className)[i];
                            element.classList.remove(className);
                        }
                        self.classList.add(className);
                        document.querySelector("#outcome").value = text;
                    }
                    predict();
                </script>
                <p>
                    <button class="white-button" type="button">
                        <span class="material-icons-sharp">
                        more_horiz
                        </span>
                        <span>More prediction options</span>
                    </button>
                </p>-->
                <p>
                    <button>
                        <span>Add fixture</span>
                        <span class="material-icons-sharp">
                        arrow_forward
                        </span>
                    </button>
                </p>
            </div>
        </form>
    </div>
    <script>
        function clearText(id){
            let inputBox = document.querySelector("#"+id);
            inputBox.value = "";
            document.querySelector("#predictions").style.display = "none";
        }
    </script>
</body>
</html>