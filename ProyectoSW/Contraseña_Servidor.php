<?php

//incluimos la clase nusoap.php
require_once('../../nusoap-0.9.5/lib/nusoap.php');
require_once('../../nusoap-0.9.5/lib/class.wsdlcache.php');
//creamos el objeto de tipo soap_server
$ns="http://localhost/nusoap-0.9.5/samples";
$server = new soap_server;
$server->configureWSDL('contras',$ns);
$server->wsdl->schemaTargetNamespace=$ns;
//registramos la función que vamos a implementar
$server->register('passw',
array('x'=>'xsd:string','y'=>'xsd:string'),
array('z'=>'xsd:string'),
$ns);
//implementamos la función
function passw ($x, $y){

return "hola";
}
//llamamos al método service de la clase nusoap antes obtenemos los valores de los parámetros
if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
$server->service($HTTP_RAW_POST_DATA);
?> 

