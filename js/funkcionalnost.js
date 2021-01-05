
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}


function validateForm() {
  var naslov = document.forms["unosPredstave"]["naslov"].value;
  var cena = document.forms["unosPredstave"]["cena"].value;
  var trajanje = document.forms["unosPredstave"]["trajanje"].value;
  var datum_izvodjenja = document.forms["unosPredstave"]["datum_izvodjenja"].value;
  if (naslov == "" || cena == "" || trajanje == "" || datum_izvodjenja == "") {
    alert("Polja ne smeju biti prazna! ");
    return false;
  }
}

