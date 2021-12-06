var googleIcons = document.createElement("link");
googleIcons.rel = "stylesheet";
googleIcons.href = "https://fonts.googleapis.com/icon?family=Material+Icons+Outlined";

var googleIconsRound = document.createElement("link");
googleIconsRound.rel = "stylesheet";
googleIconsRound.href = "https://fonts.googleapis.com/icon?family=Material+Icons+Round";

var googleIconsSharp = document.createElement("link");
googleIconsSharp.rel = "stylesheet";
googleIconsSharp.href = "https://fonts.googleapis.com/icon?family=Material+Icons+Sharp";


var jQuery = document.createElement("script");
jQuery.src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js";

document.getElementsByTagName("head")[0].appendChild(googleIcons);
document.getElementsByTagName("head")[0].appendChild(googleIconsRound);
document.getElementsByTagName("head")[0].appendChild(googleIconsSharp);
document.getElementsByTagName("head")[0].appendChild(jQuery);

function redirect(path){
    window.location.href = path;
}

function selectedBank(self, className, text){
    for (let i = 0; i < document.querySelectorAll("."+className).length; i++) {
        const element = document.querySelectorAll("."+className)[i];
        element.classList.remove(className);
    }
    self.classList.add(className);
    document.querySelector("#bankname").value = text;
}

function redirectBack(){
    window.history.back();
}

function submitForm(formId){
    let element = document.querySelector("#"+formId)
    element.submit();
}

function hidethisShow(self, id){
    self.style.display = "none";
    document.querySelector("#"+id).style.display = "block";
}

function showHide(id){
    let element = document.querySelector("#"+id);
    if(element.style.display == "" || element.style.display == "none"){
        element.style.display = "block";
    }else{
        element.style.display = "none";
    }
}

function selectedCompany(self, className, text){
    for (let i = 0; i < document.querySelectorAll("."+className).length; i++) {
        const element = document.querySelectorAll("."+className)[i];
        element.classList.remove(className);
    }
    self.classList.add(className);
    if(document.querySelector("#company")){
        document.querySelector("#company").value = text;
    }
}
