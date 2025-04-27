<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tabla de Multiplicar</title>
</head>

<body>
<?php

//asi se recibe post y request es generico funciona igual
$nume=$_REQUEST['n'];
$li=$_REQUEST['li'];

for($c=1;$c<=$li;$c++)
{
	$multi=$nume*$c;
	echo "$nume x $c =$multi <br>";
}

?>

<h1><a href="ejemmultiHTMyPHP.html">volver</a></h1>
</body>
</html>