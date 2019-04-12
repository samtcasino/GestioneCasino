function clickRegister(){
     window.location.replace("registration.html");
}

//Metodo che ritorna un valore in base al cookie.
function getCookie(cname) {
     console.log("Loo");
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
         var c = ca[i];
         while (c.charAt(0) == ' ') {
              c = c.substring(1);
         }
         if (c.indexOf(name) == 0) {
               var returnValue = c.substring(name.length, c.length);
               while(returnValue.includes("+")){
                   returnValue = returnValue.replace("+"," ");
               }
               console.log(returnValue);
               return returnValue;
         }
    }
    return "";
}

if(getCookie("error") != ""){
     $.notify(getCookie("error"), { position:"bottom left" });          
}