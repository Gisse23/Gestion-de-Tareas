<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>

<?php
echo "<h1><center>Gestiones de Tareas</center></h1>";

$formularioVisible = true; // variable para controlar visibilidad del formulario

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contra = isset($_POST['contra']) ? $_POST['contra'] : '';
    $contra2 = isset($_POST['contra2']) ? $_POST['contra2'] : '';

    if (empty($contra) || empty($contra2)) {
        echo "<p style='color:red;'>Ambos campos son obligatorios.</p>";
    } elseif ($contra === $contra2) {
        $formularioVisible = false; // oculta el formulario
		
		 echo "<p><b>Ingrese Materia: <input type='text' name='mate' required /></b></p>";
		 echo "<p><b>Ingrese Tituo de la tarea: <input type='text' name='tit' required /></b></p>";
		  echo "<p><b>Ingrese la descripcion de la tarea: <input type='text' name='des' required /></b></p>";	
			echo "<p><b>Estado:</b></p>";
			echo "<input type='radio' name='a' value='pe' /> Pendiente<br />";
			echo "<input type='radio' name='a' value='pro' /> En progreso<br />";
			echo "<input type='radio' name='a' value='com' /> Completada<br />";

	echo"<input type='submit' value='Guardar Tarea' formtarget='_blank'>";
    echo"<input type='reset' value='Nueva Tare'>";
    echo" </form>";
		 
    } else {
        echo "<p style='color:red;'>¡Las contraseñas no coinciden!</p>";
    }
}

// Solo se muestra el formulario si se debe
if ($formularioVisible) {
    echo "<form method='post'>";
    echo "<p><b>Ingrese contraseña: <input type='password' name='contra' required /></b></p>";
    echo "<p><b>Confirme contraseña, DEBEN COINCIDIR!!: <input type='password' name='contra2' required /></b></p>";
    echo "<br /><br />";
    echo "<input type='submit' value='Validar'>";
    echo "</form>";
}
?>



</body>
</html>