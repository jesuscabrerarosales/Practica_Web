<?php

include("Model/Conexion.php");
$con=__construct();

$cod_estudiante=$_POST['cod_estudiante'];
$dni=$_POST['dni'];
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];

$sql="UPDATE alumnos SET dni='$dni',nombres='$nombres',apellidos='$apellidos' WHERE cod_estudiante='$cod_estudiante'";
$query=mysqli_query($con,$sql);

if($query){
	Header("Location: alumno.php");
}
?>