<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
echo "Uso de while<br>";
echo ".................................................... <br>";
	
	// Ejemplo mas factible
	$sw=0;
	$c=2;
	$nro=16;

while($c<$nro and $sw==0)
{
	if ($nro % $c==0)
		$sw=1;
	$c++;
}
	if($sw==0)
		echo "El numero $nro es primo";
	else
		echo "El numero $nro no es primo";
?>


</body>
</html>