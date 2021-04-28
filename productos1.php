<?php
//echo ("Metodo de la Peticion " . $_SERVER['REQUEST_METHOD']);
//header('Content-Type: application-json');
include_once('producto.php');
switch($_SERVER["REQUEST_METHOD"])
{
    case 'POST':        
        $datos=json_decode(file_get_contents("php://input"));        
        $producto= new Producto($datos->nombre,$datos->precio,$datos->existencia);
        if ($producto->guardar()){            
            echo "Se registro el producto";
        }
        else{
            echo "No se registro el producto";
        }
    break;
    case 'GET':
        if (isset($_GET['id'])){
            $resultado=Producto::consultarUno($_GET['id']);           
            echo json_encode($resultado);
        }
        else{
            $resultado=Producto::consultar();            
            echo json_encode($resultado);
        }
    break;
    case 'PUT':
        if (isset($_GET['id'])){
            $datos=json_decode(file_get_contents("php://input"));
            $producto= new Producto($datos->nombre,$datos->precio,$datos->existencia);
            if ($producto->actualizar($_GET['id'])){
                //$resultado["mensaje"]="Se actualizo el cliente";
                //$resultado["datos"]=json_encode($datos);
                echo "Se actualizo el producto";
            }
            else{
               // $resultado["mensaje"]="No se actualizo el cliente";
                echo "No se actualizo el producto";
            }
        }           
    break;
    case 'DELETE':       
        if (isset($_GET['id'])){
            if(Producto::eliminar($_GET['id'])){
                //$resultado["mensaje"]="Se elimino el cliente";
               // echo json_encode($resultado);
               echo "Se elimino el producto";
            }
            else{
               // $resultado["mensaje"]="No se elimino el cliente";
               // echo json_encode($resultado);
               echo "No se elimino el producto";
            }
            
        }      
    break;

}