<?php

class ModeloParametrosPaginas {
    
    private $pagina;
    private $id;
    private $nombre;
    private $descripcion;
    private $valor;
    private $estado;
    private $db;
    
    public function __construct(){
        $this->db=Conectar::conexion();
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
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $pagina
     */
    public function setPagina($pagina)
    {
        $this->pagina = $pagina;
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
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function create(){
        $query = "insert into parametros_paginas (id_pagina, id_parametro, nombre, descripcion, valor, estado)
                  values ($this->pagina, $this->id,'$this->nombre','$this->descripcion','$this->valor','A')";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    public function update($id){
        $query = "update parametros_paginas
                     set nombre ='$this->nombre',
                         descripcion ='$this->descripcion',
                         valor ='$this->valor'
                   where id_pagina =$this->pagina
                     and id_parametro = $id";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function delete($id){
        $query = "update parametros_paginas
                     set estado = 'I'
                   where id_pagina =$this->pagina
                     and id_parametro = $id";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function reader($filtro, $estado){
        $query = "	SELECT pp.id_pagina, 
                           pp.id_parametro, 
                           pp.nombre, 
                           pp.descripcion, 
                           pp.valor, 
                           pp.estado 
                      FROM parametros_paginas pp
                    where (pp.id_pagina like '%$filtro%'
                       or pp.id_parametro like '%$filtro%'
                       or pp.nombre like '%$filtro%'
                       or pp.descripcion like '%$filtro%'
                       or pp.valor like '%$filtro%')
                      and  pp.estado = '$estado'";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
}

?>