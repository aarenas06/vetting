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
    public function Validar($user, $pass)
    {

        $sql = "SELECT tb1.* , tb2.RolNom FROM tbusuarios tb1 
        INNER JOIN tbroles tb2 on tb2.idTbRoles=tb1.idTbRoles
        WHERE tb1.UsuUser='$user' AND tb1.UsuCla='$pass'";

        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_NAMED);
        return $row;
    }

    public function ValidaExitencia($idPropietario)
    {
        $sql = "SELECT idTbUsuarios, UsuCC FROM tbusuarios WHERE UsuCC = :idPropietario";
        $stmt = $this->CNX1->prepare($sql);
        $stmt->bindParam(':idPropietario', $idPropietario, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return false; // Si existe el propietario, retorna false
        }
        return true; // Si no existe, retorna true
    }

    public function InsertPropietarios($data)
    {
        try {
            $sql = "INSERT INTO tbusuarios (idTbRoles, UsuNom, UsuCC, UsuCel, UsuDirec, UsuEmail, UsuUser, UsuCla) 
                VALUES (:Rol, :NomPropietarios, :IdentPropietarios, :TelPropietarios, :DirPropietarios, :EmailPropietarios, :UsuPropietarios, :PassPropietarios)";
            $stmt = $this->CNX1->prepare($sql);
            // Asignar los valores a los parámetros
            $stmt->bindParam(':Rol', $data['Rol'], PDO::PARAM_INT);
            $stmt->bindParam(':NomPropietarios', $data['NomPropietarios'], PDO::PARAM_STR);
            $stmt->bindParam(':IdentPropietarios', $data['IdentPropietarios'], PDO::PARAM_STR);
            $stmt->bindParam(':TelPropietarios', $data['TelPropietarios'], PDO::PARAM_STR);
            $stmt->bindParam(':DirPropietarios', $data['DirPropietarios'], PDO::PARAM_STR);
            $stmt->bindParam(':EmailPropietarios', $data['EmailPropietarios'], PDO::PARAM_STR);
            $stmt->bindParam(':UsuPropietarios', $data['UsuPropietarios'], PDO::PARAM_STR);
            $stmt->bindParam(':PassPropietarios', $data['PassPropietarios'], PDO::PARAM_STR);
            $stmt->execute();
            $lastInsertId = $this->CNX1->lastInsertId();
            return true; // Retornamos la respuesta de la DB
        } catch (PDOException $e) {
            // Manejar el error
            error_log("Error al insertar los datos: " . $e->getMessage());
            return false;
        }
    }
    
}
