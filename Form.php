<!DOCTYPE HTML>
  <html lang = "fi">
    <head>
    <title>Lomake</title>
    <link rel="icon" type="image/png" href="Kuvat/favicon-32x32.png" sizes="32x32">
    <link rel="stylesheet" href="default.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
  <body>
    <?php
    $etunimiError = $sukunimiError =
    $puhelinnumeroError = $sähköpostiError =
    $henkilötunnusError = $asuinpaikkaError =
    $työnimikeError = $esimiesError =
    $sijaintiError = $työsuhdeError =
    $aloituspvmError = $päättymispvmError = "";
    $etunimi = $sukunimi =
    $puhelinnumero = $sähköposti =
    $henkilötunnus = $asuinpaikka =
    $työnimike = $esimies =
    $sijainti = $työsuhde =
    $aloituspvm = $päättymispvm = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
      if(empty($_POST["etunimi"]) || (trim($_POST["etunimi"]) == "")){
        $etunimiError = "Vaaditaan";
      }else{
      $etunimi = testaaInput($_POST["etunimi"]);
      if(!preg_match("/^[a-öA-Ö ]*$/",$etunimi)) {
      $etunimiError = "Tarkista oikeinkirjoitus";
      }
      }

      if(empty($_POST["sukunimi"]) || (trim($_POST["sukunimi"]) == "")){
        $sukunimiError = "Vaaditaan";
      }else{
      $sukunimi = testaaInput($_POST["sukunimi"]);
      if(!preg_match("/^[a-öA-Ö ]*$/",$sukunimi)) {
      $sukunimiError = "Tarkista oikeinkirjoitus";
      }
      }

	  if(empty($_POST["puhelinnumero"]) || (trim($_POST["puhelinnumero"]) == "")){
        $puhelinnumeroError = "Vaaditaan";
      }else{
      $puhelinnumero = testaaInput($_POST["puhelinnumero"]);
      if(!preg_match("/(((90[0-9]{3})?0|\+358\s?)(?!(100|20(0|2(0|[2-3])|9[8-9])|300|600|700|708|75(00[0-3]|(1|2)\d{2}|30[0-2]|32[0-2]|75[0-2]|98[0-2])))(4|50|10[1-9]|20(1|2(1|[4-9])|[3-9])|29|30[1-9]|71|73|75(00[3-9]|30[3-9]|32[3-9]|53[3-9]|83[3-9])|2|3|5|6|8|9|1[3-9])\s?(\d\s?){4,19}\d$)/",$puhelinnumero)) {
      $puhelinnumeroError = "Tarkista numero";
      }
      }
	  $sähköposti = testaaInput($_POST["sähköposti"]);
	if(!preg_match("/^$|^.*@.*\..*$/",$sähköposti)){
	$sähköpostiError = "Tarkista oikeinkirjoitus";	
	}
      

	  if(empty($_POST["henkilötunnus"]) || (trim($_POST["henkilötunnus"]) == "")){
        $henkilötunnusError = "Vaaditaan";
      }else{
      $henkilötunnus = testaaInput($_POST["henkilötunnus"]);
      if(!preg_match("/[0-3][0-9]\.?[0,1][0-9]\.?[0-9]{2}[-+A][0-9]{3}[0-9A-Z]/",$henkilötunnus)) {
      $henkilötunnusError = "Tarkista oikeinkirjoitus";
      }
      }

	  if(empty($_POST["asuinpaikka"]) || (trim($_POST["asuinpaikka"]) == "")){
        $asuinpaikkaError = "Vaaditaan";
      }else{
      $asuinpaikka = testaaInput($_POST["asuinpaikka"]);
      if(!preg_match("/^[a-öA-Ö ]*$/",$asuinpaikka)){
        $asuinpaikkaError = "Tarkista oikeinkirjoitus";
      }
      }

	  if(empty($_POST["työnimike"]) || (trim($_POST["työnimike"]) == "")){
        $työnimikeError = "Vaaditaan";
      }else{
      $työnimike = testaaInput($_POST["työnimike"]);
      if(!preg_match("/^[a-öA-Ö ]*$/",$työnimike)){
        $työnimikeError = "Tarkista oikeinkirjoitus";
      }
      }

	  if(empty($_POST["esimies"]) || (trim($_POST["esimies"]) == "")){
        $esimiesError = "Vaaditaan";
      }else{
      $esimies = testaaInput($_POST["esimies"]);
      if(!preg_match("/^[a-öA-Ö ]*$/",$esimies)){
        $esimiesError = "Tarkista oikeinkirjoitus";
      }
      }

	  if(empty($_POST["sijainti"]) || (trim($_POST["sijainti"]) == "")){
        $sijaintiError = "Vaaditaan";
      }else{
      $sijainti = testaaInput($_POST["sijainti"]);
      if(!preg_match("/^[a-öA-Ö0-9]*$/",$sijainti)){
        $sijaintiError = "Tarkista oikeinkirjoitus";
      }
      }

    $työsuhde = $_POST["työmuodot"];


	  if(($_POST["työmuodot"]) == "Määräaikainen" && (empty($_POST["aloituspäivämäärä"]))){
		$aloituspvmError = "Vaaditaan";
	  }else{
		$aloituspvm = testaaInput($_POST["aloituspäivämäärä"]);
		if(($_POST["työmuodot"]) == "Määräaikainen" && !preg_match("/^(3[01]|[12][0-9]|0?[1-9])\.(1[012]|0?[1-9])\.((?:19|20)\d{2})$/",$aloituspvm)){
      $aloituspvmError = "Tarkista oikea muoto";
    }
	  }

	  if(($_POST["työmuodot"]) == "Määräaikainen" && (empty($_POST["päättymispäivämäärä"]))){
		$päättymispvmError = "Vaaditaan";
		}else{
		$päättymispvm = testaaInput($_POST["päättymispäivämäärä"]);
		if(($_POST["työmuodot"]) == "Määräaikainen" && !preg_match("/^(3[01]|[12][0-9]|0?[1-9])\.(1[012]|0?[1-9])\.((?:19|20)\d{2})$/",$päättymispvm)){
      $päättymispvmError = "Tarkista oikea muoto";
		}
		}
	  if(($_POST["työmuodot"]) == "Määräaikainen" && ((empty($_POST["aloituspäivämäärä"])) &&
	  (empty($_POST["päättymispäivämäärä"])))){
		$aloituspvmError = "Vaaditaan";
		$päättymispvmError = "Vaaditaan";
		}else{
		$aloituspvm = testaaInput($_POST["aloituspäivämäärä"]);
		$päättymispvm = testaaInput($_POST["päättymispäivämäärä"]);
	  if(($_POST["työmuodot"]) == "Määräaikainen" && !preg_match("/^(3[01]|[12][0-9]|0?[1-9])\.(1[012]|0?[1-9])\.((?:19|20)\d{2})$/",$aloituspvm) && (!preg_match("/^(3[01]|[12][0-9]|0?[1-9])\.(1[012]|0?[1-9])\.((?:19|20)\d{2})$/",$päättymispvm))){
      $aloituspvmError = "Tarkista oikea muoto";
      $päättymispvmError = "Tarkista oikea muoto";
	  }
	}
	if($etunimiError == "" && $sukunimiError == "" && 
	$puhelinnumeroError == "" && $henkilötunnusError == ""
	&& $asuinpaikkaError == "" && $työnimikeError == ""
	&& $esimiesError == "" && $sijaintiError == ""
	&& $aloituspvmError == "" && $päättymispvmError == ""){
		YhdistaTietokantaan($etunimi, $sukunimi, $puhelinnumero);
	}	
	}
	
	function testaaInput($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

?>

<?php	
	
	$servername = "localhost";
	$username = "Arke";
	$password = "TietoK96";
	$dbname = "formidata";
	
	$connection = new mysqli($servername, $username, $password, $dbname);
	
	if($connection ->connect_error){
	die("Connection failed: " . $connection ->connect_error);
	}
	$stmt = $connection -> prepare("INSERT INTO lomakedata (Etunimi) VALUES (?)");
	$stmt -> bind_param('s', $enimi);
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	$enimi = $etunimi;
	$snimi = $sukunimi;
	$spuoli = $_POST["gender"];
	$puh = $puhelinnumero;
	$sposti = $sähköposti;
	$htunnus = $henkilötunnus;
	$apaikka = $asuinpaikka;
	$tnimike = $työnimike;
	$emies = $esimies;
	$sijaint = $sijainti;
	$tsuhde = $työsuhde;
	$apvm = $aloituspvm;
	$ppvm = $päättymispvm;
	}
	$stmt -> execute();
	
	
	$stmt -> close();
	$connection -> close();
		
	
	
    ?>

    <header class = "headeri">Uuden työntekijän tiedot</header>
		<div class = "container">
    <p class = "pakolliset"> * Pakolliset tekstikentät </p>
    <form class = "formi" method="post"
 action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<fieldset class = "fieldsetti">
			<legend class = "legendi">Henkilötiedot</legend>
				<div class = "sectioni1">
					<label for = "Etunimi" >Etunimi <span class = "Tähti"> &nbsp * <?php echo $etunimiError;?> </span></label> <br>
          <input id = "Etunimi" type="text" name = "etunimi" value = "<?php echo $etunimi;?>">
				</div>
        <div class = "sectioni2">
          <label for = "Sukunimi" >Sukunimi <span class = "Tähti"> &nbsp *  <?php echo $sukunimiError;?> </span></label> <br>
					<input id = "Sukunimi" type="text" name = "sukunimi" value = "<?php echo $sukunimi;?>">
        </div>
        <div class = "sectioni3">
          <label for = "Mies" >Sukupuoli <span class = "Tähti"> &nbsp * </span></label> <br>
          <input id = "Mies" type = "radio" name = "gender" value = "Mies" checked>Mies <br>
          <input id = "Nainen" type = "radio" name = "gender" value = "Nainen">Nainen <br>
          <input id = "Random" type = "radio" name = "gender" value = "Muu"><span class = "MjaT">Maan ja taivaan väliltä </span>
        </div>
        <div>
				<div class = "sectioni4">
          <label for = "Puhelinnumero" >Puhelinnumero <span class = "Tähti"> &nbsp * <?php echo $puhelinnumeroError;?></span></label> <br>
					<input id = "Puhelinnumero" type="text" name = "puhelinnumero" value = "<?php echo $puhelinnumero;?>">
				</div>
        <div class = "sectioni5">
          <label for = "Sposti" >Sähköposti <?php echo $sähköpostiError;?></label> <br>
					<input id = "Sposti" type="text" name = "sähköposti" value = "<?php echo $sähköposti;?>">
        </div>
      </div>
      <div>
				<div class = "sectioni6">
          <label for = "Hetu" >Henkilötunnus <span class = "Tähti"> &nbsp * <?php echo $henkilötunnusError;?></span></label> <br>
					<input id = "Hetu" type="text" name = "henkilötunnus" value = "<?php echo $henkilötunnus;?>">
				</div>
        <div class = "sectioni7">
        <label for = "Asuinpaikka" >Asuinpaikka <span class = "Tähti"> &nbsp * <?php echo $asuinpaikkaError;?></span></label> <br>
        <input id = "Asuinpaikka" type="text" name = "asuinpaikka" value = "<?php echo $asuinpaikka;?>">
      </div>
    </div>
		</fieldset>
		<fieldset class = "fieldsetti2">
			<legend class = "legendi">Työtiedot</legend>
				<div class = "sectioni8">
          <label for = "Työnimike">Työnimike <span class = "Tähti"> &nbsp * <?php echo $työnimikeError;?></span></label> <br>
          <input id = "Työnimike" type="text" name = "työnimike" value = "<?php echo $työnimike;?>">
				</div>
        <div class = "sectioni9">
          <label for = "Esimies">Esimies <span class = "Tähti"> &nbsp * <?php echo $esimiesError;?></span></label> <br>
          <input id = "Esimies" type="text" name = "esimies" value = "<?php echo $esimies;?>">
        </div>
        <div>
				<div class = "sectioni10">
          <label for = "Sijainti">Sijainti <span class = "Tähti"> &nbsp * <?php echo $sijaintiError;?></span></label> <br>
          <input id = "Sijainti" type="text" name = "sijainti" value = "<?php echo $sijainti;?>">
				</div>
        <div class = "sectioni11">
          <label for = "Työsuhde">Työsuhde</label> <br>
						<select id = "Työsuhde" name="työmuodot">
							<option value="Kokoaikainen">Kokoaikainen</option>
							<option value = "Määräaikainen" <?php if(isset($työsuhde) && $työsuhde == 'Määräaikainen')
							echo 'selected = "selected"';
							?>>Määräaikainen</option>
						</select>
        </div>
      </div>
      <div>
			<div class = "sectioni12">
          <label for = "Aloituspäivämäärä">Aloituspvm <span class = "Tähti2"> &nbsp *  <?php echo $aloituspvmError;?></span></label> <br>
          <input id = "Aloituspäivämäärä" type="text" name = "aloituspäivämäärä" value = "<?php echo $aloituspvm;?>">
				</div>
        <div class = "sectioni13">
          <label for = "Päättymispäivämäärä">Päättymispvm <span class = "Tähti2"> &nbsp *  <?php echo $päättymispvmError;?></span></label> <br>
          <input id = "Päättymispäivämäärä" type="text" name = "päättymispäivämäärä" value = "<?php echo $päättymispvm;?>">
        </div>
      </div>
		</fieldset>
				<input class = "submit" type = "submit" value = "Tallenna">
				</form>
	</div>

<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
<script src = "scripti.js"></script>
  </body>

  </html>
