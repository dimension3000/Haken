

function validacion_contacto() {

    nombre = document.getElementById("nombre").value;
    //compañia = document.getElementById("compañia").value;
    email = document.getElementById("email").value;
    tel = document.getElementById("tel").value;
    ciudad = document.getElementById("ciudad").value;
    web = document.getElementById("web").value;
    mensaje = document.getElementById("mensaje_contacto").value;

    var telefono = /(^([0-9\s\+\-]+)|^)$/;
    /*var correo = /\S+@\S+\.\S+/;*/

    if (nombre=='') {
        // nombre
        alert('Por favor escriba un nombre valido');
        return false;
    } /*else if (true) {
        // compañia
        alert('Por favor una compañia valida');
        return false;
    }*/ else if (email=='') {
        // email
        alert('Por favor escriba un email valido');
        return false;
    } else if (ciudad=='') {
        // ciudad
        alert('Es necesario conocer la ciudad de donde solicita el servicio');
        return false;
    } else if (tel=='' || !telefono.test(tel)) {
        // tel
        alert('Por favor escriba un numero de telefono valido');
        return false;
    } /*else if (web=='') {
        // web
        alert('Por favor escriba la direccion web de su sitio');
        return false;
    }*/ else if (mensaje=='') {
        // web
        alert('Por favor escriba su mensaje para haken');
        return false;
    }

    return true;
}

function validacion_distribuidores() {

    usuario = document.getElementById("usuario").value;
    contraseña = document.getElementById("pass").value;

    if (usuario=='') {
        // nombre
        alert('[ERROR] Es necesario que escriba su usuario');
        return false;
    } else if (contraseña=='') {
        // compañia
        alert('[ERROR] Es necesario que escriba su contraseña');
        return false;
    }

    //Codificando password para ser enviado en sha1
    document.getElementById("pass").value = SHA1(document.getElementById("pass").value);
    return true;
}


