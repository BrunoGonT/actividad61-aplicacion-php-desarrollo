<?php
/* Incluye parámetros de conexión a la base de datos */
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Ratchet & Clank - Personajes</title>
</head>
<body>
<div>
	<header>
		<h1>Ratchet & Clank - Base de Datos de Personajes</h1>
	</header>

	<main>
	<ul>
		<li><a href="index.php">Inicio</a></li>
		<li><a href="add.html">Agregar Personaje</a></li>
	</ul>
	<h2>Lista de Personajes</h2>
	<table border="1">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Especie</th>
			<th>Edad</th>
			<th>Rol</th>
			<th>Nivel de Amenaza</th> 
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>

<?php
/* Se consulta la tabla personajes_rc ordenando por especie y nombre */
$resultado = $mysqli->query("SELECT * FROM personajes_rc ORDER BY especie, nombre");

// Cierra la conexión de la BD
$mysqli->close();

// Comprobamos si hay registros
if ($resultado->num_rows > 0) {
	// Recorremos cada fila de la tabla y mostramos los datos
	while($fila = $resultado->fetch_array()) {
		echo "<tr>\n";
		echo "<td>".$fila['nombre']."</td>\n";
		echo "<td>".$fila['especie']."</td>\n";
		echo "<td>".$fila['edad']."</td>\n";
		echo "<td>".$fila['rol']."</td>\n";
		echo "<td>".$fila['nivel_amenaza']."</td>\n"; 
		echo "<td>";
		echo "<a href=\"edit.php?idpersonaje=$fila[id]\">Editar</a> | ";
		echo "<a href=\"delete.php?idpersonaje=$fila[id]\" onClick=\"return confirm('¿Está segur@ que desea eliminar este personaje?')\">Eliminar</a>";
		echo "</td>\n";
		echo "</tr>\n";
	}
}
?>
	</tbody>
	</table>
	</main>
	<footer>
    	Created by the IES Miguel Herrero team &copy; 2025
  	</footer>
</div>
</body>
</html>
