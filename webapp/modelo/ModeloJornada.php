<?php

class ModeloJornada{
    
    private $id;
    private $descripcion;
    private $hora_inicio;
    private $hora_fin;
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
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @return mixed
     */
    public function getHora_inicio()
    {
        return $this->hora_inicio;
    }

    /**
     * @return mixed
     */
    public function getHora_fin()
    {
        return $this->hora_fin;
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
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @param mixed $hora_inicio
     */
    public function setHora_inicio($hora_inicio)
    {
        $this->hora_inicio = $hora_inicio;
    }

    /**
     * @param mixed $hora_fin
     */
    public function setHora_fin($hora_fin)
    {
        $this->hora_fin = $hora_fin;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    
    public function create(){
        $query = "insert into jornada (descripcion, hora_inicio, hora_fin, estado)
                  values ('$this->descripcion', '$this->hora_inicio', '$this->hora_fin','A')";
        $result= $this->db->query($query);
        return $result;
    }
    
    public function update($id){
        $query = "update jornada 
                    set  descripcion = '$this->descripcion',
                         hora_inicio = '$this->hora_inicio',
                         hora_fin = '$this->hora_fin'
                   where id_jornada = $id";
        $result= $this->db->query($query);
        return $result;
    }
    
    public function delete($id){
        $query = "update jornada 
                    set  estado = 'I'
                   where id_jornada = $id";
        $result= $this->db->query($query);
        return $result;
    }
    
    public function reader($filtro, $estado){
        $query = "	SELECT j.id_jornada, 
                           j.descripcion, 
                           j.hora_inicio, 
                           j.hora_fin, 
                           j.estado
                      FROM jornada j
                   where (j.id_jornada like '%$filtro%'
                       or j.descripcion like '%$filtro%'
                       or j.hora_inicio like '%$filtro%'
                       or j.hora_fin like '%$filtro%')
                    and  j.estado = '$estado'";
        $result= $this->db->query($query);
        return $result;
    }
    
    
}

?>