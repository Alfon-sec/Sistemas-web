<?php
include 'servidor.php';
$conn = new mysqli($server, $user, $pass, $basededatos);
if (!$conn)
{
	die ("Fallo al conectar a MySQL: " . mysqli_connect_error());
}

$query= 'SELECT * FROM usuarios';
$resultado=mysqli_query($conn,$query);

echo '<table border=1> <tr> <th> Nombre </th>  <th> Pass </th> <th> Bloqueado </th> </tr>';

while ($row= mysqli_fetch_array($resultado)){
	echo '<tr><td>' .$row["Email"].'</td> <td>'.$row["Pass"] .'</td> <td>'.$row["Bloqueado"] .'</td></tr>';
}
echo '</table>';
$resultado->close();
mysqli_close($conn);
?>