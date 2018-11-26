 <?php
    if((isset($_POST["email"]))&&(isset($_POST["nombre"])&&isset($_POST["password"]))){                                
                                include 'servidor.php';
                                $conn = new mysqli($server, $user, $pass, $basededatos);
                                if($conn -> connect_error)
                                {
                                //die("Conexion fallida" . $conn->connect_error);
                                echo("error al conectarse");
                                }

                                $email=trim($_POST["email"]);
                                $contraseña=trim($_POST["password"]);
                                $nombre=trim($_POST["nombre"]);
                               
                                     $insertar="INSERT INTO usuarios(Email, Nombre, Pass) VALUES('$email', '$nombre', '$contraseña')";
                                     if($conn->query($insertar)==true){
                                    //header('Location: layout.html?op=usuario');
                                          echo"<a href='layout.php?op=usuario&correo=".$email."'>Acceso a los usuarios</a>";
                                    #&correo="+$email+
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

    <script>
        var boton=1;
       document.getElementById("email").onblur = function() {return checkEmail()};
        function checkEmail() {
          var correo = document.getElementById("email").value;
          var xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function() {
            
            if ( xmlhttp.readyState == 4 &&  xmlhttp.status == 200) {
              alert(xmlhttp.responseText);
              var response = (xmlhttp.responseText);
              if (response == "Correcto" )
              {   
                alert("bien");    
              }
              else{
                alert("mal");
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
              if(var3.localeCompare("VALIDA")){
                 document.getElementById('submit').disabled=false;
                 return true;
              }
              else{
              document.getElementById('submit').disabled=true;
              return false;
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