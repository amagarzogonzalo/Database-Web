<!DOCTYPE html>
<html>
    <body>
        <?php
            session_start();
            $db = mysqli_connect('localhost', 'root', '', 'GAM3');
            $_SESSION['nombre'] = isset($_POST["nom"]) ? $_POST["nom"] : null;
            $password = isset($_POST["pass"]) ? $_POST["pass"] : null;
            if($_SESSION['nombre'] == null || $password == null) {
                include "Login.html"; 
                echo "<br>Nombre o contraseña nulas. Reintentelo." ;
                 
            }
            else {
                $correcto = false;
                $sql = "SELECT * FROM clientes";
                $consulta = mysqli_query($db,$sql);
                while($fila = mysqli_fetch_assoc($consulta))
                    if($fila['Nombre'] == $_SESSION['nombre'] && $fila['Contraseña'] == $password) {
                        $correcto = true;
                        break;    
                    }
                mysqli_close($db);                
                if($correcto == false) include "Register.html";
                else include "main.php";
            }
        ?>
    </body>
</html>