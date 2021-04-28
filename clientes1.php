<?php
//echo ("Metodo de la Peticion " . $_SERVER['REQUEST_METHOD']);
//header('Content-Type: application-json');
include_once('cliente.php');
switch($_SERVER["REQUEST_METHOD"])
{
    case 'POST':        
        $datos=json_decode(file_get_contents("php://input"));        
        $cliente= new Cliente($datos->nombre,$datos->direccion,$datos->telefono);
        if ($cliente->guardar()){            
            echo "Se registro el cliente";
        }
        else{
            echo "No se registro el cliente";
        }
    break;
    case 'GET':
        if (isset($_GET['id'])){
            $resultado=Cliente::consultarUno($_GET['id']);           
            echo json_encode($resultado);
        }
        else{
            $resultado=Cliente::consultar();            
            echo json_encode($resultado);
        }
    break;
    case 'PUT':
        if (isset($_GET['id'])){
            $datos=json_decode(file_get_contents("php://input"));
            $cliente= new Cliente($datos->nombre,$datos->direccion,$datos->telefono);
            if ($cliente->actualizar($_GET['id'])){
                //$resultado["mensaje"]="Se actualizo el cliente";
                //$resultado["datos"]=json_encode($datos);
                echo "Se actualizo el cliente";
            }
            else{
               // $resultado["mensaje"]="No se actualizo el cliente";
                echo "No se actualizo el cliente";
            }
        }           
    break;
    case 'DELETE':       
        if (isset($_GET['id'])){
            if(Cliente::eliminar($_GET['id'])){
                //$resultado["mensaje"]="Se elimino el cliente";
               // echo json_encode($resultado);
               echo "Se elimino el cliente";
            }
            else{
               // $resultado["mensaje"]="No se elimino el cliente";
               // echo json_encode($resultado);
               echo "No se elimino el cliente";
            }
            
        }      
    break;

}