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
$esta=$_REQUEST['estado'];
$sex=$_REQUEST['hm'];
$fec=$_REQUEST['naci'];
$ed=$_REQUEST['edad'];
$ingre=$_REQUEST['montoi'];
$an=$_REQUEST['me'];
$egre=$_REQUEST['montoe'];
$soli=$_REQUEST['mosoli'];
$cu=$_REQUEST['cuotas'];
$hij=$_REQUEST['s'];
$cas=$_REQUEST['a'];
$ce=0;



echo "<b>Los datos del solicitante son:<b> <br>";
echo "El nombre del solicitante es: $nom <br>";
echo "El apellido del solicitante es: $ap <br>";
echo "El numero de cedula del solicitante es: $ced <br>";
echo "El estado civil del solicitante es: $esta <br>";
echo "La fecha de nacimiento del solicitante es: $fec <br>";
echo "La edad del solicitante es: $ed <br>";


if($ingre==1)
	echo "El ingrso del solicitante esta entre 1.000.000 y 2.000.000 <br>";
else if($ingre==2)
	echo "El ingrso del solicitante esta entre 2.000.000 y 4.000.000 <br>";
if($ingre==3)
	echo "El ingrso del solicitante esta entre 4.000.000 y 6.000.000 <br>";
else if($ingre==4)
	echo "El ingrso del solicitante esta entre 6.000.000 y 8.000.000 <br>";
if($ingre==5)
	echo "El ingrso del solicitante es mayor a 8.000.000 <br>";
	
	echo "La antiguedad del solicitante es: $an <br>";
	
	echo " El egreso mensual del solicitnate es $egre <br>";

if($egre==1)
	echo "El engreso del solicitante esta entre 200.000 y 1.000.000 <br>";
else if($egre==2)
	echo "El engreso del solicitante esta entre 1.000.000 y 2.000.000 <br>";
if($egre==3)
	echo "El engreso del solicitante esta entre 3.000.000 y 4.000.000 <br>";
else if($egre==4)
	echo "El engreso del solicitante es mayor a 4.000.000 <br>";

echo "El monto solicitado por $nom es de: $soli <br>";
echo "La cantidad de cuotas es: $cu <br>";
echo "El solicitante $hij tiene hijos <br>";
echo "El solicitante posee casa $cas <br>";


echo "<b>Usted posee las siguientes enfermedades:<b> <br>";

if (isset($_REQUEST['d1'])){echo $_REQUEST['d1']."<br>";$ce++;}
if (isset($_REQUEST['d2'])){echo $_REQUEST['d2']."<br>";$ce++;}
if (isset($_REQUEST['d3'])){echo $_REQUEST['d3']."<br>";$ce++;}
if (isset($_REQUEST['d4'])){echo $_REQUEST['d4']."<br>";$ce++;}
if (isset($_REQUEST['d5'])){echo $_REQUEST['d5']."<br>";$ce++;}

/*
1. Mayor de edad
2. Ingreso Mayor a 3.000.000
3. Antiguedad laboral mayor o igual a 2 anhos
4. Egreso debe ser menor
5. No debe vivir en casa alquilada
6. Enfermedades solo debe contar con 2 como maximo
*/

echo "La cantidad de enfermedades que posee $nom es: $ce <br>";

$sw=0;
if($ed>17 and $ingre>2 and $an>=2 and $egre<3 and $cas!='Alquilada' and $ce<3)
	{echo "Es apto para el credito <br>";}
else
	{echo "No es apto para el credito, ya que vive en casa $cas, su edad es de $ed, tiene un ingreso de $ingre, su anho de antiguedad es $an <br>";}
?>

</body>
</html>