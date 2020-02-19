<?php

class ModeloJornadaEmpleado{
    
    private $id;
    private $empleado;
    private $jornada;
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
    public function getJornada()
    {
        return $this->jornada;
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
     * @param mixed $jornada
     */
    public function setJornada($jornada)
    {
        $this->jornada = $jornada;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    
    public function create(){
        $query = "insert into jornada_empleados (id_jornada, id_empleado, estado)
                       values ($this->jornada, $this->empleado,'A')";
        $result= $this->db->query($query);
        return $result;
    }
    
    public function update($id){
        
        $query ="update jornada_empleados
                    set id_empleado =  $this->empleado,
                        id_jornada  =  $this->jornada
                  where id_jornada_empleados = $id";
        $result= $this->db->query($query);
        return $result;
    }
    
    public function delete($id){
        $query ="update jornada_empleados
                    set id_empleado =  'I'
                  where id_jornada_empleados = $id";
        $result= $this->db->query($query);
        return $result;
    }
    
    public function reader($filtro, $estado){
        $query = "SELECT je.id_jornada_empleados, 
                         je.id_jornada, 
                         je.id_empleado, 
                         je.estado 
                    FROM jornada_empleados je
                  where (je.id_jornada_empleados like '%$filtro%'
                      or je.id_jornada like '%$filtro%'
                      or je.id_empleado like '%$filtro%')
                     and je.estado = '$estado'";
        $result= $this->db->query($query);
        return $result;
    }
    
    public function consulta_campo($valor, $estado, $campo){
        $query = "SELECT je.id_jornada_empleados,
                         je.id_jornada,
                         je.id_empleado,
                         je.estado
                    FROM jornada_empleados je
                  where (je.$campo = '$valor')
                     and je.estado = '$estado'";
        $result= $this->db->query($query);
        return $result;
    }
    
    
}

?>