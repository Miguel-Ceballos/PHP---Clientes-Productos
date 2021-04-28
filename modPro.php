<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barberapi";

try {
        //Establece la conección con la BD
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Recupera los datos del cliente mediante ajax
    $id = $_POST['idPromod'];
    $nombreProducto = $_POST['txtNommod'];
    $precioProducto = $_POST['txtpremod'];
    $existenciaProducto = $_POST['txtExismod'];
    // Prepara la sentencia sql a ejecutar
    $query = "UPDATE productos SET nomPro='$nomPro', prePro='$prePro',exiPro='$exiPro' WHERE idPro=$id ";
    
    // se ejecuta la sentencia
    $conn->exec($query);
   
    echo "Se modificó el registro con Id =  " . $id;
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>