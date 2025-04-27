<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
// EJEMPLO 1
// Dado un numero imprimir el numero con un mensaje si es primo o no
$divisor=1;
$divisores=0;
define ("num",2);

echo "<br>";
echo "Uso de do while<br>";
echo ".................................................... <br>";
do
{
	if(num % $divisor==0)
	{
		$divisores++;
	}
	$divisor++;
}while($divisor<=num);

	if ($divisores==2)
	{
		echo "<b>El numero:</b> ".num." es primo";
	}
	
	else
	{
		echo "<b>El numero:</b> ".num." no es primo";
	}

	
?>


</body>
</html>