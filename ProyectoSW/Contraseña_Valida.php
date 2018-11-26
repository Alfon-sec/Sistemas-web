<?php
$contraseña=$_GET['contrasena'];
require_once('../../nusoap-0.9.5/lib/nusoap.php');
require_once('../../nusoap-0.9.5/lib/class.wsdlcache.php');
$soapclient = new nusoap_client('http://localhost/SistemasWeb/ProyectoSW/Contrasena_Servidor.php?wsdl',true);
//Llamamos la función que habíamos implementado en el Web Service
//e imprimimos lo que nos devuelve
$result = $soapclient->call('passw',array('x'=>$contraseña,'y'=>'1010'));
echo($result);
echo '<h2>Request</h2><pre>' . htmlspecialchars($soapclient->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2><pre>' . htmlspecialchars($soapclient->response, ENT_QUOTES) . '</pre>';
echo '<h2>Debug</h2>';
echo '<pre>' . htmlspecialchars($soapclient->debug_str, ENT_QUOTES) . '</pre>';
?>

