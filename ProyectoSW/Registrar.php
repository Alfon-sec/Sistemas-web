 <?php
    if(isset($_POST["email"])&&isset($_POST["nombre"])&&isset($_POST["password"])){
                                $local=1; //0 para la aplicación en 000WebHost
                                 if ($local==1){
                                    $server="localhost";
                                    $user="root";
                                    $pass="isomendar69";
                                    $basededatos="quiz";
                                }
                                else{
                                    $server="localhost";
                                    $user="id7157936_preguntas";
                                    $pass="isomendar69";
                                    $basededatos="id7157936_quiz";
                                }
                                $conn = new mysqli($server, $user, $pass, $basededatos);
                                if($conn -> connect_error){
                                //die("Conexion fallida" . $conn->connect_error);
                                echo("error al conectarse");
                                }
                                $email=trim($_POST["email"]);
                                $contraseña=trim($_POST["password"]);
                                $nombre=trim($_POST["nombre"]);
                                $insertar="INSERT INTO usuarios(Email, Nombre, Pass) VALUES('$email', '$nombre', '$contraseña')";
                                if($conn->query($insertar)==true){
                              		 echo("<script> alert ('BIENVENIDO AL SISTEMA:". $nombre . "')</script>");
									echo ("Login correcto<p><a href=layout.html?op=usuario>Puede insertar preguntas</a>");}
                                else{
                                	 echo("No Insertado con exito");
                                }
                              
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
<form action="Registrar.php" method="POST"> 
    <label>Email*:</label>
    <input type="text" name="email" id="email" maxlength="50"><br>
    <label>Nombre y apellidos*:</label>
    <input type="text" name="nombre" id="nombre" maxlength="50"><br>
    <label>Contraseña*:</label>
    <input type="password" name="password" id="password"><br>
    <label>Repetir Contraseña*:</label>
    <input type="password" name="password2" id="password2"><br>
    <label>Botón de enviar</label>
    <input type="submit" value="submit" id="submit"><br>

    <input type="text" id="validacion" size= "100" disabled/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>
        var patronemail= /^[a-z A-Z]+([0-9]{3})+@ikasle.ehu.eus$/;
        var contra= /^([a-z A-Z0-9]{8,})$/;
        var nomb= /^(([a-z A-Z]{1,})+[\s]+([a-z A-Z]{1,}))$/;
    $("#submit").click(function(){
        return envia();
     });
     function envia(){
        if(($("#email").val()!='') &&($("#nombre").val()!='')&& ($("#password").val()!='')&&($("#paswword2").val()!='')){
            $('#validacion').val('');
            $('#validacion').css('background','white');
             if($('#email').val().match(patronemail)){
                $('#validacion').val('');
                $('#validacion').css('background','white');
                if($("#nombre").val().match(nomb)){
                     $('#validacion').val('');
                     $('#validacion').css('background','white');
                    if($("#password").val().match(contra)){
                        $('#validacion').val('');
                        $('#validacion').css('background','white');
                        if(($("#password").val())==($("#password2").val())){
                            $('#validacion').val('');
                            $('#validacion').css('background','white'); 
                        }
                        else{
                            $('#validacion').val('las contraseñas no coinciden');
                            $('#validacion').css('background','red');
                            $('#validacion').css('color','black');  
                             return false;
                        }
                    }
                    else{
                        $('#validacion').val('contraseña incorrecta necesitas ser de longitud 8 minimo');
                        $('#validacion').css('background','red');
                        $('#validacion').css('color','black');  
                        return false;
                    }
                }
                else{
                    $('#validacion').val('introduce un nombre y al menos 1 apellido');
                    $('#validacion').css('background','red');
                    $('#validacion').css('color','black');  
                     return false;
                }
            }
            else{
                     $('#validacion').val(' el correo tiene que tener formato EHU/UPV');
                     $('#validacion').css('background','red');
                    $('#validacion').css('color','black'); 
                    return false;  
            }
        }
         else{
                $('#validacion').val(' completa todos los campos obligatorios');
                 $('#validacion').css('background','red');
                 $('#validacion').css('color','black');  
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