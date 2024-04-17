var express = require('express');
var mysql = require('mysql');
var cors = require('cors');
var app = express();
app.use(express.json());

// Configurar cabeceras y cors
app.use((req, res, next) => {
    res.header('Access-Control-Allow-Origin', '*');
    res.header('Access-Control-Allow-Headers', 'Authorization, X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Allow-Request-Method');
    res.header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE');
    res.header('Allow', 'GET, POST, OPTIONS, PUT, DELETE');
    next();
});

app.use(express.json());
app.use(cors());

//Establecemos los prámetros de conexión
var conexion = mysql.createConnection({
    host:'localhost',
    user:'root',
    password:'',
    database:'arduino'
});

//Conexión a la database
conexion.connect(function(error){
    if(error){
        throw error;
    }else{
        console.log("¡Conexión exitosa a la base de datos!");
    }
});

// Ruta predifinida
app.get('/', function(req,res){
    res.send('Ruta INICIO');
});

//Mostrar todos los datos de los dispositivos
app.get('/api/dispositivos', (req, res)=>{
    conexion.query('SELECT * FROM dispositivos', (error,filas)=>{
        if(error){
            throw error;
        }else{
            res.send(filas);
        }
    })
});

app.get('/api/usuarios', (req, res)=>{
    conexion.query('SELECT * FROM usuarios', (error,filas)=>{
        if(error){
            throw error;
        }else{
            res.send(filas);
        }
    })
});

app.get('/api/temeperatura', (req, res)=>{
    conexion.query('SELECT temperatura, fecha FROM ( SELECT temperatura, fecha FROM `entorno` ORDER BY fecha DESC LIMIT 5 ) AS ultimos_cinco ORDER BY fecha ASC', (error, filas)=>{
        if(error){
            throw error;
        }else{
            res.send(filas);
        }
    })
});

app.get('/api/humedad', (req, res)=>{
    conexion.query('SELECT humedad, fecha FROM ( SELECT humedad, fecha FROM `entorno` ORDER BY fecha DESC LIMIT 5 ) AS ultimos_cinco ORDER BY fecha ASC', (error, filas)=>{
        if(error){
            throw error;
        }else{
            res.send(filas);
        }
    })
});

// Inserta un nuevo registro de temperatura y humedad
app.post('/api/add/usuario', (req, res)=>{
    let data = {email:req.body.email, password:req.body.password};
    let sql = "INSERT INTO usuarios SET ?";
    conexion.query(sql, data, function(error, results){
        if(error){
            throw error;
        }else{
            res.send(results);
        }
    });
});

app.put('/api/edit/rssi/:id', (req, res)=>{
    let id = req.params.id;
    let rssi = req.body.id_producto;
    let sql = "UPDATE dispositivos SET rssi = ? WHERE id= ?";
    conexion.query(sql, [rssi, id], function(error, results){
        if(error){
            throw error;
        }else{
            res.send(results);
        }
    });
});

const puerto = process.env.PUERTO || 3000;
app.listen(puerto, function(){
    console.log("Servidor Ok en puerto:"+puerto);
});