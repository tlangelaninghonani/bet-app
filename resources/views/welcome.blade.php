<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ $links['css'] }}">
    <script src="{{ $links['js'] }}"></script>
    <title>Welcome</title>
</head>
<style>
    .header{
        background-color: transparent;
    }
</style>
<body>
    <div id="logo" class="logo">
        <span class="app-name"><span class="app-name-bold">Mabuza BetAssistant</span></span>
    </div>
    <div class="header-home">
        <span class="app-name"><span class="app-name-bold">Mabuza BetAssistant</span></span>
    </div>
    <div class="banner-home">
        <img src="https://static.independent.co.uk/2021/11/04/22/newFile-1.jpg?width=1200&auto=webp&quality=75" alt="">
    </div>
    <div class="curved-top-home">
        <div class="shadow-patch"></div>
        <span class="statement">Get the promising <span class="font-kanit-statement">football</span> <span class="title">bet</span> <span class="title">predictions</span> and make that <span class="font-kanit-statement">dream</span> come true</span>
        <p>
            <span class="font-kanit">Predictions featured in</span>
        </p>
        <p>
            <div class="display-flex-align">
                <div class="display-flex-auto">
                    <div class="display-flex-align">
                        <span class="material-icons-round">
                        close
                        </span>
                        <span>Double score</span>
                    </div>
                    <div class="display-flex-align">
                        <span class="material-icons-round">
                        question_mark
                        </span>
                        <span>Take the risk</span>
                    </div>
                    <div class="display-flex-align">
                        <span class="material-icons-round">
                        swap_vert
                        </span>
                        <span>Both to score</span>
                    </div>
                    <div class="display-flex-align">
                        <span class="material-icons-round">
                        hdr_strong
                        </span>
                        <span>2.5 Goals</span>
                    </div>
                    <div class="display-flex-align">
                        <span class="material-icons-round">
                        hdr_weak
                        </span>
                        <span>1.5 Goals</span>
                    </div>
                    <div class="display-flex-align">
                        <span class="material-icons-round">
                        check_circle
                        </span>
                        <span>Sure 2</span>
                    </div>
                    <div class="display-flex-align">
                        <span class="material-icons-round">
                        merge_type
                        </span>
                        <span>Single combo</span>
                    </div>
                </div>
            </div>
        </p>
        <p>
            <button onclick="redirect('/signup')">
                <span>Get started</span>
            </button>
        </p>
        <script>
            setTimeout(() => {
                document.querySelector("#logo").style.display = "none";
            }, 5000);
        </script>
    </div>
</body>
</html>