<!DOCTYPE html>
<html>
    <body>
        <?php
            $metodo = isset($_POST['pagar'])?$_POST['pagar']:null;
            if($metodo != null){
                session_start();
                $num_pedido = rand(0,99999);
                $cod = rand(0,9999);
                $db = mysqli_connect('localhost', 'root', '', 'GAM3');        
                $sql = "SELECT * INTO pedido WHERE ID = '$num_pedido'";
                while(mysqli_query($db, $sql)){
                    $num_pedido = rand(0,99999);
                    $sql = "SELECT * INTO pedido WHERE ID = '$num_pedido'";
                }
                $sql = "SELECT * INTO pedido WHERE Codigo = '$cod'";
                while(mysqli_query($db, $sql)){
                    $cod = rand(0,9999);
                    $sql = "SELECT * INTO pedido WHERE Codigo = '$cod'";
                }
                $nombre = $_SESSION['nombre'];
                $videojuegos = $_SESSION['videoarray'];
                $sql = "INSERT INTO pedido (ID, Cliente, Videojuego, Codigo) VALUES ('$num_pedido', '$videojuegos', '$nombre', '$cod')";
                $consulta = mysqli_query($db, $sql);
                if(!$consulta) echo "la has liado";
                include "Tramitar.html";
                echo "<h4>Código a canjear en tienda $cod</h4>";
                mysqli_close($db);
            }
            else {
                include "Main.php";
                echo "No se ha seleccionado metodo de pago";
            }
        ?>
    </body>
</html>