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
    public function ListCitasEjec($EMP, $fechIni, $fechFin)
    {
        $sql = "SELECT DATE_FORMAT(tb1.HisFec, '%b') AS Mes,COUNT(tb1.idTbHisClinica) C
        from tbhisclinica tb1 
        INNER JOIN tbempleados tb2 on tb2.idTbEmpleados=tb1.idTbEmpleados
        WHERE tb2.idTbEmpresas=$EMP AND  tb1.HisFec BETWEEN '$fechIni' AND '$fechFin'
        GROUP by DATE_FORMAT(tb1.HisFec, '%b')
        ORDER BY Mes DESC;";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
    public function ListCitasPro($EMP, $fechIni, $fechFin)
    {
        $sql = "SELECT  DATE_FORMAT(tb1.CitaDate, '%b') AS Mes, COUNT(tb1.idTbCitas) C
        FROM tbcitas tb1
        WHERE id_EmpCrea=$EMP AND  tb1.CitaEst in (0,1) AND tb1.CitaDate BETWEEN '$fechIni'AND '$fechFin'  
        group by DATE_FORMAT(tb1.CitaDate, '%b');";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
    public function ListCitasRe($EMP, $fechIni, $fechFin)
    {
        $sql = "SELECT  DATE_FORMAT(tb1.CitaDate, '%b') AS Mes, COUNT(tb1.idTbCitas) C
        FROM tbcitas tb1
        WHERE id_EmpCrea=$EMP AND  tb1.CitaEst=2 AND tb1.CitaDate BETWEEN '$fechIni'AND '$fechFin'  
        group by DATE_FORMAT(tb1.CitaDate, '%b');";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
    // grafica 2
    public function ListEmpReg($EMP, $fechIni, $fechFin)
    {
        $sql = "SELECT DATE_FORMAT(tb1.CitaDate, '%b') AS Mes ,tb2.EmpUsu,COUNT(tb1.idTbCitas)C
        FROM tbcitas tb1
        INNER JOIN tbempleados tb2 on tb2.idTbEmpleados=tb1.idTbEmAsig
        WHERE id_EmpCrea=$EMP AND  tb1.CitaEst in (0,1) AND tb1.CitaDate BETWEEN '$fechIni' AND '$fechFin'
        group by DATE_FORMAT(tb1.CitaDate, '%b'),tb2.EmpUsu;";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
    public function ListEmpEje($EMP, $fechIni, $fechFin)
    {
        $sql = "SELECT DATE_FORMAT(tb1.HisFec, '%b') AS Mes ,tb2.EmpUsu, COUNT(tb1.idTbHisClinica)C
        FROM tbhisclinica tb1
        INNER JOIN tbempleados tb2 on tb2.idTbEmpleados=tb1.idTbEmpleados
        WHERE tb2.idTbEmpresas=$EMP AND  tb1.HisFec BETWEEN '$fechIni' AND '$fechFin'
        GROUP by DATE_FORMAT(tb1.HisFec, '%b') ,tb2.EmpUsu;";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }

    // grafica 3
    public function tablaTotal($EMP, $fechIni, $fechFin)
    {
        $sql = "
        SELECT 'Usuarios' AS 'colum', COUNT(idTbUsuarios)C FROM `tbusuarios`WHERE indEmpr=$EMP  AND UsuFechCrea BETWEEN '$fechIni' AND '$fechFin'
        UNION ALL
        SELECT 'Macotas' As 'Colum' , COUNT(idtbMascotas)C FROM `tbmascotas` WHERE indEmpr=$EMP  AND MascoFechCrea BETWEEN '$fechIni' AND '$fechFin'
        UNION ALL
        SELECT 'Empleados' AS  'Colum' ,COUNT(idTbEmpleados)c FROM `tbempleados` WHERE idTbEmpresas=$EMP AND EmpFechCrea BETWEEN '$fechIni' AND '$fechFin' ;";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
    // grafica 4
    public function Grafico4($EMP, $fechIni, $fechFin)
    {
        $sql = "
        SELECT tb2.OptNombre 'Servicio', COUNT(tb1.idTbCitas ) C
        FROM tbcitas tb1
        inner JOIN tboptservicios tb2 on tb2.IdoptServicios=tb1.idTbServicios
        WHERE tb1.id_EmpCrea=$EMP  #AND tb1.CitaDateCre BETWEEN '$fechIni' AND '$fechFin'
        GROUP BY tb2.OptNombre;";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
}
