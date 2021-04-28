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
    $id = $_POST['idClimod'];
    $nomCli = $_POST['txtNommod'];
    $dirCli = $_POST['txtDirmod'];
    $telCli = $_POST['txtTelmod'];
    // Prepara la sentencia sql a ejecutar
    $query = "UPDATE clientes SET nomcli='$nomCli', dirCli='$dirCli',telCli='$telCli' WHERE idCli=$id ";
    
    // se ejecuta la sentencia
    $conn->exec($query);
   
    echo "Se modificó el registro con Id =  " . $id;
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>