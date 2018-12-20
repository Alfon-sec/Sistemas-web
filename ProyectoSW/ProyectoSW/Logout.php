
<?php
session_start();
session_destroy();
echo("<script> alert ('Adios')</script>");
echo ("<a href=layout.php?op=otros'>Salir</a>");
?>
