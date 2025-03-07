<?php
// Incluye el fichero con los parámetros de conexión a la base de datos
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Ratchet & Clank - Modificar Personaje</title>
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
	<h2>Modificación de Personaje</h2>

<?php
// Obtiene el id del personaje a modificar desde la URL usando el método GET
$idpersonaje = $_GET['idpersonaje'];

// Protege el id contra inyecciones SQL
$idpersonaje = $mysqli->real_escape_string($idpersonaje);

// Selecciona el registro del personaje
$resultado = $mysqli->query("SELECT especie, nombre, edad, rol, nivel_amenaza FROM personajes_rc WHERE id = $idpersonaje");

// Extrae los datos y los almacena en el array $fila
$fila = $resultado->fetch_array();
$especie = $fila['especie'];
$nombre = $fila['nombre'];
$edad = $fila['edad'];
$rol = $fila['rol'];
$nivel_amenaza = $fila['nivel_amenaza'];

// Cierra la conexión a la base de datos
$mysqli->close();
?>

<!-- FORMULARIO DE EDICIÓN -->
	<form action="edit_action.php" method="post">
		<div>
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" id="nombre" value="<?php echo $nombre;?>" required>
		</div>

		<div>
			<label for="especie">Especie</label>
			<input type="text" name="especie" id="especie" value="<?php echo $especie;?>" required>
		</div>

		<div>
			<label for="edad">Edad</label>
			<input type="number" name="edad" id="edad" value="<?php echo $edad;?>" required>
		</div>

		<div>
			<label for="rol">Rol</label>
			<select name="rol" id="rol">
				<option value="<?php echo $rol;?>" selected><?php echo $rol;?></option>
				<option value="Héroe y mecánico">Héroe y mecánico</option>
				<option value="Compañero y asistente">Compañero y asistente</option>
				<option value="Dictador corporativo">Dictador corporativo</option>
				<option value="Conquistador galáctico">Conquistador galáctico</option>
				<option value="Falso héroe">Falso héroe</option>
				<option value="Científico malvado">Científico malvado</option>
				<option value="Mercenario de combate">Mercenario de combate</option>
			</select>	
		</div>

		<div>
			<label for="nivel_amenaza">Nivel de Amenaza</label>
			<select name="nivel_amenaza" id="nivel_amenaza">
				<option value="<?php echo $nivel_amenaza;?>" selected><?php echo $nivel_amenaza;?></option>
				<option value="Bajo">Bajo</option>
				<option value="Medio">Medio</option>
				<option value="Alto">Alto</option>
			</select>	
		</div>

		<div>
			<input type="hidden" name="idpersonaje" value="<?php echo $idpersonaje;?>">
			<input type="submit" name="modifica" value="Guardar">
			<input type="button" value="Cancelar" onclick="location.href='index.php'">
		</div>
	</form>
	</main>	
	<footer>
		Created by the IES Miguel Herrero team &copy; 2025
  	</footer>
</div>
</body>
</html>