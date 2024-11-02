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
    public function ObtDataPerfil($data)
    {
        $sql = "SELECT r.idTbRoles, r.RolNom, u.* FROM tbusuarios u
            LEFT JOIN tbroles r ON r.idTbRoles = u.idTbRoles 
            WHERE u.UsuUser = '" . $data['User'] . "' AND u.idTbUsuarios = '" . $data['UsuCod'] . "'";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function UpdateDataPerfil($data)
    {
        $sql = "UPDATE tbusuarios SET UsuNom = :Nombre, UsuCC = :Identificacion, 
                UsuDirec = :Direccion,UsuCel = :Celular,UsuCla = :Contrasena, UsuPic=:UsuPic
            WHERE idTbUsuarios = :UsuCod AND UsuUser = :User";
        $stmt = $this->CNX1->prepare($sql);
        $stmt->bindParam(':Nombre', $data['Nombre']);
        $stmt->bindParam(':Identificacion', $data['Identificacion']);
        $stmt->bindParam(':Direccion', $data['Direccion']);
        $stmt->bindParam(':Celular', $data['Celular']);
        $stmt->bindParam(':Contrasena', $data['Contrasena']);
        $stmt->bindParam(':UsuCod', $data['UsuCod']);
        $stmt->bindParam(':User', $data['User']);
        $stmt->bindParam(':UsuPic', $data['fotoPerfil']);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function ObtMascoPerfil($data)
    {
        $sql = "SELECT idtbMascotas, MascoNom, concat(MascoYear, ' Años - ', MascoMes, ' Meses') Edad, MascoPic FROM tbmascotas 
            where idTbUsuarios='" . $data['UsuCod'] . "'";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function GetModulos()
    {
        $sql = "SELECT * FROM tboptservicios WHERE OptEst=1";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
}
