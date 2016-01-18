<?php

//POJO - plana
class User {
    private $email, $clave, $alias, $fechaalta, $activo, $administrador, $personal, $imagen;
    
    //1º Constructor -> null
   function __construct($email=null, $clave=null, $alias=null, $fechaalta=null, $activo=null, $administrador=null, $personal=null, $imagen=null) {
         $this->email = $email;
         $this->clave = $clave;
         $this->alias = $alias;
         $this->fechaalta = $fechaalta;
         $this->activo = $activo;
         $this->administrador = $administrador;
         $this->personal = $personal;
         $this->imagen = $imagen;
    }
    
    //2º getter y setter
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getClave() {
        return $this->clave;
    }

    public function setClave($clave) {
        $this->clave = $clave;
    }

    public function getAlias() {
        return $this->alias;
    }

    public function setAlias($alias) {
        $this->alias = $alias;
    }

    public function getFechaalta() {
        return $this->fechaalta;
    }

    public function setFechaalta($fechaalta) {
        $this->fechaalta = $fechaalta;
    }

    public function getActivo() {
        return $this->activo;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }

    public function getAdministrador() {
        return $this->administrador;
    }

    public function setAdministrador($administrador) {
        $this->administrador = $administrador;
    }

    public function getPersonal() {
        return $this->personal;
    }

    public function setPersonal($personal) {
        $this->personal = $personal;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    //3º getJson
    public function getJson(){
        $r = '{';
        foreach ($this as $indice => $valor) {
            $r .= '"' .$indice . '":"' .$valor. '",';
        }
        $r = substr($r, 0,-1);
        $r .='}';
        return $r;
    }
    
    //4º set genérico    
    function set($valores, $inicio=0){
        $i = 0;
        foreach ($this as $indice => $valor) {
           $this->$indice = $valores[$i+$inicio];
           $i++;
        }
    }
    
    public function __toString() {
        $r ='';
        foreach ($this as $key => $valor) { 
            $r .= "$valor ";
        }
        return $r;
    }
    
    public function getArray($valores = true){
        $array = array();
        foreach ($this as $key => $valor) {
            if($valores === true){
                $array[$key] = $valor;
            }else{
                $array[$key]=null;
            }
        }
        return $array;
    }
    
    function read(){
        foreach ($this as $key => $valor) {
            $this->$key = Request::req($key);
        }
    }
    
}
