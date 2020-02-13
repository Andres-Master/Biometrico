<?php
class Conectar{
    public static function conexion(){
        $conexion=new mysqli("localhost", "andres", "andres2000.", "biometrico");
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }
}
?>
