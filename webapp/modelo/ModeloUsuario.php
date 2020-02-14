<?php
class ModeloUsuario {
    
    private $id;
    private $empleado;
    private $usuario;
    private $contrasena;
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
    public function getEmpleado()
    {
        return $this->empleado;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @return mixed
     */
    public function getContrasena()
    {
        return $this->contrasena;
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
     * @param mixed $empleado
     */
    public function setEmpleado($empleado)
    {
        $this->empleado = $empleado;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @param mixed $contrasena
     */
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    
    public function create(){
        $query = "insert into usuario (id_empleado, usuario, contrasena, estado)
                  values ($this->empleado, '$this->usuario', '$this->contrasena', 'I')";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function update($id){
        $query = "upadte usuario
                  set usuario = '$this->usuario',
                      contrasena = '$this->contrasena'
                  where idusuario = $id";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function delete($id){
        $query = "upadte usuario
                  set estado = 'I'
                  where idusuario = $id";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function reader(){
        
    }

    
}
?>