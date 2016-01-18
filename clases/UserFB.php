<?php

//POJO - plana
class UserFB {
    private $UID, $Fuid, $Ffname, $Femail;
    
    //1º Constructor -> null
   function __construct($UID=null, $Fuid=null, $Ffname=null, $Femail=null) {
         $this->UID = $UID;
         $this->Fuid = $Fuid;
         $this->Ffname = $Ffname;
         $this->Femail = $Femail;;
    }
    
    //2º getter y setter
    public function getUID() {
        return $this->UID;
    }

    public function setEmail($UID) {
        $this->UID = $UID;
    }

    public function getFuid() {
        return $this->Fuid;
    }

    public function setFuid($Fuid) {
        $this->Fuid = $Fuid;
    }

    public function getFfname() {
        return $this->Ffname;
    }

    public function setFfname($Ffname) {
        $this->Ffname = $Ffname;
    }

    public function getFemail() {
        return $this->Femail;
    }

    public function setFemail($Femail) {
        $this->Femail = $Femail;
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
