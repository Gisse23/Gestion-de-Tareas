<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MULTIPLO</title>
</head>

<body>
<?php
// toma de decicion 
// al ser una sola linea de codigo no es necesario usar la llave
$nro=40;
if ($nro % 2==0)
{
		echo "El numero $nro es par <br>";
	if($nro % 3==0)
		echo "El numero tambien es multiplo de 3 <br>";
	else
		echo "No es multiplo de 3 <br>";
}else
	{
		echo "El numero $nro no es multiplo de 2 <br>";
	}
?>

</body>
</html>