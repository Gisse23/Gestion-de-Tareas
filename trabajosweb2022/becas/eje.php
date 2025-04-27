<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>


<?php

session_start(); // Inicia o recupera una sesión para guardar datos del usuario

if (!isset($_SESSION['tareas'])) 
{
    $_SESSION['tareas'] = [];
}

if (!isset($_SESSION['autenticado'])) 
{
    $_SESSION['autenticado'] = false;
}

// control para mostrar el formulario directamente
$formularioVisible = false;

// ----------------------------------------------------------
// Lógica que maneja los formularios enviados (POST)
// ----------------------------------------------------------

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $tipoFormulario = $_POST['tipo_formulario'] ?? '';

    if ($tipoFormulario === 'contrasena') 
    {
        $usuario = $_POST['usuario'] ?? '';
        $contra = $_POST['contra'] ?? '';
        $contra2 = $_POST['contra2'] ?? '';

        if (empty($usuario) || empty($contra) || empty($contra2)) 
        {
            echo "<p style='color:red;'>Todos los campos son obligatorios.</p>";
        } 
        elseif ($contra === $contra2) 
        {
            $_SESSION['autenticado'] = true;
            $_SESSION['usuario'] = $usuario;

            // Si el usuario es nuevo (no tiene tareas)
            if (!isset($_SESSION['tareas'][$usuario])) 
            {
                $_SESSION['tareas'][$usuario] = [];
            }

            // Siempre mostrar formulario para cargar la primera tarea
            $_SESSION['mostrar_formulario'] = true; 

            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        } 
        else 
        {
            echo "<p style='color:red;'>¡Las contraseñas no coinciden!</p>";
        }
    }

    if (isset($_SESSION['autenticado']) && $_SESSION['autenticado']) 
    {
        if ($tipoFormulario === 'modificar_estado') 
        {
            $i = $_POST['indice'];
            $nuevo_estado = $_POST['nuevo_estado'];

            if (isset($_SESSION['tareas'][$_SESSION['usuario']][$i])) 
            {
                $_SESSION['tareas'][$_SESSION['usuario']][$i]['estado'] = $nuevo_estado;
            }

            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }

        if ($tipoFormulario === 'nuevo_formulario') 
        {
            $_SESSION['mostrar_formulario'] = true; 
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }

        if ($tipoFormulario === 'tarea') 
        {
            $mate = $_POST['mate'] ?? '';
            $tit = $_POST['tit'] ?? '';
            $des = $_POST['des'] ?? '';
            $estado = $_POST['estado'] ?? '';
            $vencimiento = $_POST['vencimiento'] ?? '';

            if (empty($mate) || empty($tit) || empty($des) || empty($estado) || empty($vencimiento)) 
            {
                echo "<p style='color:red;'>Todos los campos son obligatorios.</p>";
            } 
            else 
            {
                $usuario = $_SESSION['usuario'];
                $_SESSION['tareas'][$usuario][] = [
                    'materia' => $mate,
                    'titulo' => $tit,
                    'descripcion' => $des,
                    'estado' => $estado,
                    'vencimiento' => $vencimiento
                ];

                // Una vez guardada la tarea, dejar de mostrar formulario automático
                $_SESSION['mostrar_formulario'] = false; 
            }

            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }
    }

    if ($tipoFormulario === 'logout') 
    {
        $_SESSION = [];
        session_destroy();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

// Recuperar si hay que mostrar el formulario
if (isset($_SESSION['mostrar_formulario']) && $_SESSION['mostrar_formulario']) 
{
    $formularioVisible = true;
}

// Estilos y encabezado
echo "<style>
    .header 
    {
        position: relative;
        margin: 10px;
        text-align: center;
    }
    .logout-button 
    {
        background-color: #d9534f;

        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        position: absolute;
        right: 0;
        top: 0;
    }
</style>";

echo "<div class='header'>";
echo "<h1>Gestiones de Tareas</h1>";

if ($_SESSION['autenticado']) 
{
    echo "<form method='post' style='margin: 0;'>";
    echo "<input type='hidden' name='tipo_formulario' value='logout'>";
    echo "<input class='logout-button' type='submit' value='Cerrar sesión'>";
    echo "</form>";

    if (!empty($_SESSION['tareas'][$_SESSION['usuario']])) 
    {
        echo "<hr><h2>Tareas Guardadas:</h2>";

        foreach ($_SESSION['tareas'][$_SESSION['usuario']] as $i => $tarea) 
        {
            echo "<p><b>Materia:</b> {$tarea['materia']}<br>";
            echo "<b>Título:</b> {$tarea['titulo']}<br>";
            echo "<b>Descripción:</b> {$tarea['descripcion']}<br>";
            echo "<b>Estado:</b> {$tarea['estado']}<br>";
            echo "<b>Vence:</b> {$tarea['vencimiento']}</p>";

            echo "<form method='post'>";
            echo "<input type='hidden' name='tipo_formulario' value='modificar_estado'>";
            echo "<input type='hidden' name='indice' value='$i'>";

            foreach (['Pendiente', 'En progreso', 'Completada'] as $estado) 
            {
                $checked = ($tarea['estado'] === $estado) ? 'checked' : '';
                echo "<label><input type='radio' name='nuevo_estado' value='$estado' $checked required> $estado</label><br>";
            }
            echo "<input type='submit' value='Cambiar Estado'>";
            echo "</form><hr>";
        }
    }

    // Botón siempre visible para crear nueva tarea
    echo "<form method='post'>";
    echo "<input type='hidden' name='tipo_formulario' value='nuevo_formulario'>";
    echo "<input type='submit' value='Crear Nueva Tarea'>";
    echo "</form>";

    // Mostrar formulario para nueva tarea si corresponde
    if ($formularioVisible) 
    {
        echo "<h3>Nueva Tarea</h3>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='tipo_formulario' value='tarea'>";
        echo "<p><b>Materia: <input type='text' name='mate' required></b></p>";
        echo "<p><b>Título: <input type='text' name='tit' required></b></p>";
        echo "<p><b>Descripción:</b><br /><textarea name='des' rows='5' cols='30' required></textarea></p>";
        echo "<p><b>Estado:</b></p>";
        echo "<input type='radio' name='estado' value='Pendiente' required> Pendiente<br>";
        echo "<input type='radio' name='estado' value='En progreso'> En progreso<br>";
        echo "<input type='radio' name='estado' value='Completada'> Completada<br><br>";
        echo "<p><b>Fecha de vencimiento: <input type='date' name='vencimiento' required></b></p>";
        echo "<input type='submit' value='Guardar Tarea'>";
        echo "</form>";
    }

} 
else 
{
    echo "<form method='post'>";
    echo "<input type='hidden' name='tipo_formulario' value='contrasena'>";
    $nombre_guardado = $_SESSION['usuario'] ?? '';
    echo "<p><b>Nombre de Usuario: <input type='text' name='usuario' value='" . htmlspecialchars($nombre_guardado) . "' required /></b></p>";
    echo "<p><b>Ingrese contraseña: <input type='password' name='contra' required /></b></p>";
    echo "<p><b>Confirme contraseña: <input type='password' name='contra2' required /></b></p>";
    echo "<br /><br />";
    echo "<input type='submit' value='Validar'>";
    echo "</form>";
}

echo "</div>";

?>



</body>
</html>