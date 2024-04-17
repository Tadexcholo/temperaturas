<?php
class UbicacionesModel
{
    private $conexion;
    private $clavePrivada;

    public function __construct()
    {
        // Establece la conexión a la base de datos
        $this->conexion = new mysqli('localhost', 'root', '', 'arduino');
        if ($this->conexion->connect_error) {
            die('Error de conexión a la base de datos: ' . $this->conexion->connect_error);
        }

        $this->clavePrivada = "-----BEGIN RSA PRIVATE KEY-----
MIICWwIBAAKBgHinNEk0hXs9yDMPcbg2slbCM+iH0Rh+V6RTLnpSq+lflt1Py57u
2Wcq07gAE5Rp7qkZJUHae99alB7aEdu3CcMjqDiYag8h1te6c5M2DkQLoPcJP0H/
vWKPpgCGkqIlHhGMgOhFp5Oo6viMTjPhO+6cIRnWM8o4X0Rf/B/J5wwJAgMBAAEC
gYAXU8ShLr1sEYrmjGLhSfn7GjstBy1fPfY1+DsxPVCto2Soz2fAB9ASyU378k/W
zxBss0bnz5VJntqqiGERiPci9QLxwhNz/CkGE9AHKL2JIITVCDRTEDafrGQolpiv
pw+e62I5FeqYYk03PcIglTzpwrLzmO+efy+QxOXja52IvQJBANkg541ydbDBW4zS
Ej/Qnmiylz/0VOkMQLBY2mEe9Oqu/iMz1Vdznn5QVXdsSsixH/Vj5pk1tRNBCrB5
BjPk7hsCQQCOQMpYTWckfemqOXSpnVquEG0j4ORj5XEXIJm3Rqhx8qmQg26xRnpz
pfCp+koWBuXaWEwcdddD6DjT4rJvtACrAkEAlbli8t7i2Sf8gXa6rtak5X2BXtCV
XL7ePLyImkBGky5ogM3VZ6CKwn+S7+71Ar9hUk25Th0C6GwJevd5l39d0QJAFgFb
y9EddX2s2dJNg7d9wZN07qnparKhjexTGxDpGcdqB5rtUqsOYjl3QzQepc2nXOFv
1K89/5k6wTw+Uh1MRQJAVHtvJ7s4wiuEsjodrWY4JdkoIRR/NaMRjNFMKJaf5wLr
EoJuCfHgB68zSLMvsO/JRQxCDUdAJQbzFgo+N4PA6Q==
-----END RSA PRIVATE KEY-----";
    }

    // Función para desencriptar un texto cifrado con clave privada RSA
    public function desencriptarTexto($textoCifrado)
    {
        $res = openssl_get_privatekey($this->clavePrivada);

        openssl_private_decrypt(base64_decode($textoCifrado), $desencriptado, $res);

        return $desencriptado;
    }


    
public function CorreoYaRegistrado($email)
{
    // Desencriptar el correo electrónico proporcionado
    $correoDesencriptado = $this->desencriptarTexto($email);

    // Consultar la base de datos con el correo electrónico desencriptado
    $sql = "SELECT * FROM usuarios";
    $result = $this->conexion->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Desencriptar cada correo electrónico cifrado en la base de datos
            $correoBaseDatos = $this->desencriptarTexto($row['email']);

            // Comparar con el correo electrónico proporcionado
            if ($correoBaseDatos == $correoDesencriptado) {
                return true; // Correo ya registrado
            }
        }

        // Si el bucle se completa y no se encuentra el correo, entonces no está registrado
        return false;
    }

    // Manejar el caso de error en la consulta
    return false;
}

public function InicioSesion($email, $password)
{
    // Desencriptar el correo electrónico proporcionado
    $correoDesencriptado = $this->desencriptarTexto($email);
    $passwordDesencriptado = $this->desencriptarTexto($password);
    // Consultar la base de datos con el correo electrónico desencriptado
    $sql = "SELECT * FROM usuarios";
    $result = $this->conexion->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Desencriptar cada correo electrónico cifrado en la base de datos
            $correoBaseDatos = $this->desencriptarTexto($row['email']);
            $passwordBaseDatos = $this->desencriptarTexto($row['password']);

            // Comparar con el correo electrónico proporcionado
            if (($correoBaseDatos == $correoDesencriptado) && ($passwordDesencriptado == $passwordBaseDatos)) {
                $_SESSION['Correo'] = $correoDesencriptado;
                $_SESSION['Password'] = $passwordDesencriptado;
                $_SESSION['ID'] = $row['id'];   
                return true; // Correo ya registrado
            }
        }
        // Si el bucle se completa y no se encuentra el correo, entonces no está registrado
        return false;
    }
    // Manejar el caso de error en la consulta
    return false;
}




    public function RegistrarUsuario1($email, $password)
    {
        $sql = "INSERT INTO usuarios (email, password) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($sql);

        if ($stmt) {
            $stmt->bind_param('ss', $email, $password);

            if ($stmt->execute()) {
                return true; // Registro exitoso
            } else {
                return false; // Error en la ejecución
            }
        } else {
            return false; // Error en la preparación de la consulta
        }
    }

    


    public function TablaBLE()
    {
    // Consulta SQL para obtener todas los dispositivos
    $sql = "SELECT * FROM dispositivos";
    $result = $this->conexion->query($sql);

    $tabla = " ";
    $tabla.='<table class="table table-striped table-bordered table-hover" id="table">';
    $tabla.='<thead>';
    $tabla.='<tr class="table-dark">';
    $tabla.='<th>id</th>';
    $tabla.='<th>Nombre</th>';
    $tabla.='<th>MAC</th>';
    $tabla.='<th>RSSI</th>';
    $tabla.='<th>X</th>';
    $tabla.='<th>Y</th>';
    $tabla.='</tr>';
    $tabla.='</thead>';
    $tabla.='<tbody id="tbody">';
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tabla .= '<tr>';
            $tabla .= '<td>' . $row['id'] . '</td>';
            $tabla .= '<td>' . $row['dispositivo'] . '</td>';
            $tabla .= '<td>' . $row['mac'] . '</td>';
            $tabla .= '<td>' . $row['rssi'] . '</td>';
            $tabla .= '<td>' . $row['x'] . '</td>';
            $tabla .= '<td>' . $row['y'] . '</td>';
            $tabla .= '</tr>';
        }
    }
    $tabla.='</tbody>';
    $tabla.='</table>';

    return $tabla;
}

public function TablaUsuarios()
    {
    // Consulta SQL para obtener todas l0s usuarios
    $sql = "SELECT * FROM usuarios";
    $result = $this->conexion->query($sql);

    $tabla = "";
    $tabla.='<table class="table table-striped table-bordered table-hover" id="mydatatable">';
    $tabla.='<thead>';
    $tabla.='<tr class="table-primary">';
    $tabla.='<th>id</th>';
    $tabla.='<th>Correo</th>';
    $tabla.='<th>Contraseña</th>';
    $tabla.='</tr>';
    $tabla.='</thead>';
    $tabla.='<tbody class="table-group-divider">';
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $correo = $this->desencriptarTexto($row['email']);
            $contra = $this->desencriptarTexto($row['password']);
            $tabla .= '<tr>';
            $tabla .= '<td>' . $row['id'] . '</td>';
            $tabla .= '<td>' . $correo . '</td>';
            $tabla .= '<td>' . $contra . '</td>';
            $tabla .= '</tr>';
        }
    }
    $tabla.= '</tbody>';
    $tabla.='</table>';

    return $tabla;
}

public function cerrarSesion()
{
    session_unset();
    session_destroy();
}


    public function __destruct()
    {
        // Cierra la conexión a la base de datos al destruir el objeto
        $this->conexion->close();
    }
}
?>