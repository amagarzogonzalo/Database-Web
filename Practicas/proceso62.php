<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Informacion </title>
</head>
<body>
    <?php
        $db = mysqli_connect('localhost', 'root', '', 'r6');
        $nombre = $_POST['nom'];
        $contraseña = $_POST['con'];
        $contraseña2 = $_POST['con2'];
        if($contraseña == $contraseña2) {
            $sql = "INSERT INTO tabla (Nombre, Contraseña) VALUES ('$nombre', '$contraseña')";
            $consulta = mysqli_query($db, $sql);
            echo 'Operacion realizada con exito';
        }
        else echo "Error: las contraseñas no coinciden";
        mysqli_close($db);
     

    ?>
</body>
</html>