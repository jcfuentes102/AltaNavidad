<?php


class ManageUser {
    
    private $bd = null;
    private $tabla = "usuario";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
        //var_dump($this->bd);
    }
    
    function get($email){
        //devuelve un objeto de la clase User
        $parametros = array();
        $parametros['email'] = $email;
        $this->bd->select($this->tabla, "*", "email=:email", $parametros);
        $fila=$this->bd->getRow();
        $usuario = new User();
        $usuario->set($fila);
        return $usuario;
    }
    
    function delete($email){
        $parametros = array();
        $parametros['email'] = $email;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function deleteUsuarios($parametros){
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function erase(User $usuario){
        return $this->delete($usuario->getEmail());
    }
    
    function set(User $usuario){
        //Update de todos los campos menos el Email, el Email se usara como el where para el update numero de filas modificadas
         $parametrosSet=array();
         $parametrosSet['clave']=$usuario->getClave();
         $parametrosSet['alias']=$usuario->getAlias();
         $parametrosSet['fechaalta']=$usuario->getFechaalta();
         $parametrosSet['activo']=$usuario->getActivo();
         $parametrosSet['administrador']=$usuario->getActivo();
         $parametrosSet['personal']=$usuario->getPersonal();
         $parametrosSet['imagen']=$usuario->getImagen();
        
        $parametrosWhere = array();
        $parametrosWhere['email'] = $usuario->getEmail();
        return $this->bd->update($this->tabla, $parametrosSet, $parametrosWhere);
        
    }
    
    function insert(User $usuario){
        //Se pasa un objeto User y se inserta, se devuelve el Email del elemento con el que se ha insertado
         $parametrosSet=array();
         $parametrosSet['email']=$usuario->getEmail();
         $parametrosSet['clave']=$usuario->getClave();
         $parametrosSet['alias']=$usuario->getAlias();
         $parametrosSet['fechaalta']=$usuario->getFechaalta();
         $parametrosSet['activo']=$usuario->getActivo();
         $parametrosSet['administrador']=$usuario->getActivo();
         $parametrosSet['personal']=$usuario->getpersonal();
         $parametrosSet['imagen']=$usuario->getImagen();
        return $this->bd->insert($this->tabla, $parametrosSet);
    }
    
    function getList($pagina=1, $orden="", $nrpp=Constant::NRPP, $condicion="1=1", $parametros=array()){
        
        $ordenPredeterminado = "$orden, email, clave";
        
        if($orden==="" || $orden === null){
            $ordenPredeterminado = "email, clave";
        }
         $registroInicial = ($pagina-1)*$nrpp;
         $this->bd->select($this->tabla, "*", $condicion, $parametros, $ordenPredeterminado , "$registroInicial, $nrpp");
         $r=array();
         while($fila =$this->bd->getRow()){
             $usuario = new User();
             $usuario->set($fila);
             $r[]=$usuario;
         }
         return $r;
    }
    
     function getValuesSelect(){
        $this->bd->query($this->tabla, "email", array(), "alias");
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
