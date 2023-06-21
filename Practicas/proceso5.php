<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Informacion </title>
</head>
<body>
    <?php
        $arr = array('Alex' => '23', 'Sandra' => '12');
        $tabla = '<table>';
        $bool = false;
        $nombre = $_POST['nom'];
        $contraseña = $_POST['con'];
        foreach($arr as $key => $val){
            $tabla .= '<tr><td>'.$key.'</td><td>'.$val.'</td></tr>';
            if ($key == $nombre) {
                $bool = true;
                break;
            }
            else $bool = false;
        }
        if($bool == false) {
            $arr[$nombre] = $contraseña;
            $tabla .= '<tr><td>'.$nombre.'</td><td>'.$contraseña.'</td></tr></table>';
            echo $tabla;
        }
        else echo "Error usuario ya existente";
    ?>
</body>
</html>