 <?php
if(isset($_REQUEST["correo"])){
	//email destino
	$to=$_REQUEST["correo"];
	//asunto
	$subject="Recuperacion Contrasena";
	//codigo aleatorio
	$code=rand(10000,99999);

	//variables de sesion para la recuperacion
	$mensaje="
	<html>
	<head>
	<title>Recuperacion Contrasena</title>
	</head>
	<body>
	<h3>pasos para recuperar tu contraseña:</h3>
	<ol>
		<li>Entra en el link</li>
		<li> Introduce el codigo proporcionado y la nueva contraseña</li>
		<li> Si todo va bien se te mostrara un mensaje afirmandolo</li>
	</ol>
	<h2> <a href='https://trabajosswalfonso.000webhostapp.com/ProyectoSW/Cambiar_contrasena2.php?email=".$to."&code=".$code."'>Aqui</a></h2>
	<h3>Codigo de recuepracion:</h3>
	<h2>".$code."</h2>
	</body>
	</html>
	";
	//tipo sw contenido
	$headers="MIME-Version: 1.0" . "\r\n";
	$headers .="Content-type: text/html; charset=UTF-8" . "\r\n";

	mail($to,$subject,$mensaje,$headers);
	echo"<script>alert('correo enviado');</script>";
	echo ("<a href=layout.php?op=otros>Acceder</a>");
}
else{

 ?>
 <!DOCTYPE html>
<html>
<head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
    <title>Cambiar Contrasena</title>
</head>
<body>
<form action="Cambiar_contrasena.php" method="POST"> 
    <h1 align="center"> Introduce tu correo para recibir el mensaje </h1><br>
    <li>
    <label>Direccion de correo*:</label>
    <input type="text" name="correo" id="correo" placeholder="correo" >
    </li><br>
    <li>
    <label>Botón de enviar</label>
    <input type="submit" value="submit" id="submit"><br>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
     <script>
     $("#submit").click(function(){
        return envia();
     });
     function envia(){
          if($("#email").val()!=''){
            
            return true;
          }
          else{
            return false;
          }
     }
 </script>
</form>
</body>
</html>
<?php
}
?>