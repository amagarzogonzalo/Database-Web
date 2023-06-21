<!DOCTYPE>
<html>
<head>
</head>
<body>
<?php
 $array = array('l' => "lunes", 'm' => "martes", 'x' => "miercoles", 'j' => "jueves", 'v' => "viernes", 's' => "sabado", 'd' => "domingo");
  $arr = array('x', 'd');
  function pr2 ($arr, $array) {
    $y = "<ol>";
    foreach($arr as $val) {
    	$x = "<li>";
      	$x .= $array[$val]."</li>";
        $y .= $x;
    }
    $y .= "</ol>";
    echo $y;
  }
  pr2($arr, $array);
?> 
</body>
</html>
</html>