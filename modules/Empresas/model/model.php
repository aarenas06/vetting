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
    public function InsertEmp($data)
    {
        try {
            $columnas = implode(", ", array_keys($data));
            $valores = array_values($data);
            $placeholders = implode(", ", array_fill(0, count($valores), "?"));
            $sql = "INSERT INTO tbempresas ($columnas) VALUES ($placeholders)";
            $stmt = $this->CNX1->prepare($sql);
            $stmt->execute($valores);
            $lastInsertId = $this->CNX1->lastInsertId();

            return $lastInsertId;
        } catch (PDOException $e) {
            die("Error al insertar los datos: " . $e->getMessage());
            return false;
        }
    }
    public function GetPlanes()
    {
        $sql = "SELECT * FROM tbplanes WHERE planEst=1";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
    public function listEmpresa()
    {
        $sql = "SELECT tb1.*, tb2.HistPagoFec,tb3.PlanNom, CONCAT(tb3.PlanVigenciaMes,' Meses ' ,tb3.PlanVigenciaDia, ' Dias ') Vigencia ,     DATE_ADD(DATE_ADD(tb2.HistPagoFec, INTERVAL tb3.PlanVigenciaMes MONTH), INTERVAL tb3.PlanVigenciaDia DAY) AS FechaTerminacion
        FROM tbempresas tb1
        LEFT JOIN tbhistorialpago tb2 on tb2.idTbEmpresas=tb1.idTbEmpresas And tb2.HistPagoEst=1
        LEFT JOIN tbplanes tb3 on tb3.idTbPlanes=tb2.idTbPlanes;";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
    public function InsertHistoPago($data)
    {
        try {
            $columnas = implode(", ", array_keys($data));
            $valores = array_values($data);
            $placeholders = implode(", ", array_fill(0, count($valores), "?"));
            $sql = "INSERT INTO tbhistorialpago ($columnas) VALUES ($placeholders)";
            $stmt = $this->CNX1->prepare($sql);
            $stmt->execute($valores);
            $lastInsertId = $this->CNX1->lastInsertId();

            return $lastInsertId;
        } catch (PDOException $e) {
            die("Error al insertar los datos: " . $e->getMessage());
            return false;
        }
    }
    public function InsertUserAdmin($data)
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
    public function desactivaContr($idEmp)
    {
        $sql = "UPDATE tbhistorialpago SET HistPagoEst='2' where idTbEmpresas =$idEmp AND HistPagoEst='1'";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
    }
    public function ChangeEstEmp($idEmp, $new)
    {
        $sql = "update tbempresas set EmpreEst='$new' where idTbEmpresas =$idEmp";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
    }
    public function updateContrato($Contr, $idEmp)
    {
        $sql = "UPDATE tbempresas SET EmpreContr='$Contr' where idTbEmpresas =$idEmp";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
    }
}
