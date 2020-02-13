<?php
class ControladorRol {
    
    public function __construct() {
        
    }
    
    public function CreateRol (){
        $rol = new ModeloRol();
        $rol->setNombre($_POST["nombre"]);
        $resultado = $rol->create();
        
        if($resultado){
            echo "<script>alert('Proceso ejecutado correctamente')</script>";
        }else{
            echo "<script>alert('error al crear un nuevo rol')</script>";
        }
    }
    
    public function EditRol (){
        $rol = new ModeloRol();
        $rol->setNombre($_POST["nombre"]);
        $rol->setId($_POST["id"]);
        $resultado = $rol->update($_POST["id"]);
        if($resultado){
            echo "<script>alert('Proceso ejecutado correctamente')</script>";
        }else{
            echo "<script>alert('error al editar un rol')</script>";
        }
    }
    public function EliminarRol(){
        $rol = new ModeloRol();
        $rol->setId($_POST["id"]);
        $resultado = $rol->delete($_POST["id"]);
        if($resultado){
            echo "<script>alert('Proceso ejecutado correctamente')</script>";
        }else{
            echo "<script>alert('error al elminar un rol')</script>";
        }
    }
}
?>