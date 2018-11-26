<?php
if(isset($_POST["correo"])&&isset($_POST["contra"])){
    include 'servidor.php';
    $conn = new mysqli($server, $user, $pass, $basededatos);
    if (!$conn)
    {
        die ("Fallo al conectar a MySQL: " . mysqli_connect_error());
    }
    $correo=$_POST['correo'];
    $contra=$_POST['contra'];
    $query= "SELECT * FROM usuarios WHERE Email='$correo' AND Pass='$contra'";
    $resultado=mysqli_query($conn,$query);
    if (!$resultado) { 
         echo "Error consultando a la base de datos ";
    }
    else if (empty($resultado)) { 
        echo "Error datos incorrectos"; 
    }
    else{
        header('Location: layout.php?op=usuario&correo='.$correo.'');
    }
    $resultado->close();
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