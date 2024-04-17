var language = localStorage.getItem('language'); 

if (language === 'spanish') {
    spanish();
} else if(language === 'english') {
    english();
} 

function spanish() {
    // Cambia el contenido de los enlaces en la lista
    var miLista = document.getElementById("miLista");
    miLista.getElementsByTagName("li")[0].getElementsByTagName("a")[0].innerHTML = "Mapa";
    miLista.getElementsByTagName("li")[1].getElementsByTagName("a")[0].innerHTML = "Acerca De";
    miLista.getElementsByTagName("li")[2].getElementsByTagName("a")[0].innerHTML = "Foro";

    // Cambia el contenido del botón
    var botonInicio = document.getElementById("BotonInicio");

    if (botonInicio) {
        botonInicio.innerHTML = "Iniciar Sesión";
    }

    document.getElementById('titleTabla').innerHTML = 'Tabla de Coordenadas'
    document.getElementById('textinfo3').innerHTML = 'Bluetooth Low Energy (BLE) es una tecnología de comunicación inalámbrica diseñada para consumir menos energía que el Bluetooth clásico. Es comúnmente utilizado en dispositivos de bajo consumo como dispositivos wearables, sensores y otros dispositivos IoT.';
    document.getElementById('textinfo4').innerHTML = 'Características clave de BLE:';
    var listaInfo = document.getElementById('textinfo5');
    listaInfo.getElementsByTagName("li")[0].innerHTML = 'Bajo consumo de energía';
    listaInfo.getElementsByTagName("li")[1].innerHTML = 'Corto alcance';
    listaInfo.getElementsByTagName("li")[2].innerHTML = 'Conexiones rápidas y eficientes';
    document.getElementById('textinfo6').innerHTML = 'Bluetooth Clásico';
    document.getElementById('textinfo7').innerHTML = 'Bluetooth Clásico es una tecnología de comunicación inalámbrica que ha estado presente durante más tiempo en comparación con BLE. Se utiliza en una variedad de dispositivos, como auriculares, altavoces y teclados.';
    document.getElementById('textinfo8').innerHTML = 'Características clave de Bluetooth Clásico:';
    var listaInfo2 = document.getElementById('textinfo9');
    listaInfo2.getElementsByTagName("li")[0].innerHTML = 'Alcance más largo que BLE';
    listaInfo2.getElementsByTagName("li")[1].innerHTML = 'Consumo de energía más alto en comparación con BLE';
    listaInfo2.getElementsByTagName("li")[2].innerHTML = 'Conexiones de datos más robustas';

    var modalU1 = document.getElementById("modalU1");
    if (modalU1) {
        modalU1.innerText = "Información de Usuario";
    }
    var modalU2 = document.getElementById("modalU2");
    if (modalU2) {
        modalU2.innerText = "Correo:";
    }
    var modalU3 = document.getElementById("modalU3");
    if (modalU3) {
        modalU3.innerText = "Contraseña:";
    }
    var modalU4 = document.getElementById("modalU4");
    if (modalU4) {
        modalU4.innerText = "Salir";
    }
    var modalU5 = document.getElementById("modalU5");
    if (modalU5) {
        modalU5.innerText = "Cerrar Sesión";
    }
    var modalU6 = document.getElementById("modalU6");
    if (modalU6) {
        modalU6.innerText = "Modificar Información de Usuario";
    }
    var modalU7 = document.getElementById("modalU7");
    if (modalU7) {
        modalU7.innerText = "Correo:";
    }
    var modalU8 = document.getElementById("modalU8");
    if (modalU8) {
        modalU8.innerText = "Contraseña:";
    }
    var modalU9 = document.getElementById("modalU9");
    if (modalU9) {
        modalU9.innerText = "Salir";
    }
    var modalU10 = document.getElementById("modalU10");
    if (modalU10) {
        modalU10.innerText = "Regresar";
    }
    var modalU11 = document.getElementById("modalU11");
    if (modalU11) {
        modalU11.innerText = "Guardar";
    }
    var modalU12 = document.getElementById("modalU12");
    if (modalU12) {
        modalU12.innerText = "Iniciar sesión";
    }
    var modalU13 = document.getElementById("modalU13");
    if (modalU13) {
        modalU13.innerText = "Correo:";
    }
    var modalU14 = document.getElementById("modalU14");
    if (modalU14) {
        modalU14.innerText = "Contraseña:";
    }
    var modalU15 = document.getElementById("modalU15");
    if (modalU15) {
        modalU15.innerText = "Salir";
    }
    var modalU16 = document.getElementById("modalU16");
    if (modalU16) {
        modalU16.innerText = "Registrarse";
    }
    var modalU17 = document.getElementById("modalU17");
    if (modalU17) {
        modalU17.innerText = "Iniciar sesión";
    }
    var modalU18 = document.getElementById("modalU18");
    if (modalU18) {
        modalU18.innerText = "Registrarse";
    }
    var modalU19 = document.getElementById("modalU19");
    if (modalU19) {
        modalU19.innerText = "Correo";
    }
    var modalU20 = document.getElementById("modalU20");
    if (modalU20) {
        modalU20.innerText = "Contraseña:";
    }
    var modalU21 = document.getElementById("modalU21");
    if (modalU21) {
        modalU21.innerText = "Recargar CAPTCHA";
    }
    var modalU22 = document.getElementById("modalU22");
    if (modalU22) {
        modalU22.innerText = "Salir";
    }
    var modalU23 = document.getElementById("modalU23");
    if (modalU23) {
        modalU23.innerText = "Registrarse";
    }
    var modalU24 = document.getElementById("modalU24");
    if (modalU24) {
        modalU24.innerText = "Iniciar Sesión";
    }

    // Guarda el estado actual en localStorage
    localStorage.setItem('language', 'spanish');
}

function english() {
    // Cambia el contenido de los enlaces en la lista
    var miLista = document.getElementById("miLista");
    miLista.getElementsByTagName("li")[0].getElementsByTagName("a")[0].innerHTML = "Map";
    miLista.getElementsByTagName("li")[1].getElementsByTagName("a")[0].innerHTML = "About";
    miLista.getElementsByTagName("li")[2].getElementsByTagName("a")[0].innerHTML = "Forum";

    // Cambia el contenido del botón
    var botonInicio = document.getElementById("BotonInicio");

    if (botonInicio) {
        botonInicio.innerHTML = "Log in";
    }

    document.getElementById('titleTabla').innerHTML = 'Coordinate Table'
    document.getElementById('textinfo3').innerHTML = 'Bluetooth Low Energy (BLE) is a wireless communication technology designed to consume less energy than classic Bluetooth. It is commonly used in low-power devices such as wearables, sensors and other IoT devices.';
    document.getElementById('textinfo4').innerHTML = 'BLE Key Features:';
    var listaInfo = document.getElementById('textinfo5');
    listaInfo.getElementsByTagName("li")[0].innerHTML = 'Low energy consumption';
    listaInfo.getElementsByTagName("li")[1].innerHTML = 'Short range';
    listaInfo.getElementsByTagName("li")[2].innerHTML = 'Fast and efficient connections';
    document.getElementById('textinfo6').innerHTML = 'Bluetooth Classic';
    document.getElementById('textinfo7').innerHTML = 'Bluetooth Classic is a wireless communication technology that has been around for a longer time compared to BLE. It is used in a variety of devices, such as headphones, speakers, and keyboards.';
    document.getElementById('textinfo8').innerHTML = 'Características clave de Bluetooth Clásico:';
    var listaInfo2 = document.getElementById('textinfo9');
    listaInfo2.getElementsByTagName("li")[0].innerHTML = 'Longer range than BLE';
    listaInfo2.getElementsByTagName("li")[1].innerHTML = 'Higher power consumption compared to BLE';
    listaInfo2.getElementsByTagName("li")[2].innerHTML = 'More robust data connections';
    
    var modalU1 = document.getElementById("modalU1");
    if (modalU1) {
        modalU1.innerText = "User Information";
    }
    var modalU2 = document.getElementById("modalU2");
    if (modalU2) {
        modalU2.innerText = "Email:";
    }
    var modalU3 = document.getElementById("modalU3");
    if (modalU3) {
        modalU3.innerText = "Password:";
    }
    var modalU4 = document.getElementById("modalU4");
    if (modalU4) {
        modalU4.innerText = "Exit";
    }
    var modalU5 = document.getElementById("modalU5");
    if (modalU5) {
        modalU5.innerText = "Sign off";
    }
    var modalU6 = document.getElementById("modalU6");
    if (modalU6) {
        modalU6.innerText = "Modify User Information";
    }
    var modalU7 = document.getElementById("modalU7");
    if (modalU7) {
        modalU7.innerText = "Email:";
    }
    var modalU8 = document.getElementById("modalU8");
    if (modalU8) {
        modalU8.innerText = "Password:";
    }
    var modalU9 = document.getElementById("modalU9");
    if (modalU9) {
        modalU9.innerText = "Exit";
    }
    var modalU10 = document.getElementById("modalU10");
    if (modalU10) {
        modalU10.innerText = "Return";
    }
    var modalU11 = document.getElementById("modalU11");
    if (modalU11) {
        modalU11.innerText = "Save";
    }
    var modalU12 = document.getElementById("modalU12");
    if (modalU12) {
        modalU12.innerText = "Log in";
    }
    var modalU13 = document.getElementById("modalU13");
    if (modalU13) {
        modalU13.innerText = "Email:";
    }
    var modalU14 = document.getElementById("modalU14");
    if (modalU14) {
        modalU14.innerText = "Password:";
    }
    var modalU15 = document.getElementById("modalU15");
    if (modalU15) {
        modalU15.innerText = "Exit";
    }
    var modalU16 = document.getElementById("modalU16");
    if (modalU16) {
        modalU16.innerText = "Check in";
    }
    var modalU17 = document.getElementById("modalU17");
    if (modalU17) {
        modalU17.innerText = "Log in";
    }
    var modalU18 = document.getElementById("modalU18");
    if (modalU18) {
        modalU18.innerText = "Check in";
    }
    var modalU19 = document.getElementById("modalU19");
    if (modalU19) {
        modalU19.innerText = "Email:";
    }
    var modalU20 = document.getElementById("modalU20");
    if (modalU20) {
        modalU20.innerText = "Password:";
    }
    var modalU21 = document.getElementById("modalU21");
    if (modalU21) {
        modalU21.innerText = "Reload CAPTCHA";
    }
    var modalU22 = document.getElementById("modalU22");
    if (modalU22) {
        modalU22.innerText = "Exit";
    }
    var modalU23 = document.getElementById("modalU23");
    if (modalU23) {
        modalU23.innerText = "Check in";
    }
    var modalU24 = document.getElementById("modalU24");
    if (modalU24) {
        modalU24.innerText = "Log in";
    }
    // Guarda el estado actual en localStorage
    localStorage.setItem('language', 'english');
}
