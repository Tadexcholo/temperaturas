<?php 

require 'config.php';

class BD_PDO
{
    public function getConection ()	
    {
        try 
        {
            $conexion = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME.";",DB_USER,DB_PASS);			       	
        }
        catch(PDOException $e)
        {
            echo "Failed to get DB handle: " . $e->getMessage();
            exit;    
        }
        return $conexion;
    }

    public function Ejecutar_Instruccion($consulta_sql)
    {
        $conexion = $this->getConection();
        $query = $conexion->prepare($consulta_sql);
        if (!$query)
        {
            return "Error al preparar la consulta";
        }
        else
        {			
            $query->execute();   
            return $query; // Devuelve el objeto PDOStatement
        }
    }
}
