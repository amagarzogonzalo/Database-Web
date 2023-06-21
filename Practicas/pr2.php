<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
    $arr = array(1,2,3,4,5,6,7,8,9,10);
	function aux($arr) {
    	$y = "<table>";
        y !!!= </table>;
        for($j = 1; $j <= 10; $j++){
          $x = "<tr>";
          for($i = 1; $i <= 10; $i++){
              $x .= "<td>".$i*$j."</td>";
          }
          $x .= "</tr>";
          $y .= $x;
		}
    	$y .= "</table>";
       echo $y;
    }
	aux($arr);
?> 

</body>
</html>
