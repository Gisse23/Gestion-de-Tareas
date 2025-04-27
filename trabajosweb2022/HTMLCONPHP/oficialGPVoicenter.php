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
    $tipoFormulario = isset( $_POST['tipo_formulario']) ? $_POST['tipo_formulario'] : '';

    if ($tipoFormulario === 'contrasena') {
       $contra = isset($_POST['contra']) ? $_POST['contra'] : '';
   		 $contra2 = isset($_POST['contra2']) ? $_POST['contra2'] : '';

        if (empty($contra) || empty($contra2)) {
            echo "<p style='color:red;'>Ambos campos son obligatorios.</p>";
        } elseif ($contra === $contra2) {
            $formularioVisible = false;

            // Mostrar segundo formulario para crear tarea
            echo "<form method='post'>";
            echo "<input type='hidden' name='tipo_formulario' value='tarea'>";
            echo "<p><b>Ingrese Materia: <input type='text' name='mate' required /></b></p>";
            echo "<p><b>Ingrese Título de la tarea: <input type='text' name='tit' required /></b></p>";
            echo "<p><b>Ingrese la descripción de la tarea: <input type='text' name='des' required /></b></p>";  
            echo "<p><b>Estado:</b></p>";
            echo "<input type='radio' name='estado' value='pendiente' required /> Pendiente<br />";
            echo "<input type='radio' name='estado' value='en progreso' /> En progreso<br />";
            echo "<input type='radio' name='estado' value='completada' /> Completada<br /><br />";
            echo "<input type='submit' value='Guardar Tarea'>";
            echo "<input type='reset' value='Nueva Tarea'>";
            echo "</form>";
        } else {
            echo "<p style='color:red;'>¡Las contraseñas no coinciden!</p>";
        }
    } elseif ($tipoFormulario === 'tarea') {
        // Aquí podrías guardar la tarea en una base de datos o mostrar un mensaje
        $mate =isset( $_POST['mate']) ?$_POST['mate']: '';
        $tit = isset($_POST['tit']) ?$_POST['tit']: '';
        $des = isset($_POST['des'])?$_POST['des']: '';
        $estado = isset( $_POST['estado']) ?$_POST['estado']: '';

        echo "<p style='color:green;'>¡Tarea guardada exitosamente!</p>";
        echo "<p><b>Materia:</b> $mate</p>";
        echo "<p><b>Título:</b> $tit</p>";
        echo "<p><b>Descripción:</b> $des</p>";
        echo "<p><b>Estado:</b> $estado</p>";

        $formularioVisible = false; // Evita que vuelva a mostrar el formulario de contraseñas
    }
}

if ($formularioVisible) {
    echo "<form method='post'>";
    echo "<input type='hidden' name='tipo_formulario' value='contrasena'>";
    echo "<p><b>Ingrese contraseña: <input type='password' name='contra' required /></b></p>";
    echo "<p><b>Confirme contraseña, DEBEN COINCIDIR!!: <input type='password' name='contra2' required /></b></p>";
    echo "<br /><br />";
    echo "<input type='submit' value='Validar'>";
    echo "</form>";
}
?>


















</body>
</html>