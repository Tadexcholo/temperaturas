const express = require('express');
const mysql = require('mysql');
const app = express();
const port = 3000;

app.use(express.urlencoded({ extended: true }));
app.use(express.json());

var con = mysql.createConnection({
  host: "185.232.14.52",
  user: "u760464709_torres_sotelo1",
  password: ":NuV8em2",
  database: "u760464709_torres_sotelo1"
});

con.connect((err) => {
  if (err) {
    console.error('Error connecting to database: ', err);
    return;
  }
  console.log('Connected to database');
});

app.get('/', (req, res) => {
  const selectQuery = 'SELECT * FROM temperaturas';
  con.query(selectQuery, (err, result) => {
    if (err) {
      console.error('Error executing select query: ', err);
      res.status(500).send('Internal Server Error');
      return;
    }
    res.send(`
      <!DOCTYPE html>
      <html lang="es">
      <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Temperatura y Humedad</title>
          <style>
              table {
                  width: 100%;
                  border-collapse: collapse;
              }
      
              th, td {
                  padding: 8px;
                  text-align: left;
                  border-bottom: 1px solid #ddd;
              }
      
              th {
                  background-color: #f2f2f2;
              }
          </style>
      </head>
      <body>
          <h2>Temperatura y Humedad</h2>
      
          <table>
              <tr>
                  <th>ID</th>
                  <th>Temperatura (°C)</th>
                  <th>Humedad (%)</th>
                  <th>Tiempo</th>
              </tr>
              ${result.map(row => `
                <tr>
                  <td>${row.id}</td>
                  <td>${row.temperatura}</td>
                  <td>${row.humedad}</td>
                  <td>${row.tiempo}</td>
                </tr>
              `).join('')}
          </table>
      
          <h2>Gráfico de Temperatura y Humedad</h2>
          <canvas id="myChart" width="400" height="200"></canvas>
      
          <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
          <script>
              var data = ${JSON.stringify(result)};
              var tiempoLabels = data.map(function(item) { return item.tiempo; });
              var temperaturaData = data.map(function(item) { return item.temperatura; });
              var humedadData = data.map(function(item) { return item.humedad; });
      
              var ctx = document.getElementById('myChart').getContext('2d');
              var myChart = new Chart(ctx, {
                  type: 'line',
                  data: {
                      labels: tiempoLabels,
                      datasets: [{
                          label: 'Temperatura (°C)',
                          data: temperaturaData,
                          borderColor: 'rgb(255, 99, 132)',
                          tension: 0.1,
                          yAxisID: 'temperatura'
                      }, {
                          label: 'Humedad (%)',
                          data: humedadData,
                          borderColor: 'rgb(54, 162, 235)',
                          tension: 0.1,
                          yAxisID: 'humedad'
                      }]
                  },
                  options: {
                      scales: {
                          y: {
                              temperatura: {
                                  type: 'linear',
                                  display: true,
                                  position: 'left',
                              },
                              humedad: {
                                  type: 'linear',
                                  display: true,
                                  position: 'right',
                                  grid: {
                                      drawOnChartArea: false,
                                  },
                              }
                          }
                      }
                  }
              });
          </script>
      </body>
      </html>
    `);
  });
});

app.post('/', (req, res) => {
  const { temperatura, humedad } = req.body;
  const tiempo = new Date().toISOString().slice(0, 19).replace('T', ' ');
  const insertQuery = `INSERT INTO temperaturas (temperatura, humedad, tiempo) VALUES ('${temperatura}', '${humedad}', '${tiempo}')`;
  con.query(insertQuery, (err, result) => {
    if (err) {
      console.error('Error executing insert query: ', err);
      res.status(500).send('Internal Server Error');
      return;
    }
    res.send('Nuevo registro creado exitosamente');
  });
});

app.listen(port, () => {
  console.log(`Server listening at http://localhost:${port}`);
});