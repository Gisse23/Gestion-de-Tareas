<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EJEMPLO DE PHP</title>
</head>
<body>

<h1><center>Ejercicios de PHP</center></h1>
<?php

$nro1=81;
$nro2=12;
$msj="Hola Mundo";
echo "Este es un mensaje<br>";
echo $smj."<br>";
// las etiquetqas siempre deben estar dentro de las comillas
echo "Este es un mensaje con una variable ".$msj."<br>";
echo "Este es un mensaje con una variable $msj <br>";
// php es lenguaje de programacion 
// html es de etiquetas
// tiene que ser con comillas dobles, porque con las simples no funciona
echo 'Este es un mensaje con una variable $msj <br>';

$suma=$nro1+$nro2;
$resta=$nro1-$nro2;
$multi=$nro1*$nro2;
$divi=$nro1/$nro2;
$resto=$nro1%$nro2;

echo "<b><ins>La suma es:</b></ins> $suma <br>";
echo "<b><ins>La resta es:</b></ins> $resta <br>";
echo "<b><ins>La multiplicacion es:</b></ins> $multi <br>";
echo "<b><ins>La division es:</b></ins> $divi <br>";
echo "<b><ins>El resto es:</b></ins> $resto <br>";

?>

</body>
</html>