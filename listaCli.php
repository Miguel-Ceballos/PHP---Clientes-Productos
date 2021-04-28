<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barberapi";

try {
        //Establece la conección con la BD
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
    // Prepara la sentencia sql a ejecutar
    $Sensql = "SELECT * from clientes ";
    // se ejecuta la sentencia
    $stmt = $conn->prepare($Sensql);
    $stmt->execute();
    $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //$results = $query -> fetchAll(PDO::FETCH_OBJ);
    $a["data"]=$registros;

    echo  json_encode($a);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>