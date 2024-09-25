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

    public function selectEspecie()
    {
        $sql = "SELECT * FROM tbespecies";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }

    //FUNCION PARA VALIDAR SI EL CODE DEL CHIP EXISTE
    public function checkIfCodeExists($code)
    {
        $sql = "SELECT * FROM `tbmascotas` WHERE MascoChip='" . $code . "'";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }

    public function listMascotas()
    {
        $sql = "SELECT MascoCod Cod, MascoChip Chip, MascoNom Nombre, MascoRaza Raza, MascoFechNac FechNaci,CONCAT(MascoYear, ' Años ', MascoMes, ' Meses') EdadMascota, 
        MascoSex Sexo, MascoPeso Peso, MascoPatologia Patologia, MascoAgresion Agresion FROM tbmascotas";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }

    public function InsertMascota($data)
    {
        try {
            $sql = "INSERT INTO tbmascotas (idTbUsuarios, idTbEspecies, MascoCod, MascoNom, MascoRaza, MascoFechNac, MascoYear, MascoMes, MascoSex, MascoPelaje, 
                        MascoPeso, MascoComidaHab, MascoVivienda, MascoUltCelo, MascoChip, MascoPatologia, MascoAdop, MascoPic, MascoAgresion) 
                VALUES (:idTbUsuarios, :idTbEspecies, :MascoCod, :MascoNom, :MascoRaza, :MascoFechNac, :MascoYear, :MascoMes, :MascoSex, :MascoPelaje, 
                        :MascoPeso, :MascoComidaHab, :MascoVivienda, :MascoUltCelo, :MascoChip, :MascoPatologia, :MascoAdop, :MascoPic, :MascoAgresion);";
            $stmt = $this->CNX1->prepare($sql);
            // Asignar los valores a los parámetros
            $stmt->bindParam(':idTbUsuarios', $data['UsuCod']);
            $stmt->bindParam(':idTbEspecies', $data['MascoEspecie']);
            $stmt->bindParam(':MascoCod', $data['MascoChip']);
            $stmt->bindParam(':MascoNom', $data['MascoNom']);
            $stmt->bindParam(':MascoRaza', $data['MascoRaza']);
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
            $stmt->execute();
            $lastInsertId = $this->CNX1->lastInsertId();
            return true; // Retornamos la respuesta de la DB
        } catch (PDOException $e) {
            // Manejar el error
            error_log("Error al insertar los datos: " . $e->getMessage());
            return false;
        }
    }

    // public function InsertPlanServices($data)
    // {
    //     try {
    //         $columnas = implode(", ", array_keys($data));
    //         $valores = array_values($data);
    //         $placeholders = implode(", ", array_fill(0, count($valores), "?"));
    //         $sql = "INSERT INTO tbservicios ($columnas) VALUES ($placeholders)";
    //         $stmt = $this->CNX1->prepare($sql);
    //         $stmt->execute($valores);
    //         return 1;
    //     } catch (PDOException $e) {
    //         die("Error al insertar los datos: " . $e->getMessage());
    //         return false;
    //     }
    // }

    // public function tbdetalle($idPlan)
    // {
    //     $sql = "SELECT tb2.*  ,tb1.ServiciosEst Est,tb1.idTbPlanes idPlan
    //     FROM  tbservicios tb1
    //     inner JOIN  tboptservicios tb2 on tb2.IdoptServicios=tb1.idTbServicios
    //     WHERE tb1.idTbPlanes=$idPlan";
    //     $sql = $this->CNX1->prepare($sql);
    //     $sql->execute();
    //     $row = $sql->fetchAll(PDO::FETCH_NAMED);
    //     return $row;
    // }
    // public function ChangeEst($idPlan, $idServicio, $new)
    // {
    //     $sql = "UPDATE tbservicios SET ServiciosEst=$new WHERE  idTbServicios=$idServicio AND idTbPlanes=$idPlan";
    //     $sql = $this->CNX1->prepare($sql);
    //     $sql->execute();
    // }
    // public function ChangeEstPlan($idPlan, $new)
    // {
    //     $sql = "UPDATE tbplanes SET PlanEst=$new WHERE  idTbPlanes=$idPlan";
    //     $sql = $this->CNX1->prepare($sql);
    //     $sql->execute();
    // }
    // public function ListData($idPlan)
    // {
    //     $sql = "SELECT * FROM tbplanes where idTbPlanes =$idPlan";
    //     $sql = $this->CNX1->prepare($sql);
    //     $sql->execute();
    //     $row = $sql->fetch(PDO::FETCH_NAMED);
    //     return $row;
    // }
    // public function UpdatePlan($idPlan, $PlanNom, $PlanVigenciaDia, $PlanCosto, $PlanVigenciaMes)
    // {
    //     $sql = "UPDATE tbplanes SET PlanNom='$PlanNom',PlanVigenciaDia=$PlanVigenciaDia,PlanCosto=$PlanCosto, PlanVigenciaMes=$PlanVigenciaMes WHERE  idTbPlanes=$idPlan";
    //     $sql = $this->CNX1->prepare($sql);
    //     $sql->execute();
    // }

    public function GetModulos()
    {
        $sql = "SELECT * FROM tboptservicios WHERE OptEst=1";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
}
