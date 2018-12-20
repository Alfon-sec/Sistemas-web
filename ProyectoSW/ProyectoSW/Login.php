<?php
if(isset($_REQUEST["correo"])&&isset($_REQUEST["contra"])){
    include 'servidor.php';
    $conn = new mysqli($server, $user, $pass, $basededatos);
    if (!$conn)
    {
        die ("Fallo al conectar a MySQL: " . mysqli_connect_error());
    }
    $correo=$_REQUEST['correo'];
    $contra=$_REQUEST['contra'];
    $query= "SELECT * FROM usuarios WHERE Email='$correo' AND Pass=MD5('$contra')";
    $result=mysqli_query($conn, $query);
    $row= mysqli_fetch_array($result); 
   if (mysqli_num_rows($result) == 0) { 
         echo "<script>alert('fallo al buscar al user');</script>";
         echo ("<a href=layout.php?op=otros>Volver</a>");
    }
    else if ($row['Bloqueado'] == 1) { 
        echo "Error Bloqueado"; 
    }
    else{
    	session_start();
		$_SESSION["email"]= $correo;
        header('Location: layout.php?op=usuario&correo='.$correo.'');
    }
    $result->close();
    mysqli_close($conn);
}
else{
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
    <title>Registrar</title>
</head>
<body>
<form action="Login.php" method="POST"> 
    <h1 align="center"> Login </h1><br>
    <li>
    <label>Direccion de correo*:</label>
    <input type="text" name="correo" id="correo" placeholder="correo" >
    </li><br>
    <li>
    <label>Contraseña:</label>
    <input type="password" name="contra" id="contra" placeholder="contraseña">
    </li><br>
    <label>Botón de enviar</label>
    <input type="submit" value="submit" id="submit"><br>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
     <script>
     $("#submit").click(function(){
        return envia();
     });
     function envia(){
          if(($("#email").val()!='') &&($("#contraseña").val()!='')){
            
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