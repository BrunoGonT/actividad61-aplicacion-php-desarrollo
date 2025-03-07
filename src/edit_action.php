<?php
// Incluye el fichero con los parámetros de conexión a la base de datos
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Ratchet & Clank - Editar Personaje</title>
</head>
<body>
<div>
	<header>
		<h1>Ratchet & Clank - Base de Datos de Personajes</h1>
	</header>
	<main>				

<?php
// Se comprueba si se ha llegado a esta página a través del formulario de edición
if(isset($_POST['modifica'])) {
	// Se obtienen los datos del personaje desde el formulario
	$idpersonaje = $mysqli->real_escape_string($_POST['idpersonaje']);
	$nombre = $mysqli->real_escape_string($_POST['nombre']);
	$especie = $mysqli->real_escape_string($_POST['especie']);
	$edad = $mysqli->real_escape_string($_POST['edad']);
	$rol = $mysqli->real_escape_string($_POST['rol']);
	$nivel_amenaza = $mysqli->real_escape_string($_POST['nivel_amenaza']);

	// Se comprueba si existen campos vacíos
	if(empty($nombre) || empty($especie) || empty($edad) || empty($rol) || empty($nivel_amenaza)) {
		if(empty($nombre)) {
			echo "<font color='red'>El campo 'Nombre' está vacío.</font><br/>";
		}

		if(empty($especie)) {
			echo "<font color='red'>El campo 'Especie' está vacío.</font><br/>";
		}

		if(empty($edad)) {
			echo "<font color='red'>El campo 'Edad' está vacío.</font><br/>";
		}

		if(empty($rol)) {
			echo "<font color='red'>El campo 'Rol' está vacío.</font><br/>";
		}

		if(empty($nivel_amenaza)) {
			echo "<font color='red'>El campo 'Nivel de Amenaza' está vacío.</font><br/>";
		}
	} else {
		
		$mysqli->query("UPDATE personajes_rc SET nombre = '$nombre', especie = '$especie', edad = '$edad', rol = '$rol', nivel_amenaza = '$nivel_amenaza' WHERE id = $idpersonaje");
		$mysqli->close();
        
        echo "<div>Personaje editado correctamente...</div>";
		echo "<a href='index.php'>Ver lista de personajes</a>";
	}
}
?>

	</main>	
</div>
</body>
</html>

