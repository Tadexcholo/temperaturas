// Verifica si hay un valor de página almacenado en localStorage
var page = localStorage.getItem('page');

// Establece el estado inicial según el valor almacenado o un valor predeterminado
if (page === 'mapa') {
    mapa();
} else if (page === 'devices') {
    devices();
} else {
    // Por defecto, muestra 'info' si no hay ningún valor almacenado
    info();
}


function info() {
    document.getElementById('mapa').style.display = 'none';
    document.getElementById('info').style.display = 'block';
    document.getElementById('devices').style.display = 'none';

    document.getElementById('nav1').classList.remove('active');
    document.getElementById('nav2').classList.add('active');
    document.getElementById('nav3').classList.remove('active');
    
    // Guarda el estado actual en localStorage
    localStorage.setItem('page', 'info');
}

function mapa() {
    document.getElementById('mapa').style.display = 'block';
    document.getElementById('info').style.display = 'none';
    document.getElementById('devices').style.display = 'none';

    document.getElementById('nav1').classList.add('active');
    document.getElementById('nav2').classList.remove('active');
    document.getElementById('nav3').classList.remove('active');
    
    // Guarda el estado actual en localStorage
    localStorage.setItem('page', 'mapa');
}

function devices() {
    document.getElementById('mapa').style.display = 'none';
    document.getElementById('info').style.display = 'none';
    document.getElementById('devices').style.display = 'block';

    document.getElementById('nav1').classList.remove('active');
    document.getElementById('nav2').classList.remove('active');
    document.getElementById('nav3').classList.add('active');
    
    // Guarda el estado actual en localStorage
    localStorage.setItem('page', 'devices');
}
function tablaUsuarios() {
    var table = new DataTable('#mydatatable', {
        language: {
        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
        },
    });
}
function tablaBLE() {
    var table1 = new DataTable('#table', {
        language: {
        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
        },
    });
}


