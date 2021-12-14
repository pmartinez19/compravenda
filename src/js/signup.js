function validateForm() {
    if (document.forms["formulario"]["username"].value == "") {
        alert("Username must be filled out");
        return false;
    }
    if ( document.forms["formulario"]["password"].value == "") {
        if ( document.forms["formulario"]["cpassword"].value == ""){
            alert("Confirmación clave necesaria");
            return false;
        }
        else{
            if ( document.forms["formulario"]["password"].value != document.forms["formulario"]["cpassword"].value){
                alert("Las claves no coinciden");
                return false;
            }
        }
        alert("Password must be filled out");
        return false;
    }
    if (document.forms["formulario"]["email"].value == "") {
        alert("Email must be filled out");
        return false;
    }
    if (document.forms["formulario"]["fname"].value == "") {
        alert("Name must be filled out");
        return false;
    }
    if (document.forms["formulario"]["phone"].value == "" ){
        let phone = document.forms["formulario"]["phone"].value.paserInt();
        if (isNaN(document.forms["formulario"]["phone"].value) || document.forms["formulario"]["phone"].value.length != 9)
            {
        alert("Número de teléfono inválido" + typeof document.forms["formulario"]["phone"].value)	
        return false;
        }
    }
    if (document.forms["formulario"]["address"].value == "") {
        alert("Address must be filled out");
        return false;
    }
    if (document.forms["formulario"]["city"].value == "") {
        alert("City must be filled out");
        return false;
    }
    if (document.forms["formulario"]["state"].value == "") {
        alert("State must be filled out");
        return false;
    }
    if (x = document.forms["formulario"]["zip"].value == "") {
        alert("Zip must be filled out");
        return false;
    }else{
        document.forms["formulario"].submit();
    }
}
