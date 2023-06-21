<!DOCTYPE html>
<html>
    <body>
        <?php
            $db = mysqli_connect('localhost', 'root', '', 'GAM3');
            $nombre = isset($_POST["nom"]) ? $_POST["nom"] : null;
            $password = isset($_POST["pass"]) ? $_POST["pass"] : null;
            $rpassword = isset($_POST["pass"]) ? $_POST["rpass"] : null;
            if($nombre == null || $password == null || $rpassword == null) {
                include "Register.html"; 
                echo "<br>Nombre o contraseña nulas. Reintentelo." ;
            }
            else if ($rpassword != $password) {
                include "Register.html";
                echo "<br>Las contraseñas no coinciden. Reintentelo.";
            }
            else {
                $sql = "INSERT INTO clientes (Nombre, Contraseña) VALUES ('$nombre', '$password')";
                $consulta = mysqli_query($db, $sql);
                include "Login.html";
            }
            mysqli_close($db);
        ?>
    </body>
</html>