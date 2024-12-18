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
    public function DataCita($idCita)
    {
        $sql = "SELECT tb1.idTbCitas , tb1.idtbMascotas,tb1.CitaNom ,tb1.CitaDate ,tb1.CitaObs,tb1.CitaDateCre,tb2.MascoNom,tb2.MascoFechNac,tb2.MascoPelaje,tb2.MascoAgresion,
        tb2.MascoPatologia,tb2.MascoComidaHab,tb2.MascoSex,tb2.MascoCod ,tb3.UsuNom,tb3.UsuEmail,tb3.UsuCel,tb3.UsuCC,tb3.UsuDirec,
        tb4.OptNombre,tb6.RazNom,tb7.EspeNom, tb2.MascoPic pic,tb5.EmpNom,(CASE WHEN tb8.idTbHisClinica is null then 's' else 'n' end) AS IND,tb8.idTbHisClinica
        FROM tbcitas tb1
        INNER JOIN  tbmascotas tb2 on tb2.idtbMascotas=tb1.idtbMascotas
        INNER JOIN tbusuarios tb3 on tb3.idTbUsuarios=tb2.idTbUsuarios
        INNER JOIN tboptservicios tb4 on tb4.IdoptServicios=tb1.idTbServicios
        INNER JOIN tbempleados tb5 on tb5.idTbEmpleados=tb1.idTbEmAsig
        INNER JOIN tbrazas tb6 on tb6.idTbRazas=tb2.idTbRazas
        INNER JOIN tbespecies tb7 on tb7.idTbEspecies=tb6.idTbEspecies
        LEFT JOIN tbhisclinica tb8 on tb8.idTbCitas=tb1.idTbCitas
        WHERE tb1.idTbCitas=$idCita;";
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
    public function InsertHisto($data)
    {
        try {
            $columnas = implode(", ", array_keys($data));
            $valores = array_values($data);
            $placeholders = implode(", ", array_fill(0, count($valores), "?"));
            $sql = "INSERT INTO tbhisclinica ($columnas) VALUES ($placeholders)";
            $stmt = $this->CNX1->prepare($sql);
            $stmt->execute($valores);
            $lastInsertId = $this->CNX1->lastInsertId();

            return $lastInsertId;
        } catch (PDOException $e) {
            die("Error al insertar los datos: " . $e->getMessage());
            return false;
        }
    }

    public function Updatecita($idCita)
    {
        $sql = "Update tbcitas set CitaEst=1 where idTbCitas=$idCita";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
    }
    public function Historico($idMasco)
    {
        $sql = "SELECT tb1.idTbHisClinica, tb1.HisFec,tb1.HisObserv,tb3.OptNombre FROM tbhisclinica tb1
        INNER join tbcitas tb2 on tb2.idTbCitas=tb1.idTbCitas
        INNER JOIN tboptservicios tb3 on tb3.IdoptServicios=tb2.idTbServicios
        WHERE tb2.idtbMascotas=$idMasco";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
}
