<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once $_SERVER['DOCUMENT_ROOT'] . '/vetting/config/includes/conexion.php';

class modelo
{
    public $CNX1;
    public function __construct()
    {
        $conexion = new conexion(); // Crear una instancia de la clase conexion
        $this->CNX1 = $conexion->mysql(); // Llamar al método mysql() de la instancia
    }

    //FUNCION PARA INSERTAR LOS CLIENTES NUEVO
    // public function InsertPropietarios($data)
    // {
    //     try {
    //         $sql = "INSERT INTO tbusuarios (idTbRoles, UsuNom, UsuCC, UsuCel, UsuDirec, UsuEmail, UsuUser, UsuCla) 
    //             VALUES (:Rol, :NomPropietarios, :IdentPropietarios, :TelPropietarios, :DirPropietarios, :EmailPropietarios, :UsuPropietarios, :PassPropietarios)";
    //         $stmt = $this->CNX1->prepare($sql);
    //         // Asignar los valores a los parámetros
    //         $stmt->bindParam(':Rol', $data['Rol'], PDO::PARAM_INT);
    //         $stmt->bindParam(':NomPropietarios', $data['NomPropietarios'], PDO::PARAM_STR);
    //         $stmt->bindParam(':IdentPropietarios', $data['IdentPropietarios'], PDO::PARAM_STR);
    //         $stmt->bindParam(':TelPropietarios', $data['TelPropietarios'], PDO::PARAM_STR);
    //         $stmt->bindParam(':DirPropietarios', $data['DirPropietarios'], PDO::PARAM_STR);
    //         $stmt->bindParam(':EmailPropietarios', $data['EmailPropietarios'], PDO::PARAM_STR);
    //         $stmt->bindParam(':UsuPropietarios', $data['UsuPropietarios'], PDO::PARAM_STR);
    //         $stmt->bindParam(':PassPropietarios', $data['PassPropietarios'], PDO::PARAM_STR);
    //         $stmt->execute();
    //         $lastInsertId = $this->CNX1->lastInsertId();
    //         return true; // Retornamos la respuesta de la DB
    //     } catch (PDOException $e) {
    //         // Manejar el error
    //         error_log("Error al insertar los datos: " . $e->getMessage());
    //         return false;
    //     }
    // }
}
