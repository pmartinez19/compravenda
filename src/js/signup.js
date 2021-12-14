function validateForm() {
    if (document.forms["formulario"]["username"].value == "") {
        alert("Username campo obligatorio!");
        return false;
    }
    if ( document.forms["formulario"]["password"].value == "") {
        if ( document.forms["formulario"]["cpassword"].value == ""){
            alert("Confirmación clave necesaria");
            return false;
        }
        else{
            if ( document.forms["formulario"]["password"].value != document.forms["formulario"]["cpassword"].value){
                alert("Las claves no coinciden!");
                return false;
            }
        }
        alert("Password campo obligatorio!");
        return false;
    }
    if (document.forms["formulario"]["email"].value == "") {
        alert("Email campo obligatorio!");
        return false;
    }
    if (document.forms["formulario"]["fname"].value == "") {
        alert("Name campo obligatorio!");
        return false;
    }
    if (document.forms["formulario"]["telefono"].value == "" ){
        if (isNaN(document.forms["formulario"]["telefono"].value) || document.forms["formulario"]["telefono"].value.length != 9)
            {
        alert("Número de teléfono inválido");	
        return false;
        }
    }
    if (document.forms["formulario"]["direccion"].value == "") {
        alert("direccion obligatorio");
        return false;
    }
    if (document.forms["formulario"]["ciudad"].value == "") {
        alert("ciudad obligatio");
        return false;
    }
    if (document.forms["formulario"]["pais"].value == "") {
        alert("pais obligatorio");
        return false;
    }
    if (x = document.forms["formulario"]["zip"].value == "") {
        alert("Zip obligatorio");
        return false;
    }else{
        document.forms["formulario"].submit();
    }
}
