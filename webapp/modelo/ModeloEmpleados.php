<?php
class ModeloEmpleado {
    
    private $id;
    private $cedula;
    private $nombre;
    private $apellido;
    private $fecha_nacimiento;
    private $telefono;
    private $direccion;
    private $observacion;
    private $estado;
    private $imagen;
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
    public function getCedula()
    {
        return $this->cedula;
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
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @return mixed
     */
    public function getFecha_nacimiento()
    {
        return $this->fecha_nacimiento;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
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
     * @return mixed
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $cedula
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @param mixed $apellido
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    /**
     * @param mixed $fecha_nacimiento
     */
    public function setFecha_nacimiento($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
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
     * @param mixed $imagen
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    
    public function create(){
        $query="insert into empleados (cedula, nombre, apellido, fecha_nacimiento, direccion, telefono,fecha_activacion, observacion, imagen, estado)
                values ('$this->cedula','$this->nombre', '$this->apellido', '$this->fecha_nacimiento','$this->direccion', '$this->telefono', now(),'$this->observacion','$this->imagen','A')";
        $result= $this->db->query($query);
        return $result;
    }
    
    
    public function update($id){
        $query = "update empleados 
                  set nombre = '$this->nombre',
                      apellido = '$this->apellido',
                      fecha_nacimiento = '$this->fecha_nacimiento',
                      direccion = '$this->direccion',
                      telefono = '$this->telefono',
                      observacion = '$this->observacion',
                      imagen = '$this->imagen'
                where id_empleado = $id";
        $result= $this->db->query($query);
        return $result;
    }
    
    public function delete($id){
        $query = "update empleados
                  set estado = 'I',
                      fecha_inactivacion= now()
                where id_empleado = $id";
        $result= $this->db->query($query);
        return $result;
    }
    
    public function reader($filtro, $estado){
        $query = "select e.id_empleado,
                         e.cedula,
                         e.nombre,
                         e.apellido,
                         e.fecha_nacimiento,
                         e.direccion,
                         e.telefono,
                         e.observacion,
                         e.imagen,
                         e.estado,
                         e.fecha_activacion
                   where (e.id_empleado like '%$filtro%'
                       or e.cedula like '%$filtro%'
                       or e.nombre like '%$filtro%'
                       or e.apellido like '%$filtro%'
                       or e.fecha_nacimiento like '%$filtro%'
                       or e.direccion like '%$filtro%'
                       or e.telefono like '%$filtro%'
                       or e.observacion like '%$filtro%')
                    and  e.estado = '$estado'";
        $result= $this->db->query($query);
        return $result;
    }
    
}
?>