<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Informacion </title>
</head>
<body>
    <?php
        $db = mysqli_connect('localhost', 'root', '', 'pr7 - librería');
        $sql = 'SELECT * FROM categorías';
        $consulta = mysqli_query($db, $sql);
         echo "<form action=\"proceso7.php\" method=\"post\">
         <fieldset>
             <legend>Seleccionar Libros</legend>
             <select name= Categoria>";
             while($fila = mysqli_fetch_assoc($consulta)){ 
                 echo "<option>$fila[Categoría]</option>";
             }
             
         echo "</select><br>
         Precio mínimo <input type = \"int\" name = \"pmin\"><br>
         Precio máximo <input type = \"int\" name = \"pmax\"><br>
         </fieldset>
         <input type = \"submit\" name = \"aceptar\">
         </form>";
         if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $db = mysqli_connect('localhost', 'root', '', 'pr7 - librería');
            $categoria = $_POST['Categoria'];
            $pmi = $_POST['pmin'];
            $pma = $_POST['pmax'];
            $sql2 = 'SELECT * FROM libros';
            $consulta = mysqli_query($db, $sql2);
            $tabla = "<table>";
            while($fila = mysqli_fetch_assoc($consulta)){ 
                if($fila['Categoría'] == $categoria && $fila['Precio'] >= $pmi && $fila['Precio'] <= $pma){
                    $tabla .= "<tr><td>$fila[Título]</tr></td>";
                }
            }
            $tabla .= "</table>";
            echo $tabla; 
        } 
         
      
        
    ?>
</body>
</html>