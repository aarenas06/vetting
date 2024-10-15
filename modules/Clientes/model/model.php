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
    public function InsertPropietarios($data)
    {
        try {
            $sql = "INSERT INTO tbusuarios (idTbRoles, UsuNom, UsuCC, UsuCel, UsuDirec, UsuEmail, UsuUser, UsuCla,indEmpr) 
                VALUES (:Rol, :NomPropietarios, :IdentPropietarios, :TelPropietarios, :DirPropietarios, :EmailPropietarios, :UsuPropietarios, :PassPropietarios,:indEmpr)";
            $stmt = $this->CNX1->prepare($sql);
            // Asignar los valores a los parámetros
            $stmt->bindParam(':Rol', $data['Rol'], PDO::PARAM_INT);
            $stmt->bindParam(':NomPropietarios', $data['NomPropietarios'], PDO::PARAM_STR);
            $stmt->bindParam(':IdentPropietarios', $data['IdentPropietarios'], PDO::PARAM_STR);
            $stmt->bindParam(':TelPropietarios', $data['TelPropietarios'], PDO::PARAM_STR);
            $stmt->bindParam(':DirPropietarios', $data['DirPropietarios'], PDO::PARAM_STR);
            $stmt->bindParam(':EmailPropietarios', $data['EmailPropietarios'], PDO::PARAM_STR);
            $stmt->bindParam(':UsuPropietarios', $data['EmailPropietarios'], PDO::PARAM_STR);
            $stmt->bindParam(':PassPropietarios', $data['IdentPropietarios'], PDO::PARAM_STR);
            $stmt->bindParam(':indEmpr', $data['Emp'], PDO::PARAM_STR);
            $stmt->execute();
            $lastInsertId = $this->CNX1->lastInsertId();
            return true; // Retornamos la respuesta de la DB
        } catch (PDOException $e) {
            // Manejar el error
            error_log("Error al insertar los datos: " . $e->getMessage());
            return false;
        }
    }

    public function GetModulos()
    {
        $sql = "SELECT * FROM tboptservicios WHERE OptEst=1";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }

    public function listPropietarios($Emp)
    {
        $sql = "SELECT * FROM `tbusuarios` where idTbRoles='2' AND indEmpr=$Emp;";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }

    public function GetDataPropietarios($data)
    {
        $sql = "SELECT UsuNom,UsuCC,UsuCel,UsuDirec,UsuEmail,UsuUser,UsuCla FROM tbusuarios where idTbUsuarios='" . $data['idUsuario'] . "' and idTbRoles='" . $data['idRol'] . "'";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }

    public function UpdatePropietarios($data)
    {
        try {
            $sql = "UPDATE tbusuarios SET UsuNom = :UptNomPropietarios, UsuCC = :UptIdentPropietarios, UsuCel = :UptTelPropietarios, UsuDirec = :UptDirPropietarios, UsuEmail = :UptEmailPropietarios, UsuUser = :UptUsuPropietarios, UsuCla = :UptPassPropietarios
                WHERE idTbUsuarios = :UptIdUsuario and idTbRoles=:UpIdtRol";
            $stmt = $this->CNX1->prepare($sql);
            $stmt->bindParam(':UptNomPropietarios', $data['UptNomPropietarios'], PDO::PARAM_STR);
            $stmt->bindParam(':UptIdentPropietarios', $data['UptIdentPropietarios'], PDO::PARAM_STR);
            $stmt->bindParam(':UptTelPropietarios', $data['UptTelPropietarios'], PDO::PARAM_STR);
            $stmt->bindParam(':UptDirPropietarios', $data['UptDirPropietarios'], PDO::PARAM_STR);
            $stmt->bindParam(':UptEmailPropietarios', $data['UptEmailPropietarios'], PDO::PARAM_STR);
            $stmt->bindParam(':UptUsuPropietarios', $data['UptUsuPropietarios'], PDO::PARAM_STR);
            $stmt->bindParam(':UptPassPropietarios', $data['UptPassPropietarios'], PDO::PARAM_STR);
            $stmt->bindParam(':UptIdUsuario', $data['UptIdUsuario'], PDO::PARAM_INT);
            $stmt->bindParam(':UpIdtRol', $data['UpIdtRol'], PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            error_log("Error al actualizar los datos: " . $e->getMessage());
            return false;
        }
    }

    public function DeletePropietarios($data)
    {
        try {
            // Corregimos la sentencia SQL eliminando el uso de "*"
            $sql = "DELETE FROM tbusuarios WHERE idTbUsuarios = :idUsuario";
            $stmt = $this->CNX1->prepare($sql);
            $stmt->bindParam(':idUsuario', $data['idUsuario'], PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            error_log("Error al eliminar los datos: " . $e->getMessage());
            return false;
        }
    }
}
