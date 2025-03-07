<?php
// Incluye el archivo de configuración de la base de datos
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Registro de Personajes</title>
</head>
<body>
<div>
	<header>
		<h1>Ratchet & Clank - Registro de Personajes</h1>
	</header>
	<main>

<?php
// Se comprueba si el formulario ha sido enviado
if(isset($_POST['inserta'])) 
{
	// Se obtienen los datos del formulario de alta
	$name = $mysqli->real_escape_string($_POST['name']);
	$species = $mysqli->real_escape_string($_POST['species']);
	$age = $mysqli->real_escape_string($_POST['age']);
	$role = $mysqli->real_escape_string($_POST['role']);
	$threat_level = $mysqli->real_escape_string($_POST['threat_level']);

	// Se comprueba si hay campos vacíos
	if(empty($name) || empty($species) || empty($age) || empty($role) || empty($threat_level)) 
	{
		if(empty($name)) {
			echo "<div>⚠️ Campo nombre vacío.</div>";
		}

		if(empty($species)) {
			echo "<div>⚠️ Campo especie vacío.</div>";
		}

		if(empty($age)) {
			echo "<div>⚠️ Campo edad vacío.</div>";
		}

		if(empty($role)) {
			echo "<div>⚠️ Campo rol vacío.</div>";
		}

		if(empty($threat_level)) {
			echo "<div>⚠️ Campo nivel de amenaza vacío.</div>";
		}

		// Cierra la conexión y muestra opción para volver atrás
		$mysqli->close();
		echo "<a href='javascript:self.history.back();'>🔙 Volver atrás</a>";
	} 
	else 
	{
		// Inserta el nuevo personaje en la base de datos
		$result = $mysqli->query("INSERT INTO personajes (nombre, especie, edad, rol, nivel_amenaza) VALUES ('$name', '$species', '$age', '$role', '$threat_level')");	

		// Cierra la conexión y muestra mensaje de éxito
		$mysqli->close();
		echo "<div>✅ Personaje añadido correctamente...</div>";
		echo "<a href='index.php'>🌌 Ver personajes</a>";
	}
}
?>

	</main>
</div>
</body>
</html>
