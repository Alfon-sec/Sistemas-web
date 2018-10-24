<?php 

$local=0; //0 para la aplicación en 000WebHost
if ($local==1){
$server="localhost";
$user="root";
$pass="isomendar69";
$basededatos="Quiz";
}
else{
$server="localhost";
$user="id7157936_preguntas";
$pass="isomendar69";
$basededatos="d7157936_quiz";
}

$conn = new mysqli($server, $user, $pass, $basededatos);
$correo=$_GET['correo'];
$Pregunta=$_GET['Pregunta'];
$RC=$_GET['RC'];
$RI1=$_GET['RI1'];
$RI2=$_GET['RI2'];
$RI3=$_GET['RI3'];
$Complejidad=$_GET['complejidad'];
$tema=$_GET['tema'];

if($conn -> connect_error){
	//die("Conexion fallida" . $conn->connect_error);
	echo("error al conectarse");
	echo'<span><a href="pregunta.html">Insertar Pregunta</a></spam>';
}

$insertar="INSERT INTO Preguntas (Nombre, Enunciado, Respuesta_Correcta, Respuesta_Incorrecta1, Respuesta_Incorrecta2, Respuesta_Incorrecta3, Complejidad, Tema) VALUES ('$correo','$Pregunta', '$RC', '$RI1', '$RI2', '$RI3', '$Complejidad', '$tema')";

if($conn->query($insertar)==true){
	echo("Insertado con exito");
	echo'<span><a href="VerPreguntas.php">Ver las preguntas</a></spam>';
	//include("VerPreguntas.php");
}
else{
	echo("error al insertarlo");
	echo'<span><a href="pregunta.html">Insertar Pregunta</a></spam>';
}
?>
