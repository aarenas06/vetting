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
    public function InsertPlan($data)
    {
        try {
            $columnas = implode(", ", array_keys($data));
            $valores = array_values($data);
            $placeholders = implode(", ", array_fill(0, count($valores), "?"));
            $sql = "INSERT INTO tbplanes ($columnas) VALUES ($placeholders)";
            $stmt = $this->CNX1->prepare($sql);
            $stmt->execute($valores);
            $lastInsertId = $this->CNX1->lastInsertId();

            return $lastInsertId;
        } catch (PDOException $e) {
            die("Error al insertar los datos: " . $e->getMessage());
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
    public function InsertPlanServices($data)
    {
        try {
            $columnas = implode(", ", array_keys($data));
            $valores = array_values($data);
            $placeholders = implode(", ", array_fill(0, count($valores), "?"));
            $sql = "INSERT INTO tbservicios ($columnas) VALUES ($placeholders)";
            $stmt = $this->CNX1->prepare($sql);
            $stmt->execute($valores);
            return 1;
        } catch (PDOException $e) {
            die("Error al insertar los datos: " . $e->getMessage());
            return false;
        }
    }
    public function listPlanes()
    {
        $sql = "SELECT tb1.* ,COUNT(tb2.idTbServicios) C
        FROM tbplanes  tb1 
        LEFT JOIN tbservicios tb2 on tb2.idTbPlanes=tb1.idTbPlanes
        GROUP BY idTbPlanes;";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
    public function tbdetalle($idPlan)
    {
        $sql = "SELECT tb2.*  ,tb1.ServiciosEst Est,tb1.idTbPlanes idPlan
        FROM  tbservicios tb1
        inner JOIN  tboptservicios tb2 on tb2.IdoptServicios=tb1.idTbServicios
        WHERE tb1.idTbPlanes=$idPlan";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
    public function ChangeEst($idPlan, $idServicio, $new)
    {
        $sql = "UPDATE tbservicios SET ServiciosEst=$new WHERE  idTbServicios=$idServicio AND idTbPlanes=$idPlan";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
    }
    public function ChangeEstPlan($idPlan, $new)
    {
        $sql = "UPDATE tbplanes SET PlanEst=$new WHERE  idTbPlanes=$idPlan";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
    }
    public function ListData($idPlan)
    {
        $sql = "SELECT * FROM tbplanes where idTbPlanes =$idPlan";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_NAMED);
        return $row;
    }
    public function UpdatePlan($idPlan, $PlanNom, $PlanVigenciaDia, $PlanCosto, $PlanVigenciaMes)
    {
        $sql = "UPDATE tbplanes SET PlanNom='$PlanNom',PlanVigenciaDia=$PlanVigenciaDia,PlanCosto=$PlanCosto, PlanVigenciaMes=$PlanVigenciaMes WHERE  idTbPlanes=$idPlan";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
    }
}
