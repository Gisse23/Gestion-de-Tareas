<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>constante</title>
</head>

<body>
<?php
//constante, es sin el-> $
define("cali",3);
switch(cali)
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