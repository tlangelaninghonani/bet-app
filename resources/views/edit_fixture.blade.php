<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ $links['css'] }}">
    <script src="{{ $links['js'] }}"></script>
    <title>edit fixture</title>
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
    }

    .fixtures-edit *{
        color: white;
    }
</style>
<body>
    <!--<div class="header-home">
        <div class="display-flex-align">
            <span class="material-icons-round icon-mid" onclick="redirectBack()">
            arrow_back
            </span>
            <span class="app-name">Edit fixture</span>
        </div>
    </div>-->
    <div class="banner-home">
        <img src="https://talksport.com/wp-content/uploads/sites/5/2021/08/crop-926141-1.jpg?strip=all&w=960&quality=100" alt="">
        <div class="fixtures-edit">
            <div class="display-flex-align">
                <span class="material-icons-round icon-mid" onclick="redirectBack()">
                arrow_back
                </span>
                <span class="app-name">Edit fixture</span>
            </div>
            <p>
                <div class="fixtures-auto">
                    <div class="fixtures">
                        <div class="display-flex-space-between">
                            <div class="club-logo">
                                <span >{{ $fixture->first_team }} {{ $fixture->first_team_odds }}</span><br>
                            </div>
                            <span class="font-kanit-small versus">VS</span>
                            <div class="club-logo">
                                <span>{{ $fixture->second_team }} {{ $fixture->second_team_odds }}</span>
                            </div>
                        </div>
                        <div>
                            <span class="title">{{ $fixture->prediction }}</span>
                        </div>
                        <div class="display-flex-align">
                            <span class="material-icons-round icon-font-small">
                            schedule
                            </span>
                            <span class="title-small">{{ $fixture->date }}</span>
                        </div>
                        <p>
                            <div>
                                <span class="title"><span class="font-kanit">{{ $fixturesId->category }}</span> category</span>
                            </div>
                        </p>
                    </div>
                </div>
            </p>
        </div>
    </div>
    <div class="curved-top-home">
        <div class="shadow-patch"></div>
        <form action="/fixture/edit/{{ $fixture->id }}/set" method="POST">
            <input type="hidden" id="outcome" value="{{ $fixture->prediction }}" name="outcome">
            @csrf
            @method("POST")
            <p>
                <div class="input-box">
                    <span class="material-icons-sharp">
                    groups
                    </span>
                    <input value="{{ $fixture->first_team }}" type="text" style="text-transform: capitalize" oninput="predict(this, 'secondteam')" id="firstteam" name="firstteam" placeholder="First team">
                    <div class="clear" onclick="clearText('firstteam')">
                        <span>Clear</span>
                    </div>
                </div>
            </p>
            <div class="text-align-center">
                <span class="font-kanit">Versus</span>
            </div>
            <p>
                <div class="input-box">
                    <span class="material-icons-sharp">
                    groups
                    </span>
                    <input value="{{ $fixture->second_team }}" type="text" style="text-transform: capitalize" oninput="predict(this, 'firstteam')" id="secondteam" name="secondteam" placeholder="Second team">
                    <div class="clear" onclick="clearText('secondteam')">
                        <span>Clear</span>
                    </div>
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
                                    @if(intval($fixture->day) == intval(date("d", strtotime("+ $i day"))))
                                        <option value="{{ date('d', strtotime('+ '.$i.' day')) }}" selected>{{ date("d", strtotime("+ $i day")) }}</option>
                                    @else
                                        <option value="{{ date('d', strtotime('+ '.$i.' day')) }}">{{ date("d", strtotime("+ $i day")) }}</option>
                                    @endif
                                @endfor
                            </select>
                            <span>{{ date("F") }}</span>
                        </div>
                        <div class="display-flex-align" style="gap: 0px !important">
                            <select name="hours" id="hours">
                                @for($i = 0; $i <= 23; $i++)
                                    @if($i < 10)
                                        @if(intval($fixture->hour) == $i)
                                            <option value="0{{ $i }}" selected>0{{ $i }}</option>
                                        @else
                                            <option value="0{{ $i }}">0{{ $i }}</option>
                                        @endif
                                    @else
                                        @if(intval($fixture->hour) == $i)
                                            <option value="{{ $i }}" selected>{{ $i }}</option>
                                        @else
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endif
                                    @endif
                                @endfor
                            </select>
                            <select name="minutes" id="minutes">
                                @for($i = 0; $i <= 59; $i++)
                                    @if($i < 10)
                                        @if(intval($fixture->minutes) == $i)
                                            <option value="0{{ $i }}" selected>0{{ $i }}</option>
                                        @else
                                            <option value="0{{ $i }}">0{{ $i }}</option>
                                        @endif
                                    @else
                                        @if(intval($fixture->minutes) == $i)
                                            <option value="{{ $i }}" selected>{{ $i }}</option>
                                        @else
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endif
                                    @endif
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
            </p>
            <div id="predictions">
                <div id="predictionsshow" onclick="hidethisShow(this, 'predectionsandtime')">
                    <br>
                    <div class="display-flex-center">
                        <span class="material-icons-sharp">
                        arrow_downward
                        </span>
                        <span >Show predictions and time</span>
                    </div>
                </div>
                <div class="display-none" id="predectionsandtime">
                    <div>
                        <div class="text-align-center">
                        <span class="font-kanit">Odds</span>
                    </div>
                    <p>
                        <div class="display-flex-space-around">
                            <div class="text-align-center truncate">
                                <div class="input-box" style="padding: 0 15px;">
                                    <span class="material-icons-sharp">
                                    groups
                                    </span>
                                    <input type="text" name="firstteamodds" value="{{ $fixture->first_team_odds }}" placeholder="0.00" required>
                                </div><br>
                                <span id="firstteamodds">{{ $fixture->first_team }}</span>
                            </div>
                            <div class="text-align-center">
                                <div class="input-box" style="padding: 0 15px;">
                                    <span class="material-icons-sharp">
                                    swap_horiz
                                    </span>
                                    <input type="text" name="drawodds" value="{{ $fixture->draw_odds }}" placeholder="0.00" required>
                                </div><br>
                                <span id="drawodds">Draw</span>
                            </div>
                            <div class="text-align-center truncate">
                                <div class="input-box" style="padding: 0 15px;">
                                    <span class="material-icons-sharp">
                                    groups
                                    </span>
                                    <input type="text" name="secondteamodds" value="{{ $fixture->second_team_odds }}" placeholder="0.00" required>
                                </div><br>
                                <span id="secondteamodds">{{ $fixture->second_team }}</span>
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
                                <div onclick="selectedOutcome(this, 'selected', '{{ $fixture->first_team }} win')">
                                    <span>{{ $fixture->first_team }} win</span>
                                </div>
                                <div onclick="selectedOutcome(this, 'selected', '{{ $fixture->second_team }} win')">
                                    <span>{{ $fixture->second_team }} win</span>
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
                            <div class="display-flex-auto">
                                <div onclick="selectedOutcome(this, 'selected', '{{ $fixture->first_team }} win')">
                                    <span>{{ $fixture->first_team }} win</span>
                                </div>
                                <div onclick="selectedOutcome(this, 'selected', '{{ $fixture->second_team }} win')"> 
                                    <span>{{ $fixture->second_team }} win</span>
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
                            <div class="display-flex-auto">
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
                                <div onclick="selectedOutcome(this, 'selected', '{{ $fixture->first_team }} win')">
                                    <span>{{ $fixture->first_team }} win</span>
                                </div>
                                <div onclick="selectedOutcome(this, 'selected', '{{ $fixture->second_team }} win')">
                                    <span>{{ $fixture->second_team }} win</span>
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
                </div>
                <p>
                    <button>
                        <span class="material-icons-sharp">
                        update
                        </span>
                        <span>update changes</span>
                    </button>
                </p>
            </div>
        </form>
    </div>
    <script>
        function clearText(id){
            let inputBox = document.querySelector("#"+id);
            inputBox.value = "";
        }
        function predict(self, teamId){
            let predictions = document.querySelectorAll(".predict");
            let predictClass = document.querySelector(".predictions");
            let predictionsContainer = document.querySelector("#predictions");
            let otherTeam = document.querySelector("#"+teamId);
            for (let i = 0; i < predictions.length; i++) {
                const element = predictions[i];
                element.remove();
            }
            if(self.value.length > 0){
                var outcomes = [" win", " to score", " to score (First half)",
                " to score (second half"];
                for (let i = 0; i < outcomes.length; i++) {
                    const outcome = outcomes[i];
                    var team = self.value;
                    var toPredict = document.createElement("div");
                    var toPredictSpan = document.createElement("span");
                    toPredict.classList.add("predict");
                    toPredict.setAttribute("onclick", "selectedOutcome(this, 'selected', '"+team + outcome+"')");
                    toPredictSpan.innerHTML = team + outcome;
                    toPredict.appendChild(toPredictSpan);
                    predictClass.appendChild(toPredict);   
                }
            }
            if(otherTeam.value.length > 0){
                var outcomes = [" win", " to score", " to score (First half)",
                " to score (second half"];
                for (let i = 0; i < outcomes.length; i++) {
                    const outcome = outcomes[i];
                    var team = otherTeam.value;
                    var toPredict = document.createElement("div");
                    var toPredictSpan = document.createElement("span");
                    toPredict.classList.add("predict");
                    toPredict.setAttribute("onclick", "selectedOutcome(this, 'selected', '"+team + outcome+"')");
                    toPredictSpan.innerHTML = team + outcome;
                    toPredict.appendChild(toPredictSpan);
                    predictClass.appendChild(toPredict);   
                }
            }
            var outcomes = ["Draw", "Both to score"];
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
            if(otherTeam.value.length > 0 && self.value.length > 0){
                predictionsContainer.style.display = "block";

            }else{

                predictionsContainer.style.display = "none";
            }
        }
        function predictDefault(selfId, teamId){
            let self =  document.querySelector("#"+selfId);
            let predictions = document.querySelectorAll(".predict");
            let predictClass = document.querySelector(".predictions");
            let predictionsContainer = document.querySelector("#predictions");
            let otherTeam = document.querySelector("#"+teamId);
            for (let i = 0; i < predictions.length; i++) {
                const element = predictions[i];
                element.remove();
            }
            if(self.value.length > 0){
                var outcomes = [" win", " to score", " to score (First half)",
                " to score (second half"];
                for (let i = 0; i < outcomes.length; i++) {
                    const outcome = outcomes[i];
                    var team = self.value;
                    var toPredict = document.createElement("div");
                    var toPredictSpan = document.createElement("span");
                    toPredict.classList.add("predict");
                    toPredict.setAttribute("onclick", "selectedOutcome(this, 'selected', '"+team + outcome+"')");
                    toPredictSpan.innerHTML = team + outcome;
                    toPredict.appendChild(toPredictSpan);
                    predictClass.appendChild(toPredict);   
                }
            }
            if(otherTeam.value.length > 0){
                var outcomes = [" win", " to score", " to score (First half)",
                " to score (second half"];
                for (let i = 0; i < outcomes.length; i++) {
                    const outcome = outcomes[i];
                    var team = otherTeam.value;
                    var toPredict = document.createElement("div");
                    var toPredictSpan = document.createElement("span");
                    toPredict.classList.add("predict");
                    toPredict.setAttribute("onclick", "selectedOutcome(this, 'selected', '"+team + outcome+"')");
                    toPredictSpan.innerHTML = team + outcome;
                    toPredict.appendChild(toPredictSpan);
                    predictClass.appendChild(toPredict);   
                }
            }
            var outcomes = ["Draw", "Both to score"];
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
            if(otherTeam.value.length > 0 && self.value.length > 0){
                predictionsContainer.style.display = "block";

            }else{

                predictionsContainer.style.display = "none";
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
    </script>
    <script>
        /*predictDefault('secondteam', 'firstteam');
        predictDefault('firstteam', 'secondteam');*/
    </script>
</body>
</html>