<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>

<?php
// dado un numero hallar la tabla de multiplicar de dicho numero
$c=1;
$m=0;
define("nro",8);
define("lim",12);

echo "Uso de while <br>";
echo ".................................................... <br>";

while($c<=lim)
{
	$m=nro*$c;
	echo "$c x ".nro."=$m <br>";
	$c++;
}

echo "<br>";
echo "Uso de for <br>";

echo ".................................................... <br>";
for($c=1;$c<=lim;$c++)
{
	$m=nro*$c;
	echo "$c x ".nro."=$m <br>";

}

echo "<br>";
$c=1;
echo "Uso de do while<br>";
echo ".................................................... <br>";
do
{
	$m=nro*$c;
		echo "$c x ".nro."=$m <br>";
	$c++;
}while($c<=lim);





?>










</body>
</html>