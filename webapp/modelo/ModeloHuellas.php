<?php

class ModeloHuellas {
    
    private $id;
    private $empleado;
    private $huella;
    private $fecha_activacion;
    private $fecha_inactivacion;
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
    public function getHuella()
    {
        return $this->huella;
    }

    /**
     * @return mixed
     */
    public function getFecha_activacion()
    {
        return $this->fecha_activacion;
    }

    /**
     * @return mixed
     */
    public function getFecha_inactivacion()
    {
        return $this->fecha_inactivacion;
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
     * @param mixed $huella
     */
    public function setHuella($huella)
    {
        $this->huella = $huella;
    }

    /**
     * @param mixed $fecha_activacion
     */
    public function setFecha_activacion($fecha_activacion)
    {
        $this->fecha_activacion = $fecha_activacion;
    }

    /**
     * @param mixed $fecha_inactivacion
     */
    public function setFecha_inactivacion($fecha_inactivacion)
    {
        $this->fecha_inactivacion = $fecha_inactivacion;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function create(){
        $query = "insert into huellas(id_empleado, huella, fecha_activacion, estado)
                  values ($this->empleado, '$this->huella',now(),'A')";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    
    public function update($id){
        $query = "update huellas
                    set  huella= '$this->huella'
                   where id_huella = $id";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function delete($id){
        $query = "update huellas
                    set  fecha_inactivacion = now(),
                         estado = 'I'
                   where id_huella = $id";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function reader($filtro, $estado){
        $query = "SELECT h.id_huella, 
	                     h.id_empleado, 
                         h.huella, 
                         h.fecha_activacion, 
                         h.fecha_inactivacion, 
                         h.estado 
                    FROM huellas h
                   where(h.id_huella like '%$filtro%'
	                  or h.id_empleado like '%$filtro%'
                      or h.fecha_activacion like '%$filtro%')
                    and  h.estado = '$estado';";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
}
?>