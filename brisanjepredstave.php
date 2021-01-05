<?php
include "server/konekcija.php";

$id=$_GET['id'];
$sql = "DELETE FROM predstave WHERE id_predstave='".$id."'";
$mysqli->query($sql) or die($sql);

header("Location:repertoar.php");
 ?>