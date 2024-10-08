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

    public function selectRaza()
    {
        $sql = "SELECT * FROM tbrazas";
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

    public function ChangeEstMasco($data, $new)
    {
        $sql = "UPDATE tbmascotas SET MascoEst=$new WHERE  idtbMascotas='" . $data['idMasco'] . "' and MascoChip='" . $data['chip'] . "' ";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
    }

    public function ObtRaza($razaId)
    {
        $sql = "SELECT RazNom FROM tbrazas WHERE idTbRazas = :razaId";
        $stmt = $this->CNX1->prepare($sql);
        $stmt->bindParam(':razaId', $razaId, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $row['RazNom'] : null;
    }


    public function listMascotas()
    {
        $sql = "SELECT 	idtbMascotas idMasco, MascoCod Cod, MascoChip Chip, MascoNom Nombre, idTbRazas Raza, MascoFechNac FechNaci,CONCAT(MascoYear, ' Años ', MascoMes, ' Meses') EdadMascota, 
        MascoSex Sexo, MascoPeso Peso, MascoPatologia Patologia, MascoAgresion Agresion, MascoEst Estado FROM tbmascotas";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }

    public function InsertMascota($data)
    {
        try {
            $sql = "INSERT INTO tbmascotas (idTbUsuarios, MascoCod, MascoNom, idTbRazas, MascoFechNac, MascoYear, MascoMes, MascoSex, MascoPelaje, 
                        MascoPeso, MascoComidaHab, MascoVivienda, MascoUltCelo, MascoChip, MascoPatologia, MascoAdop, MascoPic, MascoAgresion) 
                VALUES (:idTbUsuarios, :MascoCod, :MascoNom, :idTbRazas, :MascoFechNac, :MascoYear, :MascoMes, :MascoSex, :MascoPelaje, 
                        :MascoPeso, :MascoComidaHab, :MascoVivienda, :MascoUltCelo, :MascoChip, :MascoPatologia, :MascoAdop, :MascoPic, :MascoAgresion);";
            $stmt = $this->CNX1->prepare($sql);
            // Asignar los valores a los parámetros
            $stmt->bindParam(':idTbUsuarios', $data['UsuCod']);
            $stmt->bindParam(':MascoCod', $data['MascoChip']);
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
            $stmt->execute();
            $lastInsertId = $this->CNX1->lastInsertId();
            return true; // Retornamos la respuesta de la DB
        } catch (PDOException $e) {
            // Manejar el error
            error_log("Error al insertar los datos: " . $e->getMessage());
            return false;
        }
    }
    public function HistorialMasco($data)
    {
        $sql = "SELECT citas.idTbCitas,mas.MascoNom,serv.OptNombre,citas.CitaDate,citas.CitaObs FROM tbcitas citas
            LEFT JOIN tbmascotas mas ON mas.idtbMascotas=citas.idtbMascotas
            LEFT JOIN tboptservicios serv ON serv.IdoptServicios=citas.idTbServicios 
            WHERE mas.idtbMascotas='" . $data['IdMasco'] . "' ";
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
