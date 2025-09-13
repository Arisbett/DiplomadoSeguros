

function campo_error(element,tipo,msg){

        if(tipo==1){
            //document.getElementById(msg).style.visibility ="visible";
            document.getElementById(element).className="form-control form-control-error";
            document.getElementById(element).focus();
        }else{
            document.getElementById(element).className="form-control";
            //document.getElementById(msg).style.visibility ="hidden";
        }
}

function texto_error(element,tipo,msg){//alert(element+"*"+tipo+"*"+msg)

        if(tipo==1){
            //document.getElementById(msg).style.visibility ="visible";
            document.getElementById(element).className="form-text form-text-error";
            document.getElementById("err_"+element).innerHTML='<small class="form-text form-text-error">Este campo es obligatorio</small>';
        }else{
            document.getElementById(element).className="";
            //document.getElementById(msg).style.visibility ="hidden";
            document.getElementById("err_"+element).innerHTML='';
        }
}

function valida_correo(forma,emailf){

    var er_fh = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;

    if ( !(er_fh.test( forma[emailf].value )) ) {
        document.getElementById("msg").innerHTML="Formato de correo electr&oacute;nico invalido";
        document.getElementById("msg").style.visibility ="visible";
        return 0;
    } else{
        document.getElementById("msg").style.visibility ="hidden";
    }
    return 1;
}


function isNumberKey(e) {
	var key;
	if(window.event) {

		key = e.keyCode;
	} else if(e.which) {

		key = e.which;
	}

	if (key < 48 || key > 57) {
	    if(key == 46) {

	         return true;
		} else {
			return false;
		}
	}

	return true;
}

function isAlfaNumberKey(e) {
	var key;
	if(window.event) {

		key = e.keyCode;
	} else if(e.which) {

		key = e.which;
	}

	if ((key >= 48 && key <= 57) || (key >= 65 && key <= 90) || key >= 97 && key <= 122) {
	    if(key == 46) {

	         return true;
		} else {
			return false;
		}
	}

	return true;
}

function chk_keys(e){

    var key;
	if(window.event) {

		key = e.keyCode;
	} else if(e.which) {

		key = e.which;
	}

	if (key==17) {
        alert("acci\u00F3n no permitida");
	    return false;
	}

	return true;

}


