<?php

namespace Modelo;

use PDOException;

include_once "conexion.php";

class Usuario{
    private $id;
    private $tipoDoc;
    private $identificacion;
    private $nombre;
    private $apellido;
    private $correo;
    private $password;
    private $direccion;
    private $telefono;
    private $genero;
    private $idRol;
    private $estado;
    public $con;

    public function __construct(){
        $this->con = new \Conexion();
    }

    public function login(){
        try {
            $sql = $this->con->getCon()->prepare("SELECT * FROM usuarios WHERE correo=:correo AND password=:password");
            $sql->bindParam(':correo',$this->correo);
            $sql->bindParam(':password',$this->password);
            $sql->execute();
            return $sql->fetchAll(\PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error: ".$e->getMessage();
        }
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
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
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of tipoDoc
     */ 
    public function getTipoDoc()
    {
        return $this->tipoDoc;
    }

    /**
     * Set the value of tipoDoc
     *
     * @return  self
     */ 
    public function setTipoDoc($tipoDoc)
    {
        $this->tipoDoc = $tipoDoc;

        return $this;
    }

    /**
     * Get the value of identificacion
     */ 
    public function getIdentificacion()
    {
        return $this->identificacion;
    }

    /**
     * Set the value of identificacion
     *
     * @return  self
     */ 
    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;

        return $this;
    }

    /**
     * Get the value of correo
     */ 
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set the value of correo
     *
     * @return  self
     */ 
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellido
     */ 
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get the value of direccion
     */ 
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     *
     * @return  self
     */ 
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get the value of genero
     */ 
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     *
     * @return  self
     */ 
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get the value of idRol
     */ 
    public function getIdRol()
    {
        return $this->idRol;
    }

    /**
     * Set the value of idRol
     *
     * @return  self
     */ 
    public function setIdRol($idRol)
    {
        $this->idRol = $idRol;

        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }
}