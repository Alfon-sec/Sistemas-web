<?php
include ("seguridad.php");
$correo=$_REQUEST["correo"];
        require_once('../../nusoap-0.9.5/lib/nusoap.php');
        require_once('../../nusoap-0.9.5/lib/class.wsdlcache.php');
        $soapclient = new nusoap_client('http://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl',true);
            $result = $soapclient->call('comprobar',array('x'=> $correo));
            if($result== "SI")
            {   
            echo"Correcto";
            }    
            else{
            echo"Correo incorrecto, tiene que ser de SW";
            }   

?>

