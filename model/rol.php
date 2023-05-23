<?php

namespace Modelo;

use PDOException;

include_once "conexion.php";

class Rol{
    private $id;
    private $nombreRol;
    private $estado = 'A';
    public $con;

    public function __construct(){
        $this->con = new \Conexion();

    }

    public function create(){
        try {
            $request = $this->con->getCon()->prepare("INSERT INTO roles(nombreRol,estado) VALUES(:nombre,:estado)");
            $request->bindParam(':nombre',$this->nombreRol);
            $request->bindParam(':estado',$this->estado);
            $request->execute();
            return "Rol creado";
        } catch (PDOException $e) {
            return "Error: al crear rol ".$e->getMessage();
        }
    }
    
    public function read(){
        try {
            $request = $this->con->getCon()->prepare("SELECT * FROM roles");
            $request->execute();
            $result = $request->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return "Error: al consultar roles".$e->getMessage();
        }
    }
    public function readID(){
        try{
            $request = $this->con->getCon()->prepare("SELECT * FROM roles WHERE id=:id");
            $request->bindParam(":id",$this->id);
            $request->execute();
            $result = $request->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            return "Error: al consultar rol".$e->getMessage();
        }
    }

    public function statusRol(){
        try{
            $request = $this->con->getCon()->prepare("UPDATE roles SET estado=:estado WHERE id=:id");
            $request->bindParam(":estado",$this->estado);
            $request->bindParam(":id",$this->id);
            $request->execute();
            return "Estado Modificado";
        }catch(PDOException $e){
            return "Error: al cambiar estado del rol".$e->getMessage();
        }
    }

    public function update(){
        try{
            $request=$this->con->getCon()->prepare("UPDATE roles SET nombreRol=:nombreRol WHERE id=:id");
            $request->bindParam(":nombreRol",$this->nombreRol);
            $request->bindParam(":id",$this->id);
            $request->execute();
            return "Rol Modificado";
        }catch(PDOException $e){
            return "Error: al modificar el rol".$e->getMessage();
        }
    }

    public function delete(){
        try{
            $request=$this->con->getCon()->prepare("DELETE FROM roles WHERE id=:id");
            $request->bindParam(":id",$this->id);
            $request->execute();
            return "Rol Eliminado";
        }catch(PDOException $e){
            return "Error: al eliminar el rol".$e->getMessage();
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