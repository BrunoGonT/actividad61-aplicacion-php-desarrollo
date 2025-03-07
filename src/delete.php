<?php
// Incluye el fichero con los parámetros de conexión a la base de datos
include("config.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Personaje</title>
</head>
<body>
<div>
	<header>
		<h1>Ratchet & Clank - Base de Datos de Personajes</h1>
	</header>
	<main>

<?php
// Obtiene el id del personaje a eliminar desde la URL mediante el método GET
$idpersonaje = $_GET['idpersonaje'];

// Protege caracteres especiales en la cadena para evitar inyecciones SQL
$idpersonaje = $mysqli->real_escape_string($idpersonaje);

// Verifica si el personaje existe antes de eliminarlo
$check = $mysqli->query("SELECT * FROM personajes_rc WHERE id = $idpersonaje");

if ($check->num_rows > 0) {
    // Se realiza la eliminación del personaje
    $result = $mysqli->query("DELETE FROM personajes_rc WHERE id = $idpersonaje");
    echo "<div>Personaje eliminado correctamente...</div>";
} else {
    echo "<div>Error: El personaje no existe.</div>";
}

// Se cierra la conexión a la base de datos
$mysqli->close();

echo "<a href='index.php'>Ver lista de personajes</a>";
?>

    </main>
</div>
</body>
</html>
