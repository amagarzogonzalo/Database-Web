<!DOCTYPE html>
<html>
    <body>
        <?php include "Comprar.html"; ?>
        <div class = "Central">
            <div class = "Izquierda">
                <?php
                    session_start();
                    $videojuegos = isset($_POST['videojuegos'])?$_POST['videojuegos']:null;
                    if($videojuegos != null){
                        $_SESSION['videoarray'] = "";
                        $preciototal = 0;
                        $db = mysqli_connect('localhost', 'root', '', 'GAM3');
                        $tabla = "<table><tr><td>Videojuego</td><td>Precio</td></tr>";
                        foreach ($videojuegos as $v) {
                            $sql = "SELECT Precio, Nombre FROM videojuegos WHERE Identificador = '$v'";
                            $consulta = mysqli_query($db, $sql);
                            $fila = mysqli_fetch_assoc($consulta);
                            $tabla .= "<tr><td>$fila[Nombre]</td><td>$fila[Precio]</td></tr>";
                            $preciototal += $fila['Precio'];
                            $_SESSION['videoarray'] .= $fila['Nombre'] .",";
                        }
                        $_SESSION['videoarray'] = substr($_SESSION['videoarray'], 0, -1);
                        $tabla .= "</table>";
                        echo $tabla;
                        echo "<br> <h4><b>Precio Total:  $preciototal</b></h4>";
                    }
                    else{
                        echo "<fieldset>No ha seleccionado articulos vuelva al menu principal <br>
                        <form method = POST action = main.php> <input type = submit value = Menu></form></fieldset>";
                    }
                ?>
            </div>
            <div class = "Centro">
                <?php
                 $videojuegos = isset($_POST['videojuegos'])?$_POST['videojuegos']:null;
                 if($videojuegos != null){
                    echo "<form method = POST action = Tramitar.php>
                        <legend>Elija el método de pago</legend>
                        <fieldset>
                            <input type = radio value = Pagar name = pagar>PayPal
                            <input type = radio value = Pagar name = pagar>Tarjeta de crédito
                            <input type = radio value = Pagar name = pagar>Transferencia (SEPA)
                            <br>
                            <input type = submit value = Comprar>
                        </fieldset>
                    </form>";
                 }
                ?>
            </div>
            <div class = "Derecha">
            <?php
                $videojuegos = isset($_POST['videojuegos'])?$_POST['videojuegos']:null;
                if($videojuegos != null){
                    echo "<img src = pago.jpg>";
                }
            ?>       
            </div>
        </div>
    </body>
</html>