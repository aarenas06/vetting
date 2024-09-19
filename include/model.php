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
    public function Validar($user, $pass)
    {

        $sql = "SELECT tb1.* , tb2.RolNom FROM tbusuarios tb1 
        INNER JOIN tbroles tb2 on tb2.idTbRoles=tb1.idTbRoles
        WHERE tb1.UsuUser='$user' AND tb1.UsuCla='$pass'";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_NAMED);
        return $row;
    }
}
