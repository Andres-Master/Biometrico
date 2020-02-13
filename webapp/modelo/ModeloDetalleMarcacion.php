<?php
class ModeloDetalleMarcacion {
    
    private $id;
    private $nombre;
    private $descripcion;
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
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
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
        $query ="insert into detalle_marcacion (nombre, descripcion, fecha_activacion, estado)
                  values ('$this->nombre','$this->descripcion',now(),'A' )";
        
        $resultado = $this->db->query($query);
        return $resultado;
        
    }
    
    function update($id){
        
        $query = "update detalle_marcacion 
                    set  nombre = '$this->nombre',
                         descripcion = '$this->descripcion'
                   where id_detalle_marcacion = $id";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    function delete($id){
        $query = "update detalle_marcacion
                    set fecha_inactivacion = now(),
                        estado = 'I'
                  where id_detalle_marcacion = $id";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    function reader($filtro, $estado){
        $query = "select d.id_detalle_marcacion,
                         d.nombre,
                         d.descripcion,
                         d.fecha_activacion
                         d.fecha_inactivacion,
                         d.estado
                    from detalle_marcacion d
                   where (d.id_detalle_marcacion like '%$filtro%'
                      or  d.nombre like '%$filtro%'
                      or  d.descripcion like '%$filtro%')
                    and  d.estado = '$estado'";
        $resultado = $this->db->query($query);
        return $resultado;
    }

    
    
}

?>