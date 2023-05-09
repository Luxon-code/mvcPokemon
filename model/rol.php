<?php

namespace Modelo;

include_once "conexion.php";

class Rol{
    private $id;
    private $nombreRol;
    public $con;

    public function __construct(){
        $this->con = new \Conexion();

    }

    public function create(){
        
    }    

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombreRol
     */
    public function getNombreRol()
    {
        return $this->nombreRol;
    }

    /**
     * Set the value of nombreRol
     */
    public function setNombreRol($nombreRol): self
    {
        $this->nombreRol = $nombreRol;

        return $this;
    }
}