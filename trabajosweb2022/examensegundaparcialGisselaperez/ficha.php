<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
$ced=$_REQUEST['ci'];
$nom=$_REQUEST['nombre'];
$ap=$_REQUEST['apellidos'];
$sex=$_REQUEST['hm'];
$fec=$_REQUEST['naci'];
$segu=$_REQUEST['seguro'];

$sisto=$_REQUEST['sis'];
$diast=$_REQUEST['dia'];
$glice=$_REQUEST['gli'];

$oxig=$_REQUEST['oxi'];

$tri=$_REQUEST['trig'];
$col=$_REQUEST['cole'];
$hemo=$_REQUEST['hemog'];


echo "<b>Los datos del paciente son:<b> <br><br>";
echo "El numero de cedula del paciente es: $ced <br>";
echo "El sexo del paciente es: $sex <br>";
echo "El nombre del paciente es: $nom <br>";
echo "El apellido del paciente es: $ap <br>";
echo "El seguro del paciente es: $segu <br>";
echo "La fecha de nacimiento del paciente es: $fec <br>";


if ($glice>=1 and $glice<=100)
{echo "Azucar en la sangre normal<br>";}

else

{echo "Tiene diabetes ya que su nivel de azucar en la sangre es mayor a 100 <br> ";}

if ($sisto==120)
{echo "Presion arterial sistonica normal<br>";}
else

{
	echo" Presion arterial sistonica: $sisto<br>";}



if ($diast==80)
{echo "Presion arterial diastolica normal<br>";}
else

{
	echo" Presion arterial diastolica: $diast<br><br>";}


if($tri<=150 and $col<=200 and $hemo>=13 and $hemo<=16 and $oxig>90  )
	{echo "El paciente $nom $ap ya puede salir de alta medica<br> ";}
else

{
	echo"El paciente $nom $ap seguira internado, por los siguientes motivos: <br>";

	if($tri>150)
	{ echo"*Su triglicerico es de $tri mayor a lo normal que es 150 <br>";} 
	
	if($col>200)
	{ echo"*Su colesterol es de $col mayor a lo normal que es 200 <br>";} 
	
	if($hemo<13 or $hemo>16)
	{echo"*Su hemoglobina no se encuentra entre 13 y 16 <br>";}
	
	if($oxig<=90)
	{echo"*Su saturacion de oxigeno es de: $oxig debe estar por encima de 90<br>";}
	
}

?>
</body>
</html>