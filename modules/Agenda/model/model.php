<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('America/Bogota');


require_once $_SERVER['DOCUMENT_ROOT'] . '/vetting/config/includes/conexion.php';

class modelo
{
    public $CNX1;
    public function __construct()
    {
        $conexion = new conexion(); // Crear una instancia de la clase conexion
        $this->CNX1 = $conexion->mysql(); // Llamar al método mysql() de la instancia
    }
    public function GetMasco($MacoCod)
    {
        $sql = "SELECT tb1.idtbMascotas, tb1.MascoNom,tb1.MascoCod,tb1.MascoFechNac,tb1.MascoYear,tb1.MascoMes,tb1.MascoPelaje,tb1.MascoPeso,tb1.MascoAgresion,tb2.RazNom ,tb3.EspeNom,tb4.UsuNom,tb4.UsuCC,tb4.UsuCel,tb4.UsuDirec
        FROM tbmascotas tb1
        INNER JOIN tbrazas tb2 on tb2.idTbRazas=tb1.idTbRazas
        INNER JOIN tbespecies tb3 on tb3.idTbEspecies=tb2.idTbEspecies
        INNER JOIN tbusuarios tb4 ON tb4.idTbUsuarios=tb1.idTbUsuarios
        WHERE  tb1.MascoCod='$MacoCod' AND  tb1.MascoEst=1;";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_NAMED);
        return $row;
    }
    public function GetService($IdEmp)
    {
        $sql = "
        SELECT tb5.IdoptServicios idServi,tb5.OptNombre Servicio
        FROM tbempresas tb1
        INNER  join tbhistorialpago tb2 on tb2.idTbEmpresas=tb1.idTbEmpresas and tb2.HistPagoEst=1
        INNER JOIN tbplanes tb3 on tb3.idTbPlanes=tb2.idTbPlanes
        INNER JOIN tbservicios tb4 on tb4.idTbPlanes=tb3.idTbPlanes
        INNER JOIN tboptservicios tb5 on tb5.IdoptServicios=tb4.idTbServicios
        WHERE tb1.idTbEmpresas='$IdEmp'";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
    public function validateTurnos($Emp, $UsuCod, $Masco, $Service, $Cita, $Citafin)
    {
        $sql = "
        SELECT idTbCitas FROM `tbcitas` 
        where id_EmpCrea='$Emp' AND idTbEmAsig='$UsuCod' AND idtbMascotas='$Masco'AND idTbServicios='$Service'
        AND (CitaDate  BETWEEN '$Cita' AND '$Citafin' OR  CitaDateFin  BETWEEN '$Cita' AND '$Citafin')";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_NAMED);
        return $row;
    }
    public function InsertAgen($data)
    {
        try {
            $columnas = implode(", ", array_keys($data));
            $valores = array_values($data);
            $placeholders = implode(", ", array_fill(0, count($valores), "?"));
            $sql = "INSERT INTO tbcitas ($columnas) VALUES ($placeholders)";
            $stmt = $this->CNX1->prepare($sql);
            $stmt->execute($valores);
            $lastInsertId = $this->CNX1->lastInsertId();

            return $lastInsertId;
        } catch (PDOException $e) {
            die("Error al insertar los datos: " . $e->getMessage());
            return false;
        }
    }
    public function citasHoy($Emp, $usu, $view)
    {
        $fechaActual = date('Y-m-d');

        $sql = "SELECT tb1.idTbCitas ,tb1.idTbEmAsig,tb1.CitaDate,(Case when tb1.CitaEst=0 then 'Pendiente' ELSE 'Finalizada' END) EstDes ,tb1.CitaEst ,tb2.EmpNom doc ,tb3.MascoNom,tb3.MascoFechNac ,tb4.UsuNom ,tb5.OptNombre
        FROM `tbcitas`  tb1
        Inner JOIN tbempleados tb2 on tb2.idTbEmpleados=tb1.idTbEmAsig
        INNER JOIN tbmascotas tb3 on tb3.idtbMascotas=tb1.idtbMascotas
        INNER JOIN tbusuarios tb4 on tb4.idTbUsuarios=tb3.idTbUsuarios
        INNER JOIN tboptservicios tb5 on tb5.IdoptServicios=tb1.idTbServicios
        where tb1.CitaDate like '%$fechaActual%' AND tb1.id_EmpCrea=$Emp";
        if ($view == 2) {
            $sql .= " AND tb1.idTbEmAsig =$usu";
        }
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
    public function PintarCalen($Emp, $usu, $view)
    {
        $fechaActual = date('Y-m-d');

        $sql = "SELECT tb1.idTbCitas 'id', tb2.OptNombre 'title' ,tb1.CitaDate 'start',tb1.CitaDateFin 'end' ,false 'allDay'  
        FROM `tbcitas` tb1
        INNER JOIN tboptservicios tb2 on tb2.IdoptServicios=tb1.idTbServicios
        WHERE id_EmpCrea=$Emp";
        if ($view == 2) {
            $sql .= " AND idTbEmAsig =$usu";
        }
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
    public function ListEmpl($Emp)
    {
        $fechaActual = date('Y-m-d');

        $sql = "SELECT tb1.idTbEmpleados ,tb1.EmpNom from tbempleados tb1 where tb1.idTbEmpresas=$Emp AND tb1.idTbRoles IN (4,5,6,10,11);";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
}
