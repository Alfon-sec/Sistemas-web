 <?php
 $correo=$_GET['correo'];
 ?>
 <!DOCTYPE html>
<html>
<head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Pregunta</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
	var patronemail= /^[a-z A-Z]+([0-9]{3})+@ikasle.ehu.eus$/;
	var comp= /^([0-5]{1})$/;
	
     function mandarDatos(){
     				if(($("#Pregunta").val()!='') &&($("#RC").val()!='')&& ($("#RI1").val()!='')&& ($("#RI2").val()!='')&& ($("#RI3").val()!='')&& ($("#tema").val()!='')){
     					$('#validacion').val('');
						$('#validacion').css('background','white');
						if($('#correo').val().match(patronemail)){
							$('#validacion').val('');
							$('#validacion').css('background','white');
							if($("#complejidad").val().match(comp)){
								$('#validacion').val('');
								$('#validacion').css('background','white');
								//$(location).attr('href','prueba.php');
								var str=$("#fpreguntas").serialize();
								$.ajax({
									url: 'InsertarPregunta.php',
									data: str,
									beforeSend:function(){
										$('#resultado').html('<img src="load.gif" height="50"/>')
									},
									success:function(){
										$("#resultado").load("VerPreguntasXML.php?correo="+"<?php echo "$correo"?>");
									},
									error:function(){
										$('#resultado').fadeIn().html('<p class="error"><strong>El servidor parece que no responde</p>');
									}
								});
								return true;
							}
							else{
								$('#validacion').val('complejidad entre 0-5');
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
<script language = "javascript">
//(IE7+, Firefox, Chrome, Safari, and Opera)
XMLHttpRequestObject = new XMLHttpRequest();
XMLHttpRequestObject.onreadystatechange = function()
{
if (XMLHttpRequestObject.readyState==4)
{var obj = document.getElementById('resultado');
obj.innerHTML = XMLHttpRequestObject.responseText;}
}
function pedirDatos()
{
XMLHttpRequestObject.open("GET",'VerPreguntasXML.php?correo='+'<?php echo "$correo" ?>',true);
XMLHttpRequestObject.setRequestHeader("Content-type","application/x-www-form-urlencoded");
XMLHttpRequestObject.send();
}
</script> 


</head>
<body>
<form id="fpreguntas" name='fpreguntas'>

<input type="button" id="enviar" value="enviar"onclick ="mandarDatos()">
<input type="button" id="ver_preguntas" value="ver_preguntas"onclick ="pedirDatos()">

<div id="preguntas"style="background-color:#99FF66;>
<h1 align="center"> Prengunta </h1><br>

 <li>
     <label>Direccion de correo*:</label>
     <input type="text" name="correo" id="correo" value= '<?php echo "$correo"?>' >
</li><br>

 <li>
     <label>Pregunta*:</label>
     <input type="text" name="Pregunta" id="Pregunta" placeholder="Pregunta" >
</li><br>

 <li>
     <label>Respuesta correcta*:</label>
     <input type="text" name="RC" id="RC" placeholder="RC" >
</li><br>

<li>
     <label>Respuesta incorrecta1*:</label>
     <input type="text" name="RI1" id="RI1" placeholder="RI1" >
</li><br>

<li>
     <label>Respuesta incorrecta2*:</label>
     <input type="text" name="RI2" id="RI2" placeholder="RI2" >
</li><br>

<li>
     <label>Respuesta incorrecta3*:</label>
     <input type="text" name="RI3" id="RI3" placeholder="RI3" >
</li><br>
<li>
	<label>Complejidad de la pregunta*:</label>
    <input type="text" name="complejidad" id="complejidad"placeholder="0-5" >
</li><br>

<li>
     <label>tema de la pregunta(p.e=html)*:</label>
     <input type="text" name="tema" id="tema" >
</li><br>

<input type="text" id="validacion" size= "100" disabled/>


</div>


<div id="resultado" style="background-color:#FFFF6F;">


<p>Aquí aparecerán las preguntas</p> 

</div>


</form>
</body>
</html>
