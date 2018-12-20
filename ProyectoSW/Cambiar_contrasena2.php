 <?php
if(isset($_REQUEST["correo"])&&(isset($_REQUEST["con1"]))&&(isset($_REQUEST["code"]))){
	 $code=$_REQUEST["code"];
   	 $correo=$_REQUEST["correo"];
   	 $con1=$_REQUEST["con1"];
		 include 'servidor.php';
    	 $conn = new mysqli($server, $user, $pass, $basededatos);
    	 if (!$conn)
   		 {
        	die ("Fallo al conectar a MySQL: " . mysqli_connect_error());
   		 }
   		$query= "UPDATE usuarios SET Pass=MD5('$con1') WHERE Email='$correo'";
    	if(mysqli_query($conn, $query)){
    		echo"<script>alert('contraseña cambiada');</script>";
        echo ("<a href=layout.php?op=otros>Acceder</a>");
    	}
    	else{
    		die("Error vuelve a intentarlo ");
    	}	
}
else{
$correo=$_REQUEST["email"];
$code=$_REQUEST["code"];

 ?>
 <!DOCTYPE html>
<html>
<head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
    <title>Cambiar Contrasena</title>
</head>
<body>
<form action="Cambiar_contrasena2.php" method="POST"> 
    <h1 align="center"> Introduce tu correo para recibir el mensaje </h1><br>
    <li>
    <label>Direccion de correo*:</label>
    <input type="text" name="correo" id="correo" placeholder="correo" >
    </li><br>
    <li>
    <label>Codigo:</label>
    <input type="text" name="code" id="code" placeholder="codigo" >
    </li><br>
    <li>
    <label>Contraseña nueva:</label>
    <input type="text" name="con1" id="con1" placeholder="con1" >
    </li><br>
    <li>
    <label> Repetir Contraseña:</label>
    <input type="text" name="con2" id="con2" placeholder="con2" >
    </li><br>
    <li>
    <label>Botón de enviar</label>
    <input type="submit" value="submit" id="submit"><br>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
     <script>
     $("#submit").click(function(){
        return envia();
     });
     var cor="<?php echo $correo ;?>";
     var cod="<?php echo $code ;?>";
     function envia(){
          if(($("#correo").val()!='')&&($("#code").val()!='')&&($("#con1").val()!='')&&($("#con2").val()!='')){
          	if($("#con1").val()== ($("#con2").val())){
                  if((($("#correo").val())==cor)&&(($("#code").val())==cod)){
                    alert("envia");
                    return true;
                  }
                  else{
                    alert("codigo o correo incorrectos");
                    return false;
                  }
             }
            else{
            	alert("las contraseñas no coinciden");
            	return false;
            }
          }
          else{
          	alert("rellena todos los campos");
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