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
        $query ="insert into menu (nombre, descripcion, orden, pagina, id_padre, fecha_inserccion, estado)
                values ('$this->nombre', '$this->descripcion', $this->orden, $this->pagina, $this->padre, now(),'A')";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function update($id){
        $query = "update menu 
                  set nombre = '$this->nombre',
                      descripcion = '$this->descripcion',
                      orden = $this->orden,
                      pagina = $this->pagina,
                      padre = $this->padre
                      where id_menu=$id";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function delete($id){
        $query = "update menu
                  set estado='I'
                  where id_menu=$id";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    public function reader($filtro,$estado){
        $query = "select m.id_menu,
                         m.nombre,
                         m.descripcion,
                         m.orden,
                         m.pagina,
                         m.id_padre,
                         m.fecha_inserccion,
                         m.estado
                    from menu
                   where (m.id_menu like '%$filtro%',
                      or  m.nombre like '%$filtro%',
                      or  m.descripcion like '%$filtro%',
                      or  m.orden like '%$filtro%',
                      or  m.pagina like '%$filtro%',
                      or  m.pagina like '%$filtro%',
                      or  m.fecha_inserccion like '%$filtro%')
                     and m.estado='$estado'";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    
}
?>