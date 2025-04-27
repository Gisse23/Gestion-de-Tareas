<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ejemplo de PHP</title>
</head>

<body>
<h1>Este es un ejemplode php, pero este es la parte de HTML</h1>
<?php
echo "HI, esto es un Script PHP<br>";

echo "Este es un ejemplo de PHP, pero en php<br>";

// ejemplo para usar una variable

// no usar comillas simples al usar una variable, a la hora de la impresion.
$msj="Este esta guardado en una variable <br>";
// ejemplo 1 de impresion
echo "Este es un mensaje dentro de una variable ".$msj;
// ejemplo 2 de impresion
echo "Este es un mensaje dentro de una variable $msj <br>";
// ejemplo 3 de impresion
echo "Este es un mensaje dentro de una variable-> ".$msj."<- esto sigue aqui";


// ejemplo para usar una constante, las constantes no se imprime dentro de la comilla.
define ("limite",20);
echo "<br>";
echo "Esto es una constante: ".limite;

?>

</body>
</html>