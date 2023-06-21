<!DOCTYPE html>
<html>
    <body>
        <?php include "Main.html"; ?>
        <div class = "Opciones">
            <form action ="main.php" method = "POST" name = "Formulario">
                <div class = "Consola">
                    Consola:
                    <select name = "Consola"  >
                        <option value = "Todas"> Todas </option>
                        <?php
                            $db = mysqli_connect('localhost', 'root', '', 'GAM3');
                            $sql = "SELECT * FROM plataformas";
                            $consulta = mysqli_query($db,$sql);
                            while($fila = mysqli_fetch_assoc($consulta)){ 
                                echo "<option value = $fila[Tipo]> $fila[Tipo] </option>";
                            }
                            mysqli_close($db);
                        ?>
                    </select>
                </div> 
                <div class = "Estado" >
                    Estado:
                    <select name = "Estado"  >
                        <option value = "Ambas"> Ambas </option>
                        <?php
                            $db = mysqli_connect('localhost', 'root', '', 'GAM3');
                            $sql = "SELECT * FROM nuevo";
                            $consulta = mysqli_query($db,$sql);
                            while($fila = mysqli_fetch_assoc($consulta)){ 
                                echo "<option value = $fila[Estado]>";
                                if($fila["Estado"]) echo " Nuevo </option>";
                                else echo " Seminuevo </option>";
                            }
                            mysqli_close($db);
                        ?>

                    </select>
                </div>
                <div class = "Categoria" >
                    Categoria:
                    <select name = "Categoria"  >
                        <option value = "Todas"> Todas </option>
                        <?php
                            $db = mysqli_connect('localhost', 'root', '', 'GAM3');
                            $sql = "SELECT * FROM categorias";
                            $consulta = mysqli_query($db,$sql);
                            while($fila = mysqli_fetch_assoc($consulta)){ 
                                echo "<option value = $fila[Categoria]> $fila[Categoria] </option>";
                            }
                            mysqli_close($db);
                        ?>
                    </select>
                </div>
            </div>
            <br><br>
            <div class = "Central">
                <div class = "Tabla">
                    <?php
                        $array = array();
                        $codigos = array();
                        $consola = isset($_POST["Consola"]) ? $_POST["Consola"] : null;
                        $estado = isset($_POST["Estado"]) ? $_POST["Estado"] : null;
                        $categoria = isset($_POST["Categoria"]) ? $_POST["Categoria"] : null;
                        $db = mysqli_connect('localhost', 'root', '', 'GAM3');
                        $tabla = "<table><tr><td>Nombre</td><td>Precio</td><td>Categoria</td><td>Plataforma</td><td>Nuevo</td></tr>";
                        $sql = "SELECT Nombre, Precio, Categoria, Plataforma, Nuevo, Identificador FROM videojuegos WHERE 1 ";
                        if($categoria != null && $categoria != "Todas")  $sql .= "&& Categoria = '$categoria' ";
                        if($estado != null && $estado != "Ambas") $sql .= "&& Nuevo = '$estado' ";
                        if($consola != null && $consola != "Todas") $sql .= "&& Plataforma = '$consola' ";
                        $consulta = mysqli_query($db,$sql);
                        while($fila = mysqli_fetch_assoc($consulta)){ 
                            $tabla .= "<tr><td>$fila[Nombre]</td><td>$fila[Precio]</td><td>$fila[Categoria]</td><td>$fila[Plataforma]</td><td>";
                            if ($fila['Nuevo'] == 1) $tabla .= "Si</td></tr>";
                            else $tabla .= "No</td></tr>";
                            $array[] = $fila['Nombre'];
                            $codigos[] = $fila['Identificador'];
                        }
                        $tabla .= "</table>";
                        echo $tabla; 
                        mysqli_close($db);
                    ?>
                    <br><br>
                    <input type = "submit" value = "Actualizar">
                </div>
            </form>
                <div class = "Comprar">
                    <form method = "post" action = "Comprar.php">
                        <fieldset>
                                <?php
                                    echo "<b>SELECCIONE VIDEOJUEGOS:</b> <br> <br>";
                                    $i = 0;
                                    foreach ($array as $val) {
                                        
                                        echo "<input type = checkbox name = videojuegos[] value = $codigos[$i]>$val";
                                        $i++;
                                    }
                                ?>
                                <br> <br> 
                                <input type = "submit" value = "Comprar">
                        </fieldset>
                    </form>
                    <br> <br>
                    <div class = "Imagen"> 
                        <img src = "mario.jpg">
                    </div>
                </div>
            
        </div>
        
    </body>
</html>