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

    public function GetModulos()
    {
        $sql = "SELECT * FROM tboptservicios WHERE OptEst=1";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }

    //FUNCION PARA IOBTENER LA DATA DE MASCOTAS
    public function listMascotashome($data)
    {
        $sql = "SELECT mas.idTbUsuarios,mas.MascoNom Nombre,mas.MascoFechNac Fech_Naci,mas.MascoChip Chip,raz.RazNom Raza,CONCAT(mas.MascoYear, ' Años - ', mas.MascoMes, ' Meses') EdadMasco, mas.MascoPic Foto FROM tbmascotas mas 
            LEFT JOIN tbrazas raz ON raz.idTbRazas = mas.idTbRazas
            where idTbUsuarios='" . $data['UsuCod'] . "' ";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function maps()
    {
        $sql = "SELECT EmpreLatitud, EmpreLongitud from tbempresas where EmpreAct=1";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    
}
