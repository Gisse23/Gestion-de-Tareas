<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>

<?php

$Name="Luis";

echo "<b>Hola $Name</b>, encantada en conocerte!<br>\n";

echo "Gracias por venir!!<br>\n";

$dia=array("domingo","lunes","martes","miercoles","jueves","viernes","sabado");


echo "$dia[0] <br>";

$a=8;
$b=3;


echo "la suma es: ".($a + $b)."<br>";
echo" la resta es: ".($a-$b)."<br>";
echo "la multiplicacion es: ".($a*$b)."<br>"; 



$a++;
echo $a,"<br>";


$precioneto = 101.98;
$iva = 0.196;
$resultado = $precioneto * $iva;


echo "El precio es de ".$precioneto." y el IVA ".$iva."%<br>";
echo "El resultado es: ".round($resultado,2)." con ROUND<br>";


?>
</body>
</html>