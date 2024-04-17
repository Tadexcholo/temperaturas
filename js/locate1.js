window.onload = function() {
    var canvas = document.getElementById('myCanvas');
    var ctx = canvas.getContext('2d');

    // Crear una nueva instancia de la imagen de fondo
    var backgroundImage = new Image();

    // Definir la ruta de la imagen de fondo
    backgroundImage.src = 'img/mapa.png';

    // Esperar a que la imagen se cargue antes de dibujarla en el lienzo
    backgroundImage.onload = function() {
        // Dibujar la imagen de fondo en el lienzo
        ctx.drawImage(backgroundImage, 0, 0, canvas.width, canvas.height);

        // Obtener los datos de la tabla
        var tablaCoordenadas = document.getElementById('table');
        var filas = tablaCoordenadas.getElementsByTagName('tr');

        // Iterar sobre las filas de la tabla
        for (var i = 1; i < filas.length; i++) { // Empezamos desde 1 para omitir la fila de encabezado
            var fila = filas[i];
            var celdas = fila.getElementsByTagName('td');

            // Obtener las coordenadas X e Y de la fila
            var coordenadaX = parseFloat(celdas[4].innerText); // Obtener la coordenada X
            var coordenadaY = parseFloat(celdas[5].innerText); // Obtener la coordenada Y
            var rssi = parseFloat(celdas[3].innerText); // Obtener el valor de RSSI

            // Calcular el radio del círculo basado en el valor de RSSI
            var radio = rssi * 5.65; 

            // Dibujar un círculo alrededor del punto con el radio calculado
            ctx.beginPath();
            ctx.arc(coordenadaX, coordenadaY, radio, 0, 2 * Math.PI);
            ctx.strokeStyle = 'blue'; // Color del borde del círculo
            ctx.lineWidth = 2; // Grosor del borde del círculo
            ctx.stroke();
            ctx.closePath();

            // Dibujar un punto en el centro del círculo
            ctx.beginPath();
            ctx.arc(coordenadaX, coordenadaY, 3, 0, 2 * Math.PI);
            ctx.fillStyle = 'red'; // Color del punto
            ctx.fill(); // Dibujar el punto
            ctx.closePath();
        }
    };
};
