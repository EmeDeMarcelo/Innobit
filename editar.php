<?php  
	session_start();
	if (!isset($_GET['id'])) {
		header('Location: index.php');
	}

	


	if (!isset($_SESSION['nombre'])) {
		header('Location: login.php');
	}elseif(isset($_SESSION['nombre'])){
		include 'model/conexion.php';
		$id = $_GET['id'];

		$sentencia = $bd->prepare("SELECT * FROM alumno WHERE id_alumno = ?;");
		$sentencia->execute([$id]);
		$persona = $sentencia->fetch(PDO::FETCH_OBJ);
		//print_r($persona);
	}else{
		echo "Error en el sistema";
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar Alumno</title>
	<meta charset="utf-8">
</head>
<body>
	<center>
		<h3>Editar alumno:</h3>
		<form method="POST" action="editarProceso.php">
			<table>
				<tr>
					<td>Apellido paterno: </td>
					<td><input type="text" name="txt2Paterno" value="<?php echo $persona->ap_paterno; ?>"></td>
				</tr>
				<tr>
					<td>Apellido materno: </td>
					<td><input type="text" name="txt2Materno" value="<?php echo $persona->ap_materno; ?>"></td>
				</tr>
				<tr>
					<td>Nombre: </td>
					<td><input type="text" name="txt2Nombre" value="<?php echo $persona->nombre; ?>"></td>
				</tr>
				<tr>
					<td>Examen parcial: </td>
					<td><input type="text" name="txt2Parcial" value="<?php echo $persona->ex_parcial; ?>"></td>
				</tr>
				<tr>
					<td>Examen final: </td>
					<td><input type="text" name="txt2Final" value="<?php echo $persona->ex_final; ?>"></td>
				</tr>
				<tr>
					<input type="hidden" name="oculto">
					<input type="hidden" name="id2" value="<?php echo $persona->id_alumno; ?>">
					<td colspan="2"><input type="submit" value="EDITAR ALUMNO"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>