<?php
class ModeloRolMenu {
    private $menu;
    private $rol;
    private $nombre;
    private $estado;
    private $db;
    
    
    public function __construct(){
        $this->db=Conectar::conexion();
    }
    /**
     * @return mixed
     */
    public function getMenu()
    {
        return $this->menu;
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
    public function getNombre()
    {
        return $this->nombre;
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
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param mixed $menu
     */
    public function setMenu($menu)
    {
        $this->menu = $menu;
    }

    /**
     * @param mixed $rol
     */
    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function create(){
        $query = "insert into rol_menu (id_menu, id_rol, nombre, estado)
                  values ($this->menu,$this->rol,$this->nombre,'A')";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function update($menu, $rol){
        $query = "update rol_menu
                    set nombre=$this->nombre
                  where id_menu = $menu
                    and id_rol = $rol";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function delete($menu, $rol){
        $query = "update rol_menu
                    set estado='I'
                  where id_menu = $menu
                    and id_rol = $rol";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function delete($filtro, $estado){
        $query = "SELECT rm.id_menu, 
                         rm.id_rol, 
                         rm.nombre, 
                         rm.estado 
                    FROM rol_menu rm
                  where (rm.id_menu like '%$filtro%'
                     or  rm.id_rol like '%$filtro%'
                     or  rm.nombre like '%$filtro%')
                    and rm.estado='$estado'";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
}

?>