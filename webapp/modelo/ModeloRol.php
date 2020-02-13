<?php

class ModeloRol {
    
    private $db;
    private $id;
    private $nombre;
    private $estado;
    
    public function __construct(){
        $this->db=Conectar::conexion();
    }
    
    
    public function setId($id){
        $this->id=$id;
    }
    
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    
    public function setEstado($estado){
        $this->estado=$estado;
    }
    
    public function getId(){
        $id = $this->id;
        return $id;
    }
    
    public function getNombre(){
        $nombre = $this->nombre;
        return $nombre;
    }
    
    public function getEstado(){
        $estado = $this->esatdo;
        return $estado;
    }
    
    
    public function create(){
        $query = "insert into rol (Nombre,fecha_activacion,estado)
                  values ('$this->nombre',now(),'A')";
        $result= $this->db->query($query);
        return $result;
    }
    
    public function update($idrol){
        $query ="update rol 
                 set Nombre='$this->nombre'
                 where id_rol =$idrol";
        $result= $this->db->query($query);
        return $result;
    }
    
    public function delete($idrol){
        $query = "update rol
                 set estado='I',
                     fecha_inactivacion=now()
                 where id_rol =$idrol";
        $result= $this->db->query($query);
        return $result;
        
    }
    
    public function reader($filtro, $estado){
        $query = "select r.id_rol, 
                         r.Nombre, 
                         r.estado, 
                         r.fecha_activacion 
                    from rol r
                   where (r.id_rol like '%$filtro%'
                     or  r.Nombre like '%$filtro%')
                    and  r.estado = '$estado'";
        $result= $this->db->query($query);
        return $result;
    }
}
?>