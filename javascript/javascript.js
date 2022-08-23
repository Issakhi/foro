var mensaje = "¡Complete todos los campos!";

function checkRegistro() {

    var nombre = document.getElementById("nombre");
    var email = document.getElementById("email");
    var pass = document.getElementById("pass");
    var passConfi = document.getElementById("passConfi");
    var pais = document.getElementById("pais");
    var ciudad = document.getElementById("ciudad");
    var mjPass = "Requisitos de la contraseña:\n * Una mayúscula.\n * Minimo 5 minúsculas.\n *  Un número.";

    if (nombre.value == "" ||
        email.value == "" ||
        pass.value == "" ||
        passConfi.value == "" ||
        pais.value == "" ||
        ciudad.value == ""
    ) {
        document.getElementById("textoer").innerHTML = mensaje;
    } else {
        if (validarEmail(email.value)) {
            if(validarPass(pass.value)){
               document.getElementById("formRegistro").submit();
            }else{
                alert(mjPass);
            }
            
        } else {
            document.getElementById("email").style.borderColor = "red";
        }
    }
}

function checkLogin(){

    alert("DENTROOO");

    /*var email = document.getElementById('correo');
    var pass = document.getElementById('cont');
    */
    
}

function validarEmail(email) {
    return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email);
}

function validarPass(pass) {
        return /^[A-Z]{1}[a-z]{5,10}[1-9]{1}$/.test(pass);
}

