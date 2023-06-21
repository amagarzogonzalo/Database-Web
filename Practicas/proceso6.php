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
        $sql = 'SELECT * FROM tabla';
        $consulta = mysqli_query($db, $sql);
        $correcto = false;
        while($fila = mysqli_fetch_assoc($consulta)){
            if($fila['Nombre'] == $nombre && $fila['Contraseña'] == $contraseña) {
                echo "Acceso correcto";
                $correcto = true;
                break;    
            }
        }
        if ($correcto == false){
            echo "<form action=\"proceso62.php\" method=\"post\">
            <fieldset>
                <legend>Datos</legend>
                Nombre <br><input type = \"text\" name = \"nom\"><br>
                Contraseña <br><input type = \"text\" name = \"con\">
                Repita contraseña <br><input type = \"text\" name = \"con2\">
            </fieldset>
            <input type = \"submit\" name = \"aceptar\">
            </form>";
        }

    ?>
</body>
</html>