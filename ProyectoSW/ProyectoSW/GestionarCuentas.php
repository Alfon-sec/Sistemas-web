 <?php
  session_start();
 $correo=$_REQUEST['correo'];
  if((!isset($_SESSION['email']))||(empty($_SESSION['email']))){
        header('Location: layout.php?');
    }
 ?>
 <!DOCTYPE html>
<html>
<head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Gestionar Usuarios</title>
<script>
XMLHttpRequestObject = new XMLHttpRequest();
XMLHttpRequestObject.onreadystatechange = function()
{
if (XMLHttpRequestObject.readyState==4)
{var obj = document.getElementById('resultado');
obj.innerHTML = XMLHttpRequestObject.responseText;}
}
function pedirDatos()
{
XMLHttpRequestObject.open("GET",'VerUsers.php',true);
XMLHttpRequestObject.setRequestHeader("Content-type","application/x-www-form-urlencoded");
XMLHttpRequestObject.send();
}
</script> 


<script>
     function eliminaruser(){
        if(($("#usercorreo").val()!='')){
                                var str=$("#fuser").serialize();
                                 $.ajax({
                                    url: 'BorrarUsuario.php',
                                    data: str,
                                    beforeSend:function(){
                                        $('#resultado').html('<img src="load.gif" height="50"/>');
                                    },
                                    success:function(){
                                        $("#resultado").load("VerUsers.php?");
                                    },
                                    error:function(){
                                        $('#resultado').fadeIn().html('<p class="error"><strong>El servidor parece que no responde</p>');
                                    }
                                });
                                return true;
        }
        else{
           $('#resultado').fadeIn().html('<p class="error"><strong>pon un correo</p>'); 
        }
        }

</script>

<script>
     function bloquser(){
        if(($("#usercorreobloq").val()!='')){
                                var str=$("#fuser").serialize();
                                 $.ajax({
                                    url: 'Bloquear_user.php',
                                    data: str,
                                    beforeSend:function(){
                                        $('#resultado').html('<img src="load.gif" height="50"/>');
                                    },
                                    success:function(){
                                        $("#resultado").load("VerUsers.php?");
                                    },
                                    error:function(){
                                        $('#resultado').fadeIn().html('<p class="error"><strong>El servidor parece que no responde</p>');
                                    }
                                });
                                return true;
        }
        else{
           $('#resultado').fadeIn().html('<p class="error"><strong>pon un correo</p>'); 
        }
        }

</script>


<script>
     function desbloquser(){
        if(($("#usercorreobloq").val()!='')){
                                var str=$("#fuser").serialize();
                                 $.ajax({
                                    url: 'Desbloquear_user.php',
                                    data: str,
                                    beforeSend:function(){
                                        $('#resultado').html('<img src="load.gif" height="50"/>');
                                    },
                                    success:function(){
                                        $("#resultado").load("VerUsers.php?");
                                    },
                                    error:function(){
                                        $('#resultado').fadeIn().html('<p class="error"><strong>El servidor parece que no responde</p>');
                                    }
                                });
                                return true;
        }
        else{
           $('#resultado').fadeIn().html('<p class="error"><strong>pon un correo</p>'); 
        }
        }

</script>
</head>
<body>
<form id="fuser" name='fuser'>


<div id="borrar"style="background-color:#804515;>
<h1 align="center"> Borrar Usuarios </h1><br>
<br>
	<label>Correo del usuario a borrar:</label>
<br>
    <input type="text" name="usercorreo" id="usercorreo"placeholder="correo" >
<br>
 <li>
     <input type="button" name="eliminarusers" id="eliminarusers" value="eliminar usuario" onclick ="eliminaruser()">
</li>
<br>
</div>


<div id="bloquear"style="background-color:#AA6C39;>
<h1 align="center"> Bloquear/desbloquear Usuarios </h1><br>
<br>
	<label>Correo del usuario a bloquear/desbloquear:</label>
<br>
    <input type="text" name="usercorreobloq" id="usercorreobloq"placeholder="correo" >
<br>
 <li>
     <input type="button" name="bloqusers" id="bloqusers" value="bloquear usuario" onclick ="bloquser()">
     <input type="button" name="desbloqusers" id="desbloqusers" value="desbloquear usuario" onclick ="desbloquser()">
</li>
<br>
</div>


<div id="preguntas"style="background-color:#D49A6A;>
<h1 align="center"> Ver Usuarios </h1><br>

 <li>
     <input type="button" name="verusers" id="verusers" value="ver usuarios" onclick ="pedirDatos()">
</li><br>
</div>

<div>


<div id="resultado" style="background-color:#FFD1AA;">


<p>Aquí aparecerán los usuarios</p> 

</div>


</form>
</body>
</html>
