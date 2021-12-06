<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ $links['css'] }}">
    <script src="{{ $links['js'] }}"></script>
    <title>Confirm</title>
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
            <span class="app-name">BetAssistant</span>
        </div>
    </div>
    <div class="container">
       <span>Your selected <span class="font-kanit">package</span></span>
       <p>
           <div class="display-flex-space-around">
                <div class="text-align-center">
                    <span class="material-icons-round icon-big">
                    groups
                    </span><br>
                    <span>10 teams</span><br>
                    <span class="font-kanit">R10.00</span>
                </div>
           </div>
       </p>
       <p>
            <button>
                <span>Confirm and get fixtures</span>
                <span class="material-icons-sharp">
                arrow_forward
                </span>
            </button>
        </p>
    </div>
    <div class="curved-top-plain cl-red">
        <p>
           <div class="display-flex">
           <span class="material-icons-round">
            warning
            </span>
           <span>Please note, <span class="font-kanit">BetAssistant</span> will not be <span class="title">responsible</span> for any losing bet slip</span>
           </div>
       </p>
    </div>
</body>
</html>