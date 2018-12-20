<?php
$correo=$_REQUEST["correo"];
        require_once('nusoap-0.9.5/lib/nusoap.php');
        require_once('nusoap-0.9.5/lib/class.wsdlcache.php');
        $soapclient = new nusoap_client('http://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl',true);
            $result = $soapclient->call('comprobar',array('x'=> $correo));
            if($result== "SI")
            { 
                include 'servidor.php';
                $conn = new mysqli($server, $user, $pass, $basededatos);
                if (!$conn)
                    {
                        die ("Fallo al conectar a MySQL: " . mysqli_connect_error());
                    }
                    $query= "SELECT * FROM usuarios WHERE Email='$correo'";
                    $resultado=mysqli_query($conn,$query);
                    $row= mysqli_fetch_array($resultado); 
                    if (mysqli_num_rows($resultado) == 0) {
                        echo"Correcto";
                     }
                     else{     
                         echo"Correo_repetido";
                        }
            }    
            else{
            echo"Correo incorrecto, tiene que ser de SW";
            }   

?>

