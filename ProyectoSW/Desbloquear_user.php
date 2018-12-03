<?php 
include ("seguridad.php");
include 'servidor.php';
$conn = new mysqli($server, $user, $pass, $basededatos);
$correo=$_REQUEST['usercorreobloq'];
if($conn -> connect_error){
	//die("Conexion fallida" . $conn->connect_error);
	echo("error al conectarse");
	echo'<span><a href="layout.html?op=usuario">Volver</a></spam>';
}
if((preg_match("/^[a-z A-Z]+([0-9]{3})+@ikasle.ehu.eus$/",$correo))){
		$eliminar="UPDATE usuarios SET Bloqueado=false WHERE Email='$correo'";
		if($conn->query($eliminar)==FALSE){
			echo("error al insertar los datos en la BD");
		}
 }
else{
 	echo("<script>alert('error uno de los campos no se ha rellenado correctamente')</script>");
 }

?>