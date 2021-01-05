<?php  
 //sort.php  
 include "konekcija.php";
 include "domain/predstave.php";
 include "domain/vrste.php";

 $output = '';  
 $order = $_POST["order"];

 if($order == 'desc')  
 {  
      $order = 'asc';  
 }  
 else  
 {  
      $order = 'desc';  
 }  

 $uslov = " ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";  
 $predstave = Predstava::vratiSve($mysqli,$uslov);
 $output .= '  
 <table class="table"> <tbody> 
      <tr>  
        <th><a class="column_sort" id="naslov" data-order="'.$order.'" href="#">Naslov</a></th>
        <th><a class="column_sort" id="cena" data-order="'.$order.'" href="#">Cena</a></th>
        <th><a class="column_sort" id="trajanje" data-order="'.$order.'" href="#">Trajanje</a></th>
        <th><a class="column_sort" id="datum_izvodjenja" data-order="'.$order.'" href="#">Datum izvođenja</a></th>
        <th>Vrsta predstave</th>
        <th>Opcije</th>     
      </tr>  
 ';  
 foreach($predstave as $predstava){
    $output=$output.'<tr>';
    $output=$output.'<td>'.$predstava->naslov.'</td>';
    $output=$output.'<td>'.$predstava->cena.'</td>';
    $output=$output.'<td>'.$predstava->trajanje.'</td>';
    $output=$output.'<td>'.$predstava->datum_izvodjenja.'</td>';
    $output=$output.'<td>'.$predstava->vrsta->naziv_vrste.'</td>';
    $output=$output.'<td><a href="brisanjepredstave.php?id='.$predstava->id_predstave.'">
    <img class="icon-images" src="img/trash.png" width="20px" height="20px"/>
</a>
<a href="izmenapredstave.php?id='.$predstava->id_predstave.'">
    <img class="icon-images" src="img/refresh.png" width="20px" height="20px" />
</a></td>';
    $output=$output.'</tr>';
 }
 $output .= '</tbody></table>';  
 echo $output;  
 ?>  