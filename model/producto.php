<?php

namespace Modelo;

use PDOException;

include_once 'conexion.php';

class Producto{
    private $id;
    private $nombrePro;
    private $precioPro;
    private $cantidadPro;
    private $descripPro;
    private $estado = 'A';
    public $con;
    public function __construct(){
        $this->con = new \Conexion();

    }

    public function create(){
        try{
            $request= $this->con->getCon()->prepare('INSERT INTO productos(nombrePro,precioPro,cantidadPro,descripPro,estado) 
            VALUES(:nombre,:precio,:cantidad,:descripcion,:estado)');
            $request->bindParam(':nombre',$this->nombrePro);
            $request->bindParam(':precio',$this->precioPro);
            $request->bindParam(':cantidad',$this->cantidadPro);
            $request->bindParam(':descripcion',$this->descripPro);
            $request->bindParam(':estado',$this->estado);
            $request->execute();
            return 'Producto creado';
        }catch(PDOException $e){
            return 'Error: al crear producto'.$e->getMessage();
        }
    }
    public function read(){
        try {
            $request = $this->con->getCon()->prepare("SELECT * FROM productos");
            $request->execute();
            $result = $request->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return "Error: al consultar productos".$e->getMessage();
        }
    }

    public function readId(){
        try{
            $request = $this->con->getCon()->prepare("SELECT * FROM productos WHERE id=:id");
            $request->bindParam(":id",$this->id);
            $request->execute();
            $result = $request->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            return "Error: al consultar producto".$e->getMessage();
        }
    }
    public function statusRol(){
        try{
            $request = $this->con->getCon()->prepare("UPDATE productos SET estado=:estado WHERE id=:id");
            $request->bindParam(":estado",$this->estado);
            $request->bindParam(":id",$this->id);
            $request->execute();
            return "Estado Modificado";
        }catch(PDOException $e){
            return "Error: al cambiar estado del producto".$e->getMessage();
        }
    }

    public function update(){
        try{
            $request= $this->con->getCon()->prepare('UPDATE productos SET nombrePro=:nombre,precioPro=:precio,cantidadPro=:cantidad,descripPro=:descripcion WHERE id=:id');
            $request->bindParam(':nombre',$this->nombrePro);
            $request->bindParam(':precio',$this->precioPro);
            $request->bindParam(':cantidad',$this->cantidadPro);
            $request->bindParam(':descripcion',$this->descripPro);
            $request->bindParam(":id",$this->id);
            $request->execute();
            return 'Producto modificado';
        }catch(PDOException $e){
            return "Error: al modificar producto".$e->getMessage();
        }
    }
    public function delete(){
        try{
            $request=$this->con->getCon()->prepare("DELETE FROM productos WHERE id=:id");
            $request->bindParam(":id",$this->id);
            $request->execute();
            return "Producto Eliminado";
        }catch(PDOException $e){
            return "Error: al eliminar el producto".$e->getMessage();
        }
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
     * Get the value of nombrePro
     */ 
    public function getNombrePro()
    {
        return $this->nombrePro;
    }

    /**
     * Set the value of nombrePro
     *
     * @return  self
     */ 
    public function setNombrePro($nombrePro)
    {
        $this->nombrePro = $nombrePro;

        return $this;
    }

    /**
     * Get the value of precioPro
     */ 
    public function getPrecioPro()
    {
        return $this->precioPro;
    }

    /**
     * Set the value of precioPro
     *
     * @return  self
     */ 
    public function setPrecioPro($precioPro)
    {
        $this->precioPro = $precioPro;

        return $this;
    }

    /**
     * Get the value of cantidadPro
     */ 
    public function getCantidadPro()
    {
        return $this->cantidadPro;
    }

    /**
     * Set the value of cantidadPro
     *
     * @return  self
     */ 
    public function setCantidadPro($cantidadPro)
    {
        $this->cantidadPro = $cantidadPro;

        return $this;
    }

    /**
     * Get the value of descripPro
     */ 
    public function getDescripPro()
    {
        return $this->descripPro;
    }

    /**
     * Set the value of descripPro
     *
     * @return  self
     */ 
    public function setDescripPro($descripPro)
    {
        $this->descripPro = $descripPro;

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