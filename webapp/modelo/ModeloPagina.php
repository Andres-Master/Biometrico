<?php
class ModeloPagina {

    private $id;
    private $nombre;
    private $descripcion;
    private $estado;
    private $db;
    
    public function __construct(){
        $this->db=Conectar::conexion();
    }
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @param mixed $observacion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
 
    
    public function create(){
        $query ="insert into paginas (nombre, desripcion, estado)
                 values ('$this->nombre','$this->descripcion','A')";
        $result= $this->db->query($query);
        return $result;
    }
    
    public function update($id){
        $query ="update paginas 
                 set nombre = '$this->nombre',
                     descripcion = '$this->descripcion'
                 where id_pagina= $id";
        $result= $this->db->query($query);
        return $result;
    }
    
    public function delete($id){
        $query ="update paginas 
                 set  estado ='I'
                where id_pagina=$id";
        $result= $this->db->query($query);
        return $result;
    }
    
    public function reader($filtro,$estado){
        $query ="select p.id_persona,
                        p.nombre,
                        p.descripcion,
                        p.estado
                   from paginas p
                  where (p.id_persona like '%$filtro%'
                     or p.nombre like '%$filtro%'
                     or p.descripcion like '%$filtro%'
                    and p.estado ='$estado'";
        $result= $this->db->query($query);
        return $result;
    }
    
    
}
?>