  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Datos paciente</title>
</head>

<body>

<?php
$ced=$_REQUEST['ci'];
$nom=$_REQUEST['nombre'];
$ap=$_REQUEST['apellidos'];
$segu=$_REQUEST['seguro']; 

$sisto=$_REQUEST['sis'];
$diast=$_REQUEST['dia'];
$glice=$_REQUEST['gli'];

$oxig=$_REQUEST['oxi'];

$tri=$_REQUEST['trig'];
$col=$_REQUEST['cole'];
$hemo=$_REQUEST['hemog'];

echo "<b>Los datos del paciente son:<br><br><b>";

echo "El numero de cedula del paciente es: $ced <br>";
echo "El nombre del paciente es: $nom <br>";
echo "El apellido del paciente es: $ap <br>";
echo "El seguro del paciente es: $segu <br><br>";


if($tri<=150 and $col<=200 and $hemo>=13 and $hemo<=16 and $sisto>100 and $sisto<130and $diast>=70 and $diast<=90)
	{echo "El paciente $nom $ap ya puede salir de alta medica<br> ";}
else

{
	echo"El paciente $nom $ap seguira internado, por los siguientes motivos: <br><br>";

	if($tri>150)
	{ echo"*Su triglicerico es de: $tri mayor a lo normal que es 150 <br>";} 
	
	if($col>200)
	{ echo"*Su colesterol es de: $col mayor a lo normal que es 200 <br>";} 
	
	if($hemo<13 or $hemo>16)
	{echo"*Su hemoglobina es de: $hemo, no se encuentra entre 13 y 16 <br>";}
	
	if($sisto<=100 or $sisto>=130)
	{echo "*Su presion arterial sistonica es de: $sisto, no se encuentra entre 101 y 129 <br>";}
	
	if($diast<70 or $diast>90)
	{echo "*Su presion arterial diastonica es de: $diast, no se encuentra entre 70 y 90 <br>";}
	
}


?>
</body>
</html>