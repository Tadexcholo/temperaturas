function tempdatos() {
    // Hacer una petición AJAX para obtener los datos del servidor
    $.ajax({
        url: "https://bledevices.000webhostapp.com/api/temperatura.php",
        type: "GET",
        dataType: "json",
        success: function(responseData) {
            console.log("Datos recibidos:", responseData);
            // Resto del código para procesar los datos y crear el gráfico

            // Arrays para almacenar temperaturas y fechas
            var temperaturas = [];
            var fechas = [];

            // Iterar sobre los datos y almacenar temperaturas y fechas en los arrays
            responseData.forEach(function(item) {
                temperaturas.push(item.temperatura);
                var hora = item.fecha.substring(11, 19); // Extraer los caracteres desde el índice 11 hasta el 15 (hora:minuto)
                fechas.push(hora);
            });

            // Imprimir los arrays en la consola para verificar
            console.log("Temperaturas:", temperaturas);
            console.log("Fechas:", fechas);

            // Actualizar los datos del gráfico existente
            myChart.data.labels = fechas;
            myChart.data.datasets[0].data = temperaturas;
            myChart.update();
        },
        error: function(xhr, status, error) {
            // Manejar errores si la petición falla
            console.error("Error al obtener los datos:", error);
        }
    });
}

// Crear el gráfico inicial
var ctx = document.getElementById('temp').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
            label: 'Temperatura (°C)',
            borderColor: 'rgba(75, 192, 192, 1)',
            data: [],
            fill: true,
        }],
    },
    options: {
        scales: {
            x: {
                type: 'category',
            },
            y: {
                min: 0,
            },
        },
    },
});

// Ejecutar la función tempdatos() cada 10 segundos
setInterval(tempdatos, 10000); // 10000 milisegundos = 10 segundos
