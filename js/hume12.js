// Variable global para el gráfico de humedad
var myHumeChart;

// Función para obtener y actualizar los datos de humedad
function humedatos() {
    // Hacer una petición AJAX para obtener los datos del servidor
    $.ajax({
        url: "https://bledevices.000webhostapp.com/api/humedad.php",
        type: "GET",
        dataType: "json",
        success: function(responseData) {
            console.log("Datos de humedad recibidos:", responseData);
            // Resto del código para procesar los datos y crear el gráfico

            // Arrays para almacenar humedades y fechas
            var humedades = [];
            var fechas = [];

            // Iterar sobre los datos y almacenar humedades y fechas en los arrays
            responseData.forEach(function(item) {
                humedades.push(item.humedad);
                var hora = item.fecha.substring(11, 19); // Extraer los caracteres desde el índice 11 hasta el 15 (hora:minuto)
                fechas.push(hora);
            });

            // Imprimir los arrays en la consola para verificar
            console.log("Humedades:", humedades);
            console.log("Fechas:", fechas);

            // Actualizar los datos del gráfico de humedad existente
            myHumeChart.data.labels = fechas;
            myHumeChart.data.datasets[0].data = humedades;
            myHumeChart.update();
        },
        error: function(xhr, status, error) {
            // Manejar errores si la petición falla
            console.error("Error al obtener los datos de humedad:", error);
        }
    });
}

// Crear el gráfico de humedad inicial
$(document).ready(function() {
    var ctx = document.getElementById('hume').getContext('2d');
    myHumeChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: 'Humedad (%)',
                borderColor: 'rgba(255, 99, 132, 1)',
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

    // Ejecutar la función humedatos() cada 10 segundos
    setInterval(humedatos, 10000); // 10000 milisegundos = 10 segundos
});
