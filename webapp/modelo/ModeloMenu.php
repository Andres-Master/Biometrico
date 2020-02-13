<?php
class ModeloMenu{
    
    private $id;
    private $nombre;
    private $descripcion;
    private $orden;
    private $pagina;
    private $padre;
    private $estado;
    private $fecha_inserccion;
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
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * @return mixed
     */
    public function getPagina()
    {
        return $this->pagina;
    }

    /**
     * @return mixed
     */
    public function getPadre()
    {
        return $this->padre;
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
    public function getFecha_inserccion()
    {
        return $this->fecha_inserccion;
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
     * @param mixed $orden
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;
    }

    /**
     * @param mixed $pagina
     */
    public function setPagina($pagina)
    {
        $this->pagina = $pagina;
    }

    /**
     * @param mixed $padre
     */
    public function setPadre($padre)
    {
        $this->padre = $padre;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @param mixed $fecha_inserccion
     */
    public function setFecha_inserccion($fecha_inserccion)
    {
        $this->fecha_inserccion = $fecha_inserccion;
    }
    
    public function create(){
        $query ="insert into ";
    }
    
    
}
?>