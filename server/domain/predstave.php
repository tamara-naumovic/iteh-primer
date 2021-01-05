<?php 

class Predstava {

	public $id_predstave;
	public $naslov;
	public $cena;
	public $trajanje;
    public $datum_izvodjenja;
    public $vrsta;
	

	
	public function __construct($id_predstave,$naslov,$cena,$trajanje,$datum_izvodjenja,$vrsta)
	{
        $this->id_predstave=$id_predstave;
        $this->naslov=$naslov;
        $this->cena=$cena;
        $this->trajanje=$trajanje;
        $this->datum_izvodjenja=$datum_izvodjenja;
        $this->vrsta=$vrsta;

	}
	
	public function ubaciPredstavu($data,$db){
		
		if($data['naslov'] === '' || $data['cena'] === '' || $data['trajanje'] === ''|| $data['datum_izvodjenja'] === ''){
		$this-> poruka ='Polja moraju biti popunjena';
		
		}else{
		
			$save=$db->query("INSERT INTO predstave(naslov,cena,trajanje,datum_izvodjenja,id_vrste) VALUES ('".$data['naslov']."','".$data['cena']."','".$data['trajanje']."','".$data['datum_izvodjenja']."','".$data['id_vrste']."')") or die($db->error);
			if($save){
				$this -> poruka = 'Uspesno sacuvana predstava';
			}else{
				$this -> poruka = 'Neuspesno sacuvan predstava';
			}
		}
	}
	
	public function getPoruka(){
		return $this -> poruka;
	}

	public static function vratiSve($db,$uslov){
		$query="SELECT * FROM predstave p JOIN vrste_predstava v ON p.id_vrste=v.id_vrste".$uslov;
		$query=trim($query);
        $result=$db->query($query) or die($db->error);
        $array=[];
        while($r = $result->fetch_assoc()){
			$vrsta=new Vrsta($r['id_vrste'],$r['naziv_vrste']);
			$predstava=new Predstava($r['id_predstave'],$r['naslov'],$r['cena'],$r['trajanje'],$r['datum_izvodjenja'],$vrsta);
            array_push($array,$predstava);
            }
        return $array;
    }

}


?>