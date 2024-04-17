// Cargar clave pública de manera asíncrona
var crypt = new JSEncrypt();

$.get("clave-publica.txt", function (clavePublica) {
    crypt.setKey(clavePublica);
});

function getToken() {
    // Obtén el token del campo oculto en el formulario
    var TokenField = document.querySelector('input[name="csrf_token"]');
    return TokenField ? TokenField.value : null;
}

$(document).on("submit", "#frmEnviarTexto", function (event) {
    event.preventDefault(); // Evitar el envío del formulario por defecto
    var txtTexto = $(this).find("#txtTexto");
    var texto = txtTexto.val();
    var txtEmail = $(this).find("#txtEmail");
    var email = txtEmail.val();
    var txtCatcha = $(this).find("#captchaInput");
    var catcha = txtCatcha.val();
    var txtToken = $(this).find("#captchaInput");
    var TokenValue = txtToken.val();
    // Cifrar los datos con la clave pública
    var valorCifrado = crypt.encrypt(texto);
    var emailCifrado = crypt.encrypt(email);
    // Enviar datos cifrados al servidor utilizando AJAX
    $.post("bledevices.php", {
        texto: valorCifrado,
        email: emailCifrado,
        catcha: catcha,
        token1: TokenValue
    });
    // Limpiar los campos de texto después de enviar los datos
    txtTexto.val("");
    txtEmail.val("");
    // Obtener el botón de cierre del modal
    var btnCerrar = document.querySelector("#modalRegistrarse .btn-close");
    // Simular hacer clic en el botón de cierre
    btnCerrar.click();
    $.post("bledevices.php", {
        tabla: tablaUsuario
    });
});

$(document).on("submit", "#formInicio", function(event) {
    event.preventDefault(); // Evitar el envío del formulario por defecto
    var txtTexto1 = $(this).find("#txtTexto1");
    var texto = txtTexto1.val();
    var txtEmail1 = $(this).find("#txtEmail2");
    var email = txtEmail1.val();
    // Cifrar los datos con la clave pública
    var valorCifrado = crypt.encrypt(texto);
    var emailCifrado = crypt.encrypt(email);
    // Enviar datos cifrados al servidor utilizando AJAX
    $.post("bledevices.php", {
        password: valorCifrado,
        correo: emailCifrado
    })
    .done(function(response) {
        // Limpiar los campos de texto después de enviar los datos
        txtTexto1.val("");
        txtEmail1.val("");
        window.location.href = "bledevices.php";
    })
    .fail(function(error) {
        console.error("Error en la solicitud AJAX: ", error);
    });
    // Obtener el botón de cierre del modal
    var btnCerrar = document.querySelector("#modalIniciarSesion .btn-close");
    // Simular hacer clic en el botón de cierre
    btnCerrar.click();
});

$(document).on("click", "#BotonCerrarSesion", function() {
    $.post("bledevices.php", {
        cerrarSesion: "Cerrar"
    }, function(data) {
        // Puedes agregar código aquí para manejar la respuesta del servidor
        console.log(data);
        window.location.href = "bledevices.php";

    });
});
function refreshCaptcha() {
    // Cambiar la fuente de la imagen del CAPTCHA para recargarla
    document.getElementById('captchaImage').src = 'generar_captcha.php?' + new Date().getTime();
}

