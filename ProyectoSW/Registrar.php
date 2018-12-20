 <?php
    if((isset($_REQUEST["email"]))&&(isset($_REQUEST["nombre"])&&isset($_REQUEST["password"]))){                                
                                include 'servidor.php';
                                $conn = new mysqli($server, $user, $pass, $basededatos);
                                if($conn -> connect_error)
                                {
                                //die("Conexion fallida" . $conn->connect_error);
                                echo("error al conectarse");
                                }

                                $email=trim($_REQUEST["email"]);
                                $contraseña=trim($_REQUEST["password"]);
                                $nombre=trim($_REQUEST["nombre"]);
                               
                                     $insertar="INSERT INTO usuarios(Email, Nombre, Pass) VALUES('$email', '$nombre', MD5('$contraseña'))";
                                     if($conn->query($insertar)==true){
                                        session_start();
                                        $_SESSION["email"]= $correo;
                                        echo ("<a href=layout.php?op=usuario&correo=".$email.">Acceder</a>");
                                    }
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
<form id="reg" name="reg" action="Registrar.php" method="POST"> 
    <label>Email*:</label>
    <input type="text" name="email" id="email" maxlength="50"><br>
    <label>Nombre y apellidos*:</label>
    <input type="text" name="nombre" id="nombre" maxlength="50"><br>
    <label>Contraseña*:</label>
    <input type="password" name="password" id="password"><br>
    <label>Repetir Contraseña*:</label>
    <input type="password" name="password2" id="password2"><br>
    <label>Botón de enviar</label>
    <input type="submit" value="submit" id="submit"disabled><br>
    <input type="text" id="validacion" size= "100" disabled/>
    <input type="text" id="correoval" size= "100" disabled/>
    <input type="text" id="contrasenamal" size= "100" disabled/>

    <script>

       document.getElementById("email").onblur = function() {return checkEmail()};
        function checkEmail() {
          var correo = document.getElementById("email").value;
          var xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function() {
            
            if ( xmlhttp.readyState == 4 &&  xmlhttp.status == 200) {
              alert(xmlhttp.responseText);
              var response = xmlhttp.responseText;
              if (response.trim()==="Correcto")
              {   
                if(document.getElementById('contrasenamal').value=="contrasena_correcta"){
                	document.getElementById('submit').disabled=false;
                	} 
                	document.getElementById('correoval').value="correo_correcto"; 
              }
              else if (response.trim()==="Correo_repetido"){
                document.getElementById('correoval').value="correo_ya_registrado";
                document.getElementById('submit').disabled=true;
              }
              else{
              	document.getElementById('correoval').value="correo_mal";
                document.getElementById('submit').disabled=true;
              }

            }

            };
            xmlhttp.open('GET', 'Correo_Valido.php?correo=' + correo, true);
          xmlhttp.send();
        }

       document.getElementById("password").onblur = function() {return checkpass()};
        function checkpass() {
          var contraseña = document.getElementById("password").value;
          var xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function() {
            
            if (this.readyState == 4 && this.status == 200) {
              alert(this.responseText);
              var var3=this.responseText;
              if(var3.trim()==="VALIDA"){
                if(document.getElementById('correoval').value=="correo_correcto")
                {
                document.getElementById('submit').disabled=false;
                } 
                document.getElementById('contrasenamal').value="contrasena_correcta";  
              }
              else{
                document.getElementById('contrasenamal').value="contrasena_incorrecta";
                document.getElementById('submit').disabled=true;
              }
              
            }
          };
            xmlhttp.open('GET','Contrasena_Valida.php?contrasena=' + contraseña, true);
          xmlhttp.send();
        }

    </script>  

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>
        var contra= /^([a-z A-Z0-9]{8,})$/;
        var nomb= /^(([a-z A-Z]{1,})+[\s]+([a-z A-Z]{1,}))$/;

    $("#submit").click(function(){
        return envia();
     });

     function envia(){
        if(($("#email").val()!='') &&($("#nombre").val()!='')&& ($("#password").val()!='')&&($("#paswword2").val()!='')){
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