<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class conexion
{

    private $host = '15.235.119.22';
    private $usuario = 'mercadou_Developer0610';
    private $contrasena = '#FXLCKlV2Rgf';
    private $nombreBaseDatos = 'mercadou_vetconnect';


    public function mysql()
    {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->nombreBaseDatos};charset=utf8mb4";
            $opciones = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            $conexion = new PDO($dsn, $this->usuario, $this->contrasena, $opciones);
            return $conexion;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}

$conexion = new conexion();
