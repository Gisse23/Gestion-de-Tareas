<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gestion de Tareas</title>
</head>

<body>
<?php

session_start(); // Inicia o recupera una sesión para guardar datos del usuario

// Controla si se muestra el formulario para crear una nueva tarea.
$formularioVisible = false; // se inicializa en false porque no quiero que se visualice hasta que el usuario haga clic en "Crear Nueva Tarea"


if ($_SERVER['REQUEST_METHOD'] === 'POST') //Verifica si el formulario fue enviado usando el método POST, clic en cualquier de los botones
{
    $tipoFormulario = $_POST['tipo_formulario'] ?? '';//se carga el tipo de formulario

		// 1: Validación de contraseñas
		if ($tipoFormulario === 'contrasena') //Si el usuario envió el formulario de contraseña para iniciar sesion
		{
			$usuario = $_POST['usuario'] ?? ''; // se obtiene el nombre de usuario y las contraseñas que ingreso en el formulario
			$contra = $_POST['contra'] ?? '';
			$contra2 = $_POST['contra2'] ?? '';
		
			if (empty($usuario) || empty($contra) || empty($contra2)) // se verifica que no esten en blanco el formulario de contraseña
			{
				echo "<p style='color:red;'>Todos los campos son obligatorios.</p>";//si esta vacio sale mensajes
			} elseif ($contra === $contra2) // verifica si son iguales las contrasenas
			{
				$_SESSION['autenticado'] = true;// si es igual lo guarda como autenticado
				$_SESSION['usuario'] = $usuario; // Guarda el nombre de usuario en la sesión
				
				if (!isset($_SESSION['tareas'][$usuario]))// Inicializa su lista de tareas vacía si es su primer ingreso a la pagina
				{
					$_SESSION['tareas'][$usuario] = []; 
				}
			} else 
				{
					echo "<p style='color:red;'>¡Las contraseñas no coinciden!</p>"; //mensaje de error sino coinciden contrasenas
				}
		}

    	// 2: Acciones si ya está autenticado
		if (isset($_SESSION['autenticado']) && $_SESSION['autenticado']) //verifica si esta autenticado y puede(crear,cambiar estado, guardar tarea)
		{
				//2.1 Cambio de estado
				if ($tipoFormulario === 'modificar_estado') // si hace clic en Cambiar Estado
				{
					$i = $_POST['indice'];//Capturás cuál tarea por el indice y qué nuevo estado eligió
					$nuevo_estado = $_POST['nuevo_estado'];
					
					if (isset($_SESSION['tareas'][$_SESSION['usuario']][$i])) // si el usuario que está usando la pagina tiene una tarea en la posición $i dentro de su lista de tareas.
					{
						$_SESSION['tareas'][$_SESSION['usuario']][$i]['estado'] = $nuevo_estado;//actualiza el estado
						echo "<p style='color:blue;'>¡Estado actualizado!</p>"; //Mensaje para cuando actualice EL ESTADO
					}
				}
	
			// 2.2 Mostrar formulario para nueva tarea
			if ($tipoFormulario === 'nuevo_formulario') //si hace clic en nueva tarea muestra un formulario vacío para que el usuario cargue
			{
				$formularioVisible = true;// se hace viisble el formulario, para que lo carguen
			}
	
			// 2.3 Guardar tarea nueva
			if ($tipoFormulario === 'tarea') //si hacemos clic en Guardar Tarea
			{
				$mate = $_POST['mate'] ?? '';//se carga los datos que se cargo en el formulario
				$tit = $_POST['tit'] ?? '';
				$des = $_POST['des'] ?? '';
				$estado = $_POST['estado'] ?? '';
				$vencimiento = $_POST['vencimiento'] ?? '';
		
					if (empty($mate) || empty($tit) || empty($des) || empty($estado) || empty($vencimiento)) //verifica que los campos no esten vacios
					{
						echo "<p style='color:red;'>Todos los campos son obligatorios.</p>";//si esta en vacio aparece este mensaje
					} else 
					{
						$usuario = $_SESSION['usuario']; //Aqui se guarda la tarea con los datos que ingreso el usaurio y tambien el nombre del usuario
						$_SESSION['tareas'][$usuario][] = [
							'materia' => $mate,
							'titulo' => $tit,
							'descripcion' => $des,
							'estado' => $estado,
							'vencimiento' => $vencimiento
						];
			
						echo "<p style='color:green;'>¡Tarea guardada exitosamente!</p>";//una vez al guardar sale este mensaje
					}
			}
		}

    // 3: Cerrar sesión
    if ($tipoFormulario === 'logout') // si hacemos clic en Cerrar Sesion.
    {
        $_SESSION['autenticado'] = false; //se cambia a false,cierra la sesion
        // $_SESSION['usuario'] no se borra para recordar el nombre aunque cierre sesión
        header("Location: " . $_SERVER['PHP_SELF']); //redirige a la misma página de inicio
        exit;
    }
}

// Estilos y encabezado con botón de logout header=Encabezado; logout-button=boton de cerrar sesion
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
// El encabezado se muestra siempre, en el centro
echo "<div class='header'>";
echo "<h1>Gestiones de Tareas</h1>";

if ($_SESSION['autenticado']) //si el usuario esta autenticado muestra el botón de cerrar sesión arriba a la derecha
{
    echo "<form method='post' style='margin: 0;'>";
    echo "<input type='hidden' name='tipo_formulario' value='logout'>";
    echo "<input class='logout-button' type='submit' value='Cerrar sesión'>";
    echo "</form>";
}
echo "</div>";



// Si no existe todavía tareas en la sesión, lo crea vacío.
if (!isset($_SESSION['tareas'])) 
{
    $_SESSION['tareas'] = [];
}

// Control de autenticación,Si la sesión no tiene el dato de autenticación (autenticado), lo pone en false
if (!isset($_SESSION['autenticado'])) 
{
    $_SESSION['autenticado'] = false;
}


if ($_SESSION['autenticado']) // Mostrar contenido solo si está autenticado
{

		if (!empty($_SESSION['tareas'][$_SESSION['usuario']])) // condicion de Si el usuario ya tiene tareas,$_SESSION['tareas'] es un arreglo que guarda las tareas de cada usuario
		{
				echo "<hr><h2>Tareas Guardadas:</h2>";
				
					foreach ($_SESSION['tareas'][$_SESSION['usuario']] as $i => $tarea) // si ya tiene, entonces un foreach recorre y muestra una por una las tareas, del usuario que esta en la pagina
					{
						echo "<p><b>Materia:</b> {$tarea['materia']}<br>";
						echo "<b>Título:</b> {$tarea['titulo']}<br>";
						echo "<b>Descripción:</b> {$tarea['descripcion']}<br>";
						echo "<b>Estado:</b> {$tarea['estado']}<br>";
						echo "<b>Vence:</b> {$tarea['vencimiento']}</p>";
				
						echo "<form method='post'>";//boton para modificar estado
						echo "<input type='hidden' name='tipo_formulario' value='modificar_estado'>";
						echo "<input type='hidden' name='indice' value='$i'>";
			
						foreach (['Pendiente', 'En progreso', 'Completada'] as $estado) // formulario para elegir el nuevo estado
						{
							$checked = ($tarea['estado'] === $estado) ? 'checked' : '';//el estado nuevo esta $checked
							echo "<label><input type='radio' name='nuevo_estado' value='$estado' $checked required> $estado</label><br>";
						}
						echo "<input type='submit' value='Cambiar Estado'>";
						echo "</form><hr>";
					}
					//Este es el boton que aparece para crear nueva Tarea cuando se muestra la lista de tareas guardadas
					echo "<form method='post'>";
					echo "<input type='hidden' name='tipo_formulario' value='nuevo_formulario'>";
					echo "<input type='submit' value='Crear Nueva Tarea'>";
					echo "</form>";
		
				if ($formularioVisible) //formulario de nueva tarea
				{
					echo "<h3>Nueva Tarea</h3>";
					echo "<form method='post'>";
					echo "<input type='hidden' name='tipo_formulario' value='tarea'>";//nombre del formulario
					echo "<p><b>Materia: <input type='text' name='mate' required></b></p>";
					echo "<p><b>Título: <input type='text' name='tit' required></b></p>";
					echo "<p><b>Descripción:</b><br /><textarea name='des' rows='5' cols='30' required></textarea></p>";
		
					echo "<p><b>Estado:</b></p>";//para seleccionar el estado	
					echo "<input type='radio' name='estado' value='Pendiente' required> Pendiente<br>";
					echo "<input type='radio' name='estado' value='En progreso'> En progreso<br>";
					echo "<input type='radio' name='estado' value='Completada'> Completada<br><br>";
					echo "<p><b>Fecha de vencimiento: <input type='date' name='vencimiento' required></b></p>";
					echo "<input type='submit' value='Guardar Tarea'>";
					echo "</form>";
				}
		} 
		else //si el usuario no tiene tareas
		{
			// Sino tiene tareas todavia, mostrar el formulario en blanco directamente
			echo "<h3>Primera Tarea</h3>";
			echo "<form method='post'>";
			echo "<input type='hidden' name='tipo_formulario' value='tarea'>";//nombre del formulario
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
	// Formulario de contraseña, el formulario principal, para ingresar contrasenas
	echo "<form method='post'>";
	echo "<input type='hidden' name='tipo_formulario' value='contrasena'>";//nombre del formulario
	// Si ya tenemos guardado el nombre de usuario, mostrarlo en el campo
	$nombre_guardado = $_SESSION['usuario'] ?? '';
	
	echo "<p><b>Nombre de Usuario: <input type='text' name='usuario' value='" . htmlspecialchars($nombre_guardado) . "' required /></b></p>";
	echo "<p><b>Ingrese contraseña: <input type='password' name='contra' required /></b></p>";
	echo "<p><b>Confirme contraseña: <input type='password' name='contra2' required /></b></p>";
	echo "<br /><br />";
	echo "<input type='submit' value='Validar'>";
	echo "</form>";
}

?>

</body>
</html>