<?php
$xml = simplexml_load_file('preguntas.xml');

echo '<table border=1> <tr> <th> Nombre </th> <th> Pregunta </th> <th> RC </th> </tr>';
foreach ($xml->assessmentItem as $pregunta)
{
	echo '<tr><td>' .($pregunta['author']). '</td><td>' .utf8_decode($pregunta->itembody) .'</td>';
	foreach($pregunta->correctResponse as $CR){
    	echo '<td>' .($CR->value). '</td></tr>';
    }
}
echo '</table>';
?>