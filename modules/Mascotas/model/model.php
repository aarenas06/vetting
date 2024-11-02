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
        $sql = "SELECT * from tbespecies";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }

    public function selectRaza($data)
    {
        $sql = " SELECT r.* from tbrazas r
            left join tbespecies e on e.idTbEspecies=r.idTbEspecies
            where e.idTbEspecies='" . $data['MascoEpecie'] . "'";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_ASSOC);
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

    //FUNCION PARA VALIDAR SI EL MacoCos EXISTE
    public function checkIfMacoCodeExists($code)
    {
        $sql = "SELECT * FROM `tbmascotas` WHERE MascoCod='" . $code . "'";
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


    public function listMascotas($data)
    {
        $sql = "SELECT 	idtbMascotas idMasco, MascoCod Cod, MascoChip Chip, MascoNom Nombre, idTbRazas Raza, MascoFechNac FechNaci,CONCAT(MascoYear, ' Años ', MascoMes, ' Meses') EdadMascota, 
        MascoSex Sexo, MascoPeso Peso, MascoPatologia Patologia, MascoAgresion Agresion, MascoEst Estado FROM tbmascotas 
        where idTbUsuarios='" . $data['UsuCod'] . "'";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() > 0) {
            return $row;
        } else {
            return 'vacio';
        }
    }

    public function InsertMascota($data)
    {
        try {
            $sql = "INSERT INTO tbmascotas (idTbUsuarios, MascoCod, MascoNom, idTbRazas, MascoFechNac, MascoYear, MascoMes, MascoSex, MascoPelaje, 
                        MascoPeso, MascoComidaHab, MascoVivienda, MascoUltCelo, MascoChip, MascoPatologia, MascoAdop, MascoPic, MascoAgresion, MascoEst) 
                VALUES (:idTbUsuarios, :MascoCod, :MascoNom, :idTbRazas, :MascoFechNac, :MascoYear, :MascoMes, :MascoSex, :MascoPelaje, 
                        :MascoPeso, :MascoComidaHab, :MascoVivienda, :MascoUltCelo, :MascoChip, :MascoPatologia, :MascoAdop, :MascoPic, :MascoAgresion,:MascoEst);";
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
        $sql = "SELECT citas.idTbCitas,mas.MascoNom,serv.OptNombre,Emple.EmpNom Doctor,citas.CitaDate,,hc.HisObserv FROM tbcitas citas
            LEFT JOIN tbmascotas mas ON mas.idtbMascotas=citas.idtbMascotas
            LEFT JOIN tboptservicios serv ON serv.IdoptServicios=citas.idTbServicios
            LEFT JOIN tbempleados Emple ON Emple.idTbEmpleados=citas.idTbEmAsig 
            LEFT JOIN tbhisclinica hc ON hc.idTbCitas=citas.idTbCitas
            WHERE mas.idtbMascotas='" . $data['IdMasco'] . "' ";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function EditDataMasco($data)
    {
        $sql = "SELECT idtbMascotas,MascoNom, MascoFechNac,CONCAT(MascoYear, ' Años y ', MascoMes, ' Meses') AS Edad 
            FROM tbmascotas WHERE idtbMascotas = '" . $data['IdMasco'] . "' ";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function SaveEditMasco($data)
    {
        try {
            // Verifica si se ha proporcionado una nueva foto
            $sql = "UPDATE tbmascotas SET MascoNom = :MascoNom, MascoFechNac = :MascoFechNac, MascoYear = :MascoYear, MascoMes = :MascoMes";
            // Solo agregar el campo de la foto si existe en el arreglo de datos
            if (!empty($data['fotoMasco'])) {
                $sql .= ", MascoPic = :MascoPic";
            }
            $sql .= " WHERE idtbMascotas = :idtbMascotas";
            $stmt = $this->CNX1->prepare($sql);
            // Asignar los valores a los parámetros
            $stmt->bindParam(':MascoNom', $data['EditMascoNom']);
            $stmt->bindParam(':MascoFechNac', $data['EditMascoFecNaci']);
            $stmt->bindParam(':MascoYear', $data['EditMascoYear']);
            $stmt->bindParam(':MascoMes', $data['EditMascoMes']);
            // Solo enlazar el parámetro de la foto si se ha proporcionado
            if (!empty($data['fotoMasco'])) {
                $stmt->bindParam(':MascoPic', $data['fotoMasco']);
            }
            $stmt->bindParam(':idtbMascotas', $data['IdMascoEdit']);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            error_log("Error al actualizar los datos: " . $e->getMessage());
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
}
