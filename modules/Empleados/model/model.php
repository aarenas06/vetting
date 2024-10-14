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

    public function GetRol()
    {
        $sql = "SELECT * FROM `tbroles` WHERE RolTipo=1 AND idTbRoles !=1;";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
    public function GetEmp($emp)
    {
        $sql = "SELECT EmpreNom Nom FROM `tbempresas` WHere idTbEmpresas = $emp";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_NAMED);
        return $row;
    }
    public function validaUser($user, $emp)
    {
        // Preparar la consulta SQL
        $sql = "SELECT EmpUsu FROM `tbempleados` WHERE idTbEmpresas = :emp AND EmpUsu = :user;";
        $stmt = $this->CNX1->prepare($sql);

        $stmt->bindParam(':emp', $emp, PDO::PARAM_INT);
        $stmt->bindParam(':user', $user, PDO::PARAM_STR);

        $stmt->execute();

        $rowCount = $stmt->rowCount();

        return $rowCount > 0 ? 2 : 1;
    }

    public function InsertEmp($data)
    {
        try {
            $columnas = implode(", ", array_keys($data));
            $valores = array_values($data);
            $placeholders = implode(", ", array_fill(0, count($valores), "?"));
            $sql = "INSERT INTO tbempleados ($columnas) VALUES ($placeholders)";
            $stmt = $this->CNX1->prepare($sql);
            $stmt->execute($valores);
            $lastInsertId = $this->CNX1->lastInsertId();

            return $lastInsertId;
        } catch (PDOException $e) {
            die("Error al insertar los datos: " . $e->getMessage());
            return false;
        }
    }

    public function ChangeEstEmp($idEmp, $new)
    {
        $sql = "update tbempresas set EmpreEst='$new' where idTbEmpresas =$idEmp";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
    }
    public function ListEmp($emp)
    {
        $sql = "SELECT tb1.idTbEmpleados,tb1.EmpNom Nom ,tb1.EmpNit, tb1.EmpUsu UsuCod ,(CASE when tb1.EmpEst=1 Then 'Activo' else 'Innactivo' END) estDes, tb1.EmpEst,tb1.EmpCel ,tb1.EmpEmail, tb1.EmpFechCrea,tb2.RolNom,tb3.EmpUsu UsuCrea
        FROM tbempleados tb1
        INNER JOIN tbroles tb2 on tb2.idTbRoles=tb1.idTbRoles
        INNER JOIN tbempleados tb3 on tb3.idTbEmpleados=tb1.EmplUsuCrea
        where tb1.idTbEmpresas=$emp;";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
    public function ChangeEstEmpl($idEmp, $new)
    {
        $sql = "update tbempleados set EmpEst='$new' where idTbEmpleados  =$idEmp";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
    }
}
