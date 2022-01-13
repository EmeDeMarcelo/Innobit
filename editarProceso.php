<?php 
	//print_r($_POST);
	if (!isset($_POST['oculto'])) {
		header('Location: index.php');
	}

	include 'model/conexion.php';
	$id2 = $_POST['id2'];
	$paterno2 = $_POST['txt2Paterno'];
	$materno2 = $_POST['txt2Materno'];
	$nombre2 = $_POST['txt2Nombre'];
	$parcial2 = $_POST['txt2Parcial'];
	$final2 = $_POST['txt2Final'];

	$sentencia = $bd->prepare("UPDATE alumno SET ap_paterno = ?, ap_materno = ?, nombre = ?, 
												ex_parcial = ?, ex_final = ? WHERE id_alumno = ?;");
	$resultado = $sentencia->execute([$paterno2,$materno2,$nombre2,$parcial2,$final2, $id2]);

	if ($resultado === TRUE) {
		header('Location: index.php');
	}else{
		echo "Error";
	}
?>