<?php

$id = $_GET['id_vrste'];


include "konekcija.php";
include "domain/predstave.php";
include "domain/vrste.php";

$result=Predstava::vratiSve($mysqli, " where p.id_vrste =".$id);

 $nalepi = '<table class="table "><thead><tr><th>Naslov</th><th>Cena</th><th>Trajanje</th><th>Datum izvođenja</th><th>Vrsta predstave</th></thead><tbody>';

 foreach($result as $predstava){
    $nalepi=$nalepi.'<tr>';
    $nalepi=$nalepi.'<td>'.$predstava->naslov.'</td>';
    $nalepi=$nalepi.'<td>'.$predstava->cena.'</td>';
    $nalepi=$nalepi.'<td>'.$predstava->trajanje.'</td>';
    $nalepi=$nalepi.'<td>'.$predstava->datum_izvodjenja.'</td>';
    $nalepi=$nalepi.'<td>'.$predstava->vrsta->naziv_vrste.'</td>';
    $nalepi=$nalepi.'</tr>';
 }
 
$nalepi=$nalepi.'</tbody></table>';          


echo($nalepi);


 ?>