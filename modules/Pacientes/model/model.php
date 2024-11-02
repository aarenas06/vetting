<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once $_SERVER['DOCUMENT_ROOT'] . '/vetting/config/includes/conexion.php';

class newMd
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
    public function SearchPropi($CC)

    {
        $sql = "SELECT idTbUsuarios ,UsuNom,UsuCel FROM tbusuarios WHERE UsuCC=$CC";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_NAMED);
        return $row;
    }
    public function InsertMascota($data)
    {
        try {
            $sql = "INSERT INTO tbmascotas (idTbUsuarios, MascoCod, MascoNom, idTbRazas, MascoFechNac, MascoYear, MascoMes, MascoSex, MascoPelaje, 
                        MascoPeso, MascoComidaHab, MascoVivienda, MascoUltCelo, MascoChip, MascoPatologia, MascoAdop, MascoPic, MascoAgresion, MascoEst,IndEmpr) 
                VALUES (:idTbUsuarios, :MascoCod, :MascoNom, :idTbRazas, :MascoFechNac, :MascoYear, :MascoMes, :MascoSex, :MascoPelaje, 
                        :MascoPeso, :MascoComidaHab, :MascoVivienda, :MascoUltCelo, :MascoChip, :MascoPatologia, :MascoAdop, :MascoPic, :MascoAgresion,:MascoEst,:IndEmpr);";
            $stmt = $this->CNX1->prepare($sql);
            // Asignar los valores a los parámetros
            $stmt->bindParam(':idTbUsuarios', $data['UsuCod']);
            $stmt->bindParam(':MascoCod', $data['MascoCod']);
            $stmt->bindParam(':MascoNom', $data['MascoNom']);
            $stmt->bindParam(':idTbRazas', $data['MascoRaza']);
            $stmt->bindParam(':MascoFechNac', $data['MascoFecNaci']);
            $stmt->bindParam(':MascoYear', $data['MascoYear']);
            $stmt->bindParam(':MascoMes', $data['MascoMes']);
            $stmt->bindParam(':MascoSex', $data['MascoSexo']);
            $stmt->bindParam(':MascoPelaje', $data['MascoPelaje']);
            $stmt->bindParam(':MascoPeso', $data['MascoPeso']);
            $stmt->bindParam(':MascoComidaHab', $data['MascoComida']);
            $stmt->bindParam(':MascoVivienda', $data['MascoVivienda']);
            $stmt->bindParam(':MascoUltCelo', $data['MascoCelo']);
            $stmt->bindParam(':MascoChip', $data['MascoChip']);
            $stmt->bindParam(':MascoPatologia', $data['MascoPatologia']);
            $stmt->bindParam(':MascoAdop', $data['MascoAdopcion']);
            $stmt->bindParam(':MascoPic', $data['fotoMasco']);
            $stmt->bindParam(':MascoAgresion', $data['Mascoagresividad']);
            $stmt->bindParam(':MascoEst', $data['Estado']);
            $stmt->bindParam(':IndEmpr', $data['IndEmpr']);
            $stmt->execute();
            $lastInsertId = $this->CNX1->lastInsertId();
            return true; // Retornamos la respuesta de la DB
        } catch (PDOException $e) {
            // Manejar el error
            return "Error al insertar los datos: " . $e->getMessage();
        }
    }
    public function ListPaciente($Emp)

    {
        $sql = "SELECT tb1.idtbMascotas,tb1.MascoNom,tb1.MascoFechNac,tb1.MascoCod,tb1.MascoPeso,tb1.MascoAgresion,tb1.MascoSex,tb1.MascoPatologia,tb2.UsuNom,tb1.idTbUsuarios ,tb2.UsuCel,tb3.RazNom,tb4.EspeNom
        FROM tbmascotas tb1 
        Left JOIN tbusuarios tb2 on tb2.idTbUsuarios=tb1.idTbUsuarios
        Left JOIN tbrazas tb3 on tb3.idTbRazas=tb1.idTbRazas
        Left JOIN tbespecies tb4 on tb4.idTbEspecies=tb3.idTbEspecies
        WHERE tb1.IndEmpr=$Emp";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
    public function HistoricoMd($Emp, $idMasco)

    {
        $sql = "SELECT tb1.idTbHisClinica,tb1.HisFec,tb1.HisObserv,tb1.HisAdj,tb2.CitaObs,tb3.EmpNom,tb4.MascoCod
        FROM tbhisclinica tb1 
        INNER  join tbcitas tb2 on tb2.idTbCitas=tb1.idTbCitas
        INNER join tbempleados tb3 on tb3.idTbEmpleados=tb2.idTbEmAsig
        INNER join tbmascotas tb4 on tb4.idtbMascotas=tb2.idtbMascotas
        WHERE tb3.idTbEmpresas=$Emp AND tb2.idtbMascotas=$idMasco;";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
}
