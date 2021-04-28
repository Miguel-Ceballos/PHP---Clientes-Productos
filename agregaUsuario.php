<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barberapi";

try {
        //Establece la conección con la BD
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Recupera los datos del formulario
        $nom = $_POST['nomUsu'];
        $eml = $_POST['emaUsu'];
        $pas = $_POST['pasUsu'];
        $foto = $_FILES['fotUsu']; 
        
        $rutaTemporal=$foto['tmp_name'];
        $rutaArchivo= "fotos/" . $foto['name'];
        move_uploaded_file($rutaTemporal, $rutaArchivo);
        
        $sql = "INSERT into usuarios(nombre, email,pass,foto,modo) 
        VALUES ('$nom', '$eml', '$pas','$rutaArchivo','SISTEMA')";
      
    // se ejecuta la sentencia
    $conn->exec($sql);
    // se obtiene el id del último registro insertado
    $ultimo_id = $conn->lastInsertId();
    echo "Se agregó el registro con Id =  " . $ultimo_id;
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>

