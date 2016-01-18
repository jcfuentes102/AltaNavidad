<?php


class ManageUserFB {
    
    private $bd = null;
    private $tabla = "usuariosFB";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
        //var_dump($this->bd);
    }
    
    function get($UID){
        //devuelve un objeto de la clase UserFB
        $parametros = array();
        $parametros['UID'] = $UID;
        $this->bd->select($this->tabla, "*", "UID=:UID", $parametros);
        $fila=$this->bd->getRow();
        $usuario = new UserFB();
        $usuario->set($fila);
        return $usuario;
    }
    
    function delete($UID){
        $parametros = array();
        $parametros['UID'] = $UID;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function deleteUsuarios($parametros){
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function erase(UserFB $usuario){
        return $this->delete($usuario->getUID());
    }
    
    function set(UserFB $usuario){
        //Update de todos los campos menos el UID, el UID se usara como el where para el update numero de filas modificadas
         $parametrosSet=array();
         $parametrosSet['Fuid']=$usuario->getFuid();
         $parametrosSet['Ffname']=$usuario->getFfname();
         $parametrosSet['Femail']=$usuario->getFemail();
        
        $parametrosWhere = array();
        $parametrosWhere['UID'] = $usuario->getUID();
        return $this->bd->update($this->tabla, $parametrosSet, $parametrosWhere);
        
    }
    
    function insert(UserFB $usuario){
        //Se pasa un objeto UserFB y se inserta, se devuelve el UID del elemento con el que se ha insertado
         $parametrosSet=array();
         $parametrosSet['UID']=$usuario->getUID();
         $parametrosSet['Fuid']=$usuario->getFuid();
         $parametrosSet['Ffname']=$usuario->getFfname();
         $parametrosSet['Femail']=$usuario->getFemai();
        return $this->bd->insert($this->tabla, $parametrosSet);
    }
    
    function getList($pagina=1, $orden="", $nrpp=Constant::NRPP, $condicion="1=1", $parametros=array()){
        
        $ordenPredeterminado = "$orden, UID, Fuid";
        
        if($orden==="" || $orden === null){
            $ordenPredeterminado = "UID, Fuid";
        }
         $registroInicial = ($pagina-1)*$nrpp;
         $this->bd->select($this->tabla, "*", $condicion, $parametros, $ordenPredeterminado , "$registroInicial, $nrpp");
         $r=array();
         while($fila =$this->bd->getRow()){
             $usuario = new UserFB();
             $usuario->set($fila);
             $r[]=$usuario;
         }
         return $r;
    }
    
     function getValuesSelect(){
        $this->bd->query($this->tabla, "UID", array(), "Ffname");
        $array = array();
        while($fila=$this->bd->getRow()){
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }
    
    function count($condicion="1 = 1", $parametros = array()){
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }

}
