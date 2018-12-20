<?php
session_start();
if(isset($_REQUEST["correo"])){
	if((!isset($_SESSION['email']))||(empty($_SESSION['email']))){
		header('Location: layout.php?');
	}
	else{
		$correo=$_REQUEST['correo'];
	}
}
else{
$correo=0;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Preguntas</title>
    <link rel='stylesheet' type='text/css' href='estilos/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='estilos/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='estilos/smartphone.css' />
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
		<span class="right"><a href="Registrar.php" id='REG'>Registrarse</a></span>
      	<span class="right"><a href="Login.php" id='IN'>Login</a></span>
      	<span class="right"><a href="Logout.php" id='OUT'>Logout</a></span>
      	<span class="right"><a  id='NOM'> <?php echo ("$correo"); ?> </a></span>
		<h2>Quiz: el juego de las preguntas</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href=" ">Inicio</a></spam>
		<span><a href='creditos.html'id= 'Creditos'>Creditos</a></spam>
		<span><a href='<?php echo("GestionarPreguntas.php?correo=$correo"); ?>' id= 'pregunta'>Gestionar Preguntas</a></spam> 
		<span><a href='<?php echo("GestionarCuentas.php?correo=$correo"); ?>' id= 'Upregunta'>Gestionar Correos</a></spam>
		<span><a href='<?php echo("Cambiar_contrasena.php?"); ?>' id= 'MC'>Modificar Contraseña</a></spam>   
	</nav>
    <section class="main" id="s1">
    
	<div id='capa'>
	
	</div>
    </section>
	<footer class='main' id='f1'>
		<a href='https://github.com/alfonsoRespila/Sistemas-Web/tree/origin'>Link GITHUB</a>
	</footer>
</div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script>

	 $("#pregunta").click(function(){
     	alapregunta();
     	return false;
       });
     
     function alapregunta(){
		$('#capa').load($("#pregunta").attr("href"));
	}

	 $("#Creditos").click(function(){
     	aloscreditos();
     	return false;
     });
 
     function aloscreditos(){
		$('#capa').load($("#Creditos").attr("href"));
	}

	 $("#Vpregunta").click(function(){
     	averpreguntas();
     	return false;
       });
     
     function averpreguntas(){
		$('#capa').load($("#Vpregunta").attr("href"));
	}
	 $("#Upregunta").click(function(){
     	averusuarios();
     	return false;
       });
     
     function averusuarios(){
		$('#capa').load($("#Upregunta").attr("href"));
	}
	$("#MC").click(function(){
     	MODC();
     	return false;
       });
     
     function MODC(){
		$('#capa').load($("#MC").attr("href"));
	}
	$("#juego").click(function(){
     	jugar();
     	return false;
       });
     
     function jugar(){
		$('#capa').load($("#juego").attr("href"));
	}
	$("#REG").click(function(){
     	areg();
     	return false;
       });
     
     function areg(){
		$('#capa').load($("#REG").attr("href"));
	}


	$("#IN").click(function(){
     	ain();
     	return false;
       });
     
     function ain(){
		$('#capa').load($("#IN").attr("href"));
	}

	$("#OUT").click(function(){
     	aout();
     	return false;
       });
     
     function aout(){
		$('#capa').load($("#OUT").attr("href"));
	}

		params = (new URL(document.location.href)).searchParams;
		$op = params.get("op");
		$cor= params.get("correo");
		if($op=="usuario"){
			 alert ('BIENVENIDO');
			document.getElementById("IN").style="display:none;";
			document.getElementById("OUT").style="display:block;";
			document.getElementById("MC").style="display:none;";
			if($cor=="admin@ehu.eus")
			{
			document.getElementById("Upregunta").style="display:block;";
			document.getElementById("REG").style="display:none;";
			document.getElementById("NOM").style="display:block;";
			document.getElementById("pregunta").style="display:none;";	
			}
			else{
			document.getElementById("REG").style="display:none;";
			document.getElementById("NOM").style="display:block;";
			document.getElementById("pregunta").style="display:block;";	
			document.getElementById("Upregunta").style="display:none;";
			}
		}
		else{
			document.getElementById("OUT").style="display:none;";
			document.getElementById("NOM").style="display:none;";
			document.getElementById("pregunta").style="display:none;";
			document.getElementById("IN").style="display:block;"
			document.getElementById("REG").style="display:block;"
			document.getElementById("Upregunta").style="display:none;";
			document.getElementById("MC").style="display:block;";
		}
	</script>
</body>
</html>
