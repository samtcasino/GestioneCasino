//Controllo se le password sono uguali
function checkPassword(pas1, pas2){
    return (pas1 == pas2) && pas2.toLowerCase() != pas1 && /\d/.test(pas1) && pas1.length > 7;
}

//Controllo lato client dei campi con evenutali notifiche in caso di errore.
function checkAll(){
    var inputs = document.getElementsByTagName("input");
    if(checkPassword(inputs[0].value, inputs[1].value)){
        document.getElementById("registration_form").submit();
    }else{
        if(!checkPassword(inputs[0].value, inputs[1].value)){
            inputs[0].style.backgroundColor = "#ffcccc";
            inputs[1].style.backgroundColor = "#ffcccc";
            $.notify("Password non valida o non corrispondente!", { position:"bottom left" });
        }else{
            inputs[0].style.backgroundColor = "white";
            inputs[1].style.backgroundColor = "white";
        }
    }
}

//rimuove il colore rosso dagli input errati
function normal(input){
    input.style.backgroundColor = "white"; 
}