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

        $sql = "SELECT tb1.* , tb2.RolNom ,tb2.RolTipo  Tip FROM tbusuarios tb1 
        INNER JOIN tbroles tb2 on tb2.idTbRoles=tb1.idTbRoles
        WHERE tb1.UsuUser='$user' AND tb1.UsuCla='$pass'";

        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_NAMED);
        return $row;
    }
    public function ValidarEmpr($user, $pass, $pack, $PreDict)
    {
        $sql = "SELECT tb1.*,tb3.RolNom ,tb3.RolTipo Tip FROM tbempleados tb1
        INNER JOIN tbempresas tb2 on tb2.idTbEmpresas=tb1.idTbEmpresas
        INNER JOIN tbroles tb3 on tb3.idTbRoles=tb1.idTbRoles
        where tb1.EmpUsu='$user' AND tb1.EmpCla='$pass' AND EmpEst=1 AND tb2.EmpreTok='$pack' AND EmpreNit=$PreDict AND tb2.EmpreEst=1
        Limit 1";
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


    public function ObtFotoPerfil($data)
    {
        $sql = "SELECT u.UsuPic FROM tbusuarios u
            WHERE u.idTbUsuarios = '" . $data['UsuCod'] . "'";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function NotifiCitas($data)
    {
        $sql = "SELECT cita.CitaNom MotiCita, MAX(cita.CitaDate) FechCita, emple.EmpNom Doctor, masco.MascoNom 
            from tbcitas cita
            left join tbempleados emple on emple.idTbEmpleados=cita.idTbEmAsig
            left join tbmascotas masco on masco.idtbMascotas=cita.idtbMascotas  
            where masco.idTbUsuarios='" . $data['UsuCod'] . "'  AND cita.CitaEst=0";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function InsertPropietarios($data)
    {
        try {
            $pass = md5($data['PassPropietarios']);
            $sql = "INSERT INTO tbusuarios (idTbRoles, UsuNom, UsuCC, UsuSex, UsuCel, UsuDirec, UsuEmail, UsuUser, UsuCla) 
                VALUES (:Rol, :NomPropietarios, :IdentPropietarios, :UsuSex, :TelPropietarios, :DirPropietarios, :EmailPropietarios, :UsuPropietarios, :PassPropietarios)";
            $stmt = $this->CNX1->prepare($sql);
            // Asignar los valores a los parámetros
            $stmt->bindParam(':Rol', $data['Rol'], PDO::PARAM_INT);
            $stmt->bindParam(':NomPropietarios', $data['NomPropietarios'], PDO::PARAM_STR);
            $stmt->bindParam(':IdentPropietarios', $data['IdentPropietarios'], PDO::PARAM_STR);
            $stmt->bindParam(':UsuSex', $data['SexPropietarios'], PDO::PARAM_STR);
            $stmt->bindParam(':TelPropietarios', $data['TelPropietarios'], PDO::PARAM_STR);
            $stmt->bindParam(':DirPropietarios', $data['DirPropietarios'], PDO::PARAM_STR);
            $stmt->bindParam(':EmailPropietarios', $data['EmailPropietarios'], PDO::PARAM_STR);
            $stmt->bindParam(':UsuPropietarios', $data['UsuPropietarios'], PDO::PARAM_STR);
            $stmt->bindParam(':PassPropietarios', $pass, PDO::PARAM_STR);
            $stmt->execute();
            $lastInsertId = $this->CNX1->lastInsertId();
            return true; // Retornamos la respuesta de la DB
        } catch (PDOException $e) {
            // Manejar el error
            error_log("Error al insertar los datos: " . $e->getMessage());
            return false;
        }
    }

    public function GetTok($ind)
    {
        $sql = "SELECT EmpreNit nit,EmpreTok tok FROM `tbempresas` where idTbEmpresas=$ind;";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_NAMED);
        return $row;
    }
    public function ListActive()
    {
        $sql = "SELECT empreNom,EmpreTokTel,EmpreNit,EmpreTok FROM `tbempresas` WHERE EmpreEst=1 AND EmpreAct=1; ";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
}
