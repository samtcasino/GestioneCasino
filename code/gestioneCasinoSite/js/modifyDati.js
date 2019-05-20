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

//Controllo lato client dei campi con evenutali notifiche in caso di errore.
function checkAll(){
    var inputs = document.getElementsByTagName("input");
    if(checkName(inputs[1].value) && checkName(inputs[2].value) && checkDate(inputs[3].value) && checkName(inputs[4].value) && 
    checkCivicNumber(inputs[5].value) && checkNap(inputs[6].value) && checkName(inputs[7].value)  && checkNumber(inputs[8].value)){
        document.getElementById('update_form').submit();
    }else{
        if(!checkName(inputs[1].value)){
            inputs[1].style.backgroundColor = "#ffcccc";
            $.notify("Nome non valido!", { position:"bottom left" });
        }else{
            inputs[1].style.backgroundColor = "white";
        }
        if(!checkName(inputs[2].value)){
            inputs[2].style.backgroundColor = "#ffcccc";
            $.notify("Cognome non valido!", { position:"bottom left" });
        }else{
            inputs[2].style.backgroundColor = "white";
        }
        if(!checkName(inputs[3].value)){
            inputs[3].style.backgroundColor = "#ffcccc";
            $.notify("Via non valida!", { position:"bottom left" });
        }else{
            inputs[3].style.backgroundColor = "white";
        }
        if(!checkCivicNumber(inputs[4].value)){
            inputs[4].style.backgroundColor = "#ffcccc";
            $.notify("Numero Civico non valido!", { position:"bottom left" });
        }else{
            inputs[4].style.backgroundColor = "white";
        }
        if(!checkNap(inputs[5].value)){
            inputs[5].style.backgroundColor = "#ffcccc";
            $.notify("CAP non valido!", { position:"bottom left" });
        }else{
            inputs[5].style.backgroundColor = "white";
        }
        if(!checkName(inputs[6].value)){
            inputs[6].style.backgroundColor = "#ffcccc";
            $.notify("Citta non valida!", { position:"bottom left" });
        }else{
            inputs[6].style.backgroundColor = "white";
        }
        if(!checkNumber(inputs[7].value)){
            inputs[7].style.backgroundColor = "#ffcccc";
            $.notify("Numero di telefono non valido!", { position:"bottom left" });
        }else{
            inputs[7].style.backgroundColor = "white";
        }
        if(!checkDate(inputs[8].value)){
            inputs[8].style.backgroundColor = "#ffcccc";
            $.notify("Data di nascita non valida!", { position:"bottom left" });
        }else{
            inputs[8].style.backgroundColor = "white";
        }
    }
}

//rimuove il colore rosso dagli input errati
function normal(input){
    input.style.backgroundColor = "white"; 
}

//metodo che aggiunge una notifica al campo
function tooltip(input, testo){
    $(input).notify(
        testo, 
        { 
            elementPosition:"bottom right",
            className: 'info'
        }
        
      );
}
