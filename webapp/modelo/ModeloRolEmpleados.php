<?php

class ModeloRolEmpleados {
    
    private $id;
    private $empleado;
    private $rol;
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
    public function getRol()
    {
        return $this->rol;
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
     * @param mixed $rol
     */
    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    
    
    public function create(){
        $query = "insert into rol_empleados (id_empleado, id_rol, estado)
                  values ($this->empleado,$this->rol,'A')";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function update($id){
        $query = "update rol_empleados
                    set id_empleado=$this->empleado,
                        id_rol = $this->rol
                  where id_rol_empleados = $id";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function delete($id){
        $query = "update rol_empleados
                    set estado = 'I'
                  where id_rol_empleados = $id";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function reader($filtro,$estado){
        $query = "SELECT re.id_rol_empleados, 
                         re.id_empleado, 
                         re.id_rol, 
                         re.estado 
                    FROM rol_empleados re
                   where (re.id_rol_empleados like '%$filtro%'
                      or  re.id_empleado like '%$filtro%'
                      or  re.id_rol like '%$filtro%')
                     and re.estado='$estado'";
        $resultado = $this->db->query($query);
        return $resultado;
    }
}
?>