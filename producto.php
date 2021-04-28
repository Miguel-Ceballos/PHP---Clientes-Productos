<?php
class Producto{    
    private $nom;
    private $pre;
    private $exi;
   
    

    public function __construct($nom,$pre,$exi){        
        $this->nom=$nom;
        $this->pre=$pre;
        $this->exi=$exi;        
    }

    public function getNombre(){
        return $this->nom;
    }

    public function getPrecio(){
        return $this->pre;
    }

    public function getExistencia(){
        return $this->exi;
    }

    public function setNombre($nom){
        $this->nom=$nom;
    }

    public function setPrecio($pre){        
        $this->pre=$pre;
    }

    public function setExistencia($exi){       
        $this->exi=$exi;
    }

    public static function consultar(){
        $arrProductos['data']=array();
        $bd = new PDO("mysql:host=localhost;dbname=barberapi;charset=utf8", "root", "");
        

        $query="SELECT * FROM productos";
        $stmt= $bd->prepare($query);
        $stmt->execute();
        
        while($registro = $stmt->fetch(PDO::FETCH_ASSOC)){
            $producto=array(
                'idPro'=> $registro['idPro'],
                'nomPro'=> $registro['nomPro'],
                'prePro'=> $registro['prePro'],
                'exiPro'=> $registro['exiPro']
            );
            array_push($arrProductos['data'],$producto);
        }
        return $arrProductos;        
    }

    public static function consultarUno($id){
        $bd = new PDO("mysql:host=localhost;dbname=barberapi;charset=utf8", "root", "");    

        $query="SELECT * FROM productos WHERE idPro = $id";
        $stmt= $bd->prepare($query);
        $stmt->execute();
        $registro = $stmt->fetch(PDO::FETCH_ASSOC);
        $producto=array(
            'id'=> $registro['idPro'],
            'nombre'=> $registro['nomPro'],
            'precio'=> $registro['prePro'],
            'existencia'=> $registro['exiPro']
        );
        return $producto;
    }

    public function guardar(){
        $bd = new PDO("mysql:host=localhost;dbname=barberapi;charset=utf8", "root", "");
        $query="INSERT INTO  productos(nomPro,prePro,exiPro) 
                VALUES('$this->nom','$this->pre','$this->exi')";
        $stmt= $bd->prepare($query);
        if($stmt->execute()){
            return true;
        }
        else
            return false;
    }

    public function actualizar($id){
        $bd = new PDO("mysql:host=localhost;dbname=barberapi;charset=utf8", "root", "");
        $query="UPDATE productos SET nomPro='$this->nom',
                                   prePro='$this->pre',
                                   exiPro='$this->exi' 
                WHERE idPro= $id";
        $stmt= $bd->prepare($query);        
        if($stmt->execute())
            return true;
        else
            return false;
    }
    
    public static function eliminar($id){
        $bd = new PDO("mysql:host=localhost;dbname=barberapi;charset=utf8", "root", "");
        
        $query="DELETE FROM productos WHERE idPro= $id";
        $stmt= $bd->prepare($query);
        if($stmt->execute())
            return true;
        else
            return false;
    }
}