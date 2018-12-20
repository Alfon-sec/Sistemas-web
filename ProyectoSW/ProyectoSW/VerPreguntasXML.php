<?php
session_start();
if(isset($_REQUEST["correo"])){
	if((!isset($_SESSION['email']))||(empty($_SESSION['email']))){
		header('Location: layout.php?');
	}
$xml = simplexml_load_file('preguntas.xml');
$correo=$_GET['correo'];
echo '<table border=1> <tr> <th> Numero </th> <th> Nombre </th> <th> Pregunta </th> <th> RC </th> </tr>';
$i=1;
$u=0;
foreach ($xml->assessmentItem as $pregunta)
{
	if($pregunta['author']==$correo){
	echo '<tr><td>' .$i. '</td><td>' .($pregunta['author']). '</td><td>' .utf8_decode($pregunta->itembody) .'</td>';
	$u=$u+1;
	foreach($pregunta->correctResponse as $CR){
    	echo '<td>' .($CR->value). '</td></tr>';
    }
    $i=$i+1;
	}
}
echo '</table>';
echo '<table border=1> <tr> <th> Numero_total </th> <th> Tu_Numero_preguntas</th></tr>';
echo '<tr><td>' .$i. '</td><td>' .$u. '</td></tr>';
echo '</table>';
$i=0;
$u=0;
?>