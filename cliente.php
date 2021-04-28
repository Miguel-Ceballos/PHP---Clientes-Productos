<?php
class Cliente{    
    private $nom;
    private $dir;
    private $tel;
   
    

    public function __construct($nom,$dir,$tel){        
        $this->nom=$nom;
        $this->dir=$dir;
        $this->tel=$tel;        
    }

    public function getNombre(){
        return $this->nom;
    }

    public function getDireccion(){
        return $this->dir;
    }

    public function getTelefono(){
        return $this->tel;
    }

    public function setNombre($nom){
        $this->nom=$nom;
    }

    public function setDireccion($dir){        
        $this->dir=$dir;
    }

    public function setTelefono($tel){       
        $this->tel=$tel;
    }

    public static function consultar(){
        $arrClientes['data']=array();
        $bd = new PDO("mysql:host=localhost;dbname=barberapi;charset=utf8", "root", "");
        

        $query="SELECT * FROM clientes";
        $stmt= $bd->prepare($query);
        $stmt->execute();
        
        while($registro = $stmt->fetch(PDO::FETCH_ASSOC)){
            $cliente=array(
                'idCli'=> $registro['idCli'],
                'nomCli'=> $registro['nomCli'],
                'dirCli'=> $registro['dirCli'],
                'telCli'=> $registro['telCli']
            );
            array_push($arrClientes['data'],$cliente);
        }
        return $arrClientes;        
    }

    public static function consultarUno($id){
        $bd = new PDO("mysql:host=localhost;dbname=barberapi;charset=utf8", "root", "");    

        $query="SELECT * FROM clientes WHERE idCli = $id";
        $stmt= $bd->prepare($query);
        $stmt->execute();
        $registro = $stmt->fetch(PDO::FETCH_ASSOC);
        $cliente=array(
            'id'=> $registro['idCli'],
            'nombre'=> $registro['nomCli'],
            'direccion'=> $registro['dirCli'],
            'telefono'=> $registro['telCli']
        );
        return $cliente;
    }

    public function guardar(){
        $bd = new PDO("mysql:host=localhost;dbname=barberapi;charset=utf8", "root", "");
        $query="INSERT INTO  clientes(nomCli,dirCli,telCli) 
                VALUES('$this->nom','$this->dir','$this->tel')";
        $stmt= $bd->prepare($query);
        if($stmt->execute()){
            return true;
        }
        else
            return false;
    }

    public function actualizar($id){
        $bd = new PDO("mysql:host=localhost;dbname=barberapi;charset=utf8", "root", "");
        
        $query="UPDATE clientes SET nomCli='$this->nom',
                                   dirCli='$this->dir',
                                   telCli='$this->tel' 
                WHERE idCli= $id";
        $stmt= $bd->prepare($query);        
        if($stmt->execute())
            return true;
        else
            return false;
    }
    
    public static function eliminar($id){
        $bd = new PDO("mysql:host=localhost;dbname=barberapi;charset=utf8", "root", "");
        
        $query="DELETE FROM clientes WHERE idCli= $id";
        $stmt= $bd->prepare($query);
        if($stmt->execute())
            return true;
        else
            return false;
    }

    

}