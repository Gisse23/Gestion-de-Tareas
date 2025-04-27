<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PedidoBeca</title>
</head>

<body>

<?php

$ced=$_REQUEST['ci'];
$nombre=$_REQUEST['nom'];
$apellido=$_REQUEST['ape'];
$sexo=$_REQUEST['boton2'];
$fechanaci=$_REQUEST['fnaci'];
$edad=$_REQUEST['edad'];


$colegio=$_REQUEST['colegio'];
$promedio=$_REQUEST['nota'];
$vivienda=$_REQUEST['vivienda'];
$hogar=$_REQUEST['hogar'];
$hermanos=$_REQUEST['boton4'];
$ingreso=$_REQUEST['boton5'];
$texto=$_REQUEST['texto'];


echo"<dl><center><img src=Beca1.png alt=de2 /></center>";
echo "<h1><center><ins><font color=#0033CC>Los Datos Personales del solicitante son:</font><br></h1></center></ins>";
echo"El nombre del solicitante con cedula $ced es: $nombre $apellido <br>";
echo"La fecha de nacimiento es: $fechanaci <br>";
echo "La edad del solicitante es: $edad <br>";
echo"El sexo del solicitado es: $sexo <br>";


echo "<h1><center><ins><font color=#0033CC>Los Datos Academicos y Familiares del solicitante son:</font><br></h1></center></ins>";
echo "El colegio en el que culmino sus estudios terciarios fue: $colegio. Con un promedio de notas de: $promedio <br>";

echo "Vive con : $vivienda  .La casa es $hogar <br>";
echo "Cantidad de hermanos: $hermanos <br>";

if($ingreso==1)
echo"El ingreso del solicitante esta entre 500.000 y 1.000.000 <br>";
else if($ingreso==2)
echo"El ingreso del solicitante esta entre 1.000.001 y 2.000.000 <br>";
else if($ingreso==3)
echo"El ingreso del solicitante esta entre 2.000.001 y 4.000.000 <br>";
else  if($ingreso==4)
echo"El ingreso del solicitante es mayor a 4.000.000 <br>";

echo"El postulante menciona que necesita la beca por el siguiente motivo... $texto <br>";




/*
1. Edad entre 18 y 21
2.Promedio de nota mayor o igual a 3
3.No vive con sus padres
4. Cantidad de hermanos mayor 1
5.ingreso menor o igual a 2.000.000

*/
$sw=0;
if($edad>=18 and $edad<=21)
{
	$sw=1;
}
echo"</br>";

if($sw=1 and $promedio>=3 and $hermanos>1 and $vivienda!='Padres' and $ingreso<=2)
{
	echo"<ins><b>OBTUVO LA BECA 2022, FELICIDADES!!!! <br></ins></b>";
	}
else
{
	echo"<ins><b>NO reune los requisitos necesarios, por los siguientes motivos .... <br></ins></b>";

	if($edad<=17)
	{ echo"Es menor de edad <br>";} 
	
	if($edad>21)
	{ echo"La edad es mayor a 21, no se encuentra en el rango <br>";} 
	if($promedio<3)
	{echo"No posee el promedio requerido <br>";}
	
	if($hermanos<=1)
	{echo"Debe tener mas de un hermano <br>";}
	if($vivienda=='Padres')
	{echo"Vive con sus padres, por lo tanto no puede acceder a la beca <br>";}
	if($ingreso>=3)
	{echo"Su ingreso supera el limite requerido <br>";}
	
}



?>
<h1><a href="Solicitud BecaMariaVelazquez.html" Volver</a></h1>
</body>
</html>