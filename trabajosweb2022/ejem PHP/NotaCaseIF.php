<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>	NOTAS</title>
</head>

<body>
<?php
// dado una nota, imprimir su equivalente en letras
$nota=1;
if($nota==1)
	echo "<font size='+2'> Insuficiente </font>";
else if($nota==2) 
		echo "<font size='+2'> Aceptable </font>";
else if($nota==3) 
		echo "<font size='+2'> Bueno </font>";
else if($nota==4) 
		echo "<font size='+2'> Muy bueno </font>";

else if($nota==5) 
		echo "<font size='+2'> Excelente </font>";

echo "<br>";
$nota=5;
switch($nota)
{
	case 1:
		echo "<font size='+2'> Insuficiente </font>";
		break;
	case 2:
		echo "<font size='+2'> Aceptable </font>";
		break;
	case 3:
		echo "<font size='+2'> Bueno </font>";
		break;
	case 4: 
		echo "<font size='+2'> Muy bueno </font>";
		break;
	case 5: 
		echo "<font size='+2'> Excelente </font>";
		break;
		default:
			echo "<font size='+2'> Numero no corresponde a nota </font>";
			break;
}

?>


</body>
</html>