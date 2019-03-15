//Controllo generale per i nomi (nome,cognome,citta,via)
function checkName(val){
    var regexName = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{2}[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/;
    return (regexName.test(val) && val.length<=50);
}

//Controllo della data di nascita
function checkDate(val){
    var dataN = val.split("-");
    var data_nascita = dataN[0] + "/" + dataN[1] + "/" + dataN[2];
    data_nascita = new Date(data_nascita);
    var dataMassima = new Date();
    dataMassima.setFullYear(dataMassima.getFullYear() - 100);
    var dataMinima = new Date();
    dataMinima.setFullYear(dataMinima.getFullYear() - 18);
    return (!((data_nascita > dataMinima) || (data_nascita < dataMassima) || dataN == ""));
}

//Controllo delle email
function checkEmail(val){
    var regexEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regexEmail.test(val);
}

//Controllo nel numero di telefono.
function checkNumber(val){
    val = val.replace(/ /g, "");
    val = val.replace(/-/g, "");
    var regexNumber = /^[\+]?[0-9-#]{10,14}$/;
    return regexNumber.test(val);
}

//Controllo del nap
function checkNap(val){
    var regexNap = /^\d{4,5}$/;
    return regexNap.test(val);
}

//Controllo del numero civico
function checkCivicNumber(val){
    var regexCivic = /^([0-9A-Za-z]{1,4})$/;
    var check = true;
    for (var i = 0; i < val.length; i++) {
        if(isNaN(val[i]) && (i != val.length-1 || i == 0)){
            check = false;
        }
    }
    return (!(!regexCivic.test(val) || check == false));
}

//Controllo se le password sono uguali
function checkPassword(pas1, pas2){
    return (pas1 == pas2) && pas2.toLowerCase() == pas1 && /\d/.test(pas1) && pas1.length > 7;
}

//Controllo lato client dei campi con evenutali notifiche in caso di errore.
function checkAll(){
    var inputs = document.getElementsByTagName("input");
    if(checkName(inputs[0].value) && checkName(inputs[1].value) && checkDate(inputs[2].value) && checkName(inputs[3].value) && 
    checkCivicNumber(inputs[4].value) && checkNap(inputs[5].value) && checkName(inputs[6].value)  && checkNumber(inputs[7].value) &&
    checkEmail(inputs[8].value) && checkPassword(inputs[9].value, inputs[10].value)){
        document.getElementById("registration_form").submit();
    }else{
        if(!checkName(inputs[0].value)){
            inputs[0].style.backgroundColor = "#ffcccc";
            $.notify("Nome non valido!", "error");
        }else{
            inputs[0].style.backgroundColor = none;
        }
        if(!checkName(inputs[1].value)){
            inputs[1].style.backgroundColor = "#ffcccc";
            $.notify("Cognome non valido!", "error");
        }else{
            inputs[1].style.backgroundColor = none;
        }
        if(!checkDate(inputs[2].value)){
            inputs[2].style.backgroundColor = "#ffcccc";
            $.notify("Data non valida!", "error");
        }else{
            inputs[2].style.backgroundColor = none;
        }
        if(!checkName(inputs[3].value)){
            inputs[3].style.backgroundColor = "#ffcccc";
            $.notify("Via non valida!", "error");
        }else{
            inputs[3].style.backgroundColor = none;
        }
        if(!checkCivicNumber(inputs[4].value)){
            inputs[4].style.backgroundColor = "#ffcccc";
            $.notify("Numero Civico non valido!", "error");
        }else{
            inputs[4].style.backgroundColor = none;
        }
        if(!checkNap(inputs[5].value)){
            inputs[5].style.backgroundColor = "#ffcccc";
            $.notify("CAP non valido!", "error");
        }else{
            inputs[5].style.backgroundColor = none;
        }
        if(!checkName(inputs[6].value)){
            inputs[6].style.backgroundColor = "#ffcccc";
            $.notify("Citta non valida!", "error");
        }else{
            inputs[6].style.backgroundColor = none;
        }
        if(!checkNumber(inputs[7].value)){
            inputs[7].style.backgroundColor = "#ffcccc";
            $.notify("Numero di telefono non valido!", "error");
        }else{
            inputs[7].style.backgroundColor = none;
        }
        if(!checkEmail(inputs[8].value)){
            inputs[8].style.backgroundColor = "#ffcccc";
            $.notify("Email non valida!", "error");
        }else{
            inputs[8].style.backgroundColor = none;
        }
        if(!checkPassword(inputs[9].value, inputs[10].value)){
            inputs[9].style.backgroundColor = "#ffcccc";
            inputs[10].style.backgroundColor = "#ffcccc";
            $.notify("Password non corrispondenti!", "error");
        }else{
            inputs[9].style.backgroundColor = none;
            inputs[10].style.backgroundColor = none;
        }
    }
}

//Richiesta di cancellamento di tutti i campi.
function deleteAll(){
    if(confirm("Sei sicuro di voler cancellare i dati?")){
        clearAll();
        $.notify("La cencellazione è avvenuta con successo", "success");
    }
}

//rimuove il colore rosso dagli input errati
function normal(input){
    input.style.backgroundColor = none; 
}