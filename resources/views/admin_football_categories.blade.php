<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ $links['css'] }}">
    <script src="{{ $links['js'] }}"></script>
    <title>Football categories</title>
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
            <span class="app-name">Football category</span>
        </div>
    </div>
    <div class="container">
        <span>Select <span class="font-kanit">football category</span></span>
        <p>
            <div class="input-box">
                <span class="material-icons-sharp">
                search
                </span>
                <input type="text" name="search" placeholder="Search for a football category">
            </div>
        </p>
        <p>
           <div class="display-flex-space-around">
                <div class="text-align-center" onclick="selectCategory('Double chance')">
                    <span class="material-icons-round icon-big-shadow">
                    close
                    </span><br>
                    <p>
                        <span>Double chance</span><br>
                    </p>
                </div>
                <div class="text-align-center" onclick="selectCategory('Take the risk')">
                    <span class="material-icons-round icon-big-shadow">
                    question_mark
                    </span><br>
                    <p>
                        <span>Take the risk</span><br>
                    </p>
                </div>
            </div>
            <div class="display-flex-space-around">
                <div class="text-align-center" onclick="selectCategory('Both to score')">
                    <span class="material-icons-round icon-big-shadow">
                    swap_vert
                    </span><br>
                    <p>
                        <span>Both to score</span><br>
                    </p>
                </div>
                <div class="text-align-center" onclick="selectCategory('2.5 Goals')">
                    <span class="material-icons-round icon-big-shadow">
                    hdr_strong
                    </span><br>
                    <p>
                        <span>2.5 Goals</span><br>
                    </p>
                </div>
            </div>
            <div class="display-flex-space-around">
                <div class="text-align-center" onclick="selectCategory('1.5 Goals')">
                    <span class="material-icons-round icon-big-shadow">
                    hdr_weak
                    </span><br>
                    <p>
                        <span>1.5 Goals</span><br>
                    </p>
                </div>
                <div class="text-align-center" onclick="selectCategory('Sure 2')">
                    <span class="material-icons-sharp icon-big-shadow">
                    check
                    </span><br>
                    <p>
                        <span>Sure 2</span><br>
                    </p>
                </div>
            </div>
            <div class="display-flex-space-around">
                <div class="text-align-center">
                    <span class="material-icons-round icon-big-shadow">
                    merge_type
                    </span><br>
                    <p>
                        <span>Single combo</span><br>
                    </p>
                </div>
           </div>
        </p>
    </div>
    <form id="categoryform" method="POST">
        @csrf
        @method("POST")
    </form>
    <script>
        function selectCategory(category){
            let form = document.querySelector("#categoryform");
            form.action = "/category/"+category;
            form.submit();
        }
    </script>
</body>
</html>