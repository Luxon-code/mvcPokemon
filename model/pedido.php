<?php

namespace Modelo;

use PDOException;

include_once 'conexion.php';

class Pedido{
    private $id;
    private $codigoPed;
    private $idUsu;
    private $nombre;
    private $direccion;
    private $telefono;
    private $totalPed;
    private $formaPago;
    private $estadoPedido = 'Enviado';
    private $estado = 'A';
    private $idPed;
    private $idPro;
    private $cantidadPro;
    public $con;
    public function __construct(){
        $this->con = new \Conexion();

    }

    public function createSolicitud(){
        try{
            $request= $this->con->getCon()->prepare('INSERT INTO pedidos(codigoPed,idUsu,nombre,direccion,telefono,totalPed,formaPago,estadoPedido,estado) 
            VALUES(:codigoPed,:idUsu,:nombre,:direccion,:telefono,:totalPed,:formaPago,:estadoPedido,:estado)');
            $request->bindParam(':codigoPed',$this->codigoPed);
            $request->bindParam(':idUsu',$this->idUsu);
            $request->bindParam(':nombre',$this->nombre);
            $request->bindParam(':direccion',$this->direccion);
            $request->bindParam(':telefono',$this->telefono);
            $request->bindParam(':totalPed',$this->totalPed);
            $request->bindParam(':formaPago',$this->formaPago);
            $request->bindParam(':estadoPedido',$this->estadoPedido);
            $request->bindParam(':estado',$this->estado);
            $request->execute();
            return 'Solicitud creada';
        }catch(PDOException $e){
            return 'Error: al crear solicitud'.$e->getMessage();
        }
    }
    public function readId(){
        try{
            $request = $this->con->getCon()->prepare("SELECT * FROM pedidos WHERE codigoPed=:codigoPed");
            $request->bindParam(":codigoPed",$this->codigoPed);
            $request->execute();
            $result = $request->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            return "Error: al consultar solicitar".$e->getMessage();
        }
    }
    public function createDetSolicitud(){
        try{
            $request= $this->con->getCon()->prepare('INSERT INTO pedpro(idPed,idPro,cantidadPro,estado) 
            VALUES(:idPed,idPro,:cantidadPro,:estado)');
            $request->bindParam(':idPed',$this->idPed);
            $request->bindParam(':idPro',$this->idPro);
            $request->bindParam(':cantidadPro',$this->cantidadPro);
            $request->bindParam(':estado',$this->estado);
            $request->execute();
            return 'Detalle Solicitud creada';
        }catch(PDOException $e){
            return 'Error: al crear destalle solicitud'.$e->getMessage();
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
     * Get the value of codigoPed
     */ 
    public function getCodigoPed()
    {
        return $this->codigoPed;
    }

    /**
     * Set the value of codigoPed
     *
     * @return  self
     */ 
    public function setCodigoPed($codigoPed)
    {
        $this->codigoPed = $codigoPed;

        return $this;
    }

    /**
     * Get the value of idUsu
     */ 
    public function getIdUsu()
    {
        return $this->idUsu;
    }

    /**
     * Set the value of idUsu
     *
     * @return  self
     */ 
    public function setIdUsu($idUsu)
    {
        $this->idUsu = $idUsu;

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
     * Get the value of totalPed
     */ 
    public function getTotalPed()
    {
        return $this->totalPed;
    }

    /**
     * Set the value of totalPed
     *
     * @return  self
     */ 
    public function setTotalPed($totalPed)
    {
        $this->totalPed = $totalPed;

        return $this;
    }

    /**
     * Get the value of formaPago
     */ 
    public function getFormaPago()
    {
        return $this->formaPago;
    }

    /**
     * Set the value of formaPago
     *
     * @return  self
     */ 
    public function setFormaPago($formaPago)
    {
        $this->formaPago = $formaPago;

        return $this;
    }

    /**
     * Get the value of estadoPedido
     */ 
    public function getEstadoPedido()
    {
        return $this->estadoPedido;
    }

    /**
     * Set the value of estadoPedido
     *
     * @return  self
     */ 
    public function setEstadoPedido($estadoPedido)
    {
        $this->estadoPedido = $estadoPedido;

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

    /**
     * Get the value of idPed
     */ 
    public function getIdPed()
    {
        return $this->idPed;
    }

    /**
     * Set the value of idPed
     *
     * @return  self
     */ 
    public function setIdPed($idPed)
    {
        $this->idPed = $idPed;

        return $this;
    }

    /**
     * Get the value of idPro
     */ 
    public function getIdPro()
    {
        return $this->idPro;
    }

    /**
     * Set the value of idPro
     *
     * @return  self
     */ 
    public function setIdPro($idPro)
    {
        $this->idPro = $idPro;

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
}