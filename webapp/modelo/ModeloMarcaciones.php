<?php
class ModeloMarcaciones{
    
    private $id;
    private $detalle_marcacion;
    private $empleado;
    private $fecha;
    private $observacion;
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
    public function getDetalle_marcacion()
    {
        return $this->detalle_marcacion;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @return mixed
     */
    public function getObservacion()
    {
        return $this->observacion;
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
     * @param mixed $detalle_marcacion
     */
    public function setDetalle_marcacion($detalle_marcacion)
    {
        $this->detalle_marcacion = $detalle_marcacion;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @param mixed $observacion
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    
    /**
     * @return mixed
     */
    public function getEmpleado()
    {
        return $this->empleado;
    }
    
    /**
     * @param mixed $empleado
     */
    public function setEmpleado($empleado)
    {
        $this->empleado = $empleado;
    }
    

    public function create(){
        
        $query = "insert into marcaciones (id_detalle_marcacion, id_empleado, fecha, observacion, estado)
                  values ($this->detalle_marcacion, $this->empleado, '$this->fecha','$this->observacion','A')";
        $result= $this->db->query($query);
        return $result;
    }
    
    public function update($id){
       $query = "update marcaciones
                    set observacion = '$this->observacion'
                  where id_marcaciones = $id";
       $result= $this->db->query($query);
       return $result;
    }
    
    public function delete($id){
        $query = "update marcaciones
                    set estado = 'I'
                  where id_marcaciones = $id";
        $result= $this->db->query($query);
        return $result;
    }
    
    
}
?>