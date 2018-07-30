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
      if(empty($_POST["etunimi"])){
        $etunimiError = "Vaaditaan";
      }else{
      $etunimi = testaaInput($_POST["etunimi"]);
      }

      if(empty($_POST["sukunimi"])){
        $sukunimiError = "Vaaditaan";
      }else{
      $sukunimi = testaaInput($_POST["sukunimi"]);
      }

	  if(empty($_POST["puhelinnumero"])){
        $puhelinnumeroError = "Vaaditaan";
      }else{
      $puhelinnumero = testaaInput($_POST["puhelinnumero"]);
      }

	  if(empty($_POST["henkilötunnus"])){
        $henkilötunnusError = "Vaaditaan";
      }else{
      $henkilötunnus = testaaInput($_POST["henkilötunnus"]);
      }

	  if(empty($_POST["asuinpaikka"])){
        $asuinpaikkaError = "Vaaditaan";
      }else{
      $asuinpaikka = testaaInput($_POST["asuinpaikka"]);
      }

	  if(empty($_POST["työnimike"])){
        $työnimikeError = "Vaaditaan";
      }else{
      $työnimike = testaaInput($_POST["työnimike"]);
      }

	  if(empty($_POST["esimies"])){
        $esimiesError = "Vaaditaan";
      }else{
      $esimies = testaaInput($_POST["esimies"]);
      }

	  if(empty($_POST["sijainti"])){
        $sijaintiError = "Vaaditaan";
      }else{
      $sijainti = testaaInput($_POST["sijainti"]);
      }


	  if(($_POST["työmuodot"]) == "määräaikainen" && (empty($_POST["aloituspäivämäärä"]))){
		$aloituspvmError = "Vaaditaan";
		}else{
		$aloituspvm = testaaInput($_POST["aloituspäivämäärä"]);
		}

	  if(($_POST["työmuodot"]) == "määräaikainen" && (empty($_POST["päättymispäivämäärä"]))){
		$päättymispvmError = "Vaaditaan";
		}else{
		$päättymispvm = testaaInput($_POST["päättymispäivämäärä"]);
		}

	  if(($_POST["työmuodot"]) == "määräaikainen" && ((empty($_POST["aloituspäivämäärä"])) &&
	  (empty($_POST["päättymispäivämäärä"])))){
		$aloituspvmError = "Vaaditaan";
		$päättymispvmError = "Vaaditaan";
		}else{
		$aloituspvm = testaaInput($_POST["aloituspäivämäärä"]);
		$päättymispvm = testaaInput($_POST["päättymispäivämäärä"]);
		}
    }
    function testaaInput($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
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
          <input id = "Etunimi" type="text" name = "etunimi">
				</div>
        <div class = "sectioni2">
          <label for = "Sukunimi" >Sukunimi <span class = "Tähti"> &nbsp *  <?php echo $sukunimiError;?> </span></label> <br>
					<input id = "Sukunimi" type="text" name = "sukunimi">
        </div>
        <div class = "sectioni3">
          <label for = "Mies" >Sukupuoli <span class = "Tähti"> &nbsp * </span></label> <br>
          <input id = "Mies" type = "radio" name = "gender" value = "mies" checked>Mies <br>
          <input id = "Nainen" type = "radio" name = "gender" value = "nainen">Nainen <br>
          <input id = "Random" type = "radio" name = "gender" value = "muu"><span class = "MjaT">Maan ja taivaan väliltä </span>
        </div>
        <div>
				<div class = "sectioni4">
          <label for = "Puhelinnumero" >Puhelinnumero <span class = "Tähti"> &nbsp * <?php echo $puhelinnumeroError;?></span></label> <br>
					<input id = "Puhelinnumero" type="text" name = "puhelinnumero">
				</div>
        <div class = "sectioni5">
          <label for = "Sposti" >Sähköposti</label> <br>
					<input id = "Sposti" type="text" name = "sähköposti">
        </div>
      </div>
      <div>
				<div class = "sectioni6">
          <label for = "Hetu" >Henkilötunnus <span class = "Tähti"> &nbsp * <?php echo $henkilötunnusError;?></span></label> <br>
					<input id = "Hetu" type="text" name = "henkilötunnus">
				</div>
        <div class = "sectioni7">
        <label for = "Asuinpaikka" >Asuinpaikka <span class = "Tähti"> &nbsp * <?php echo $asuinpaikkaError;?></span></label> <br>
        <input id = "Asuinpaikka" type="text" name = "asuinpaikka">
      </div>
    </div>
		</fieldset>
		<fieldset class = "fieldsetti2">
			<legend class = "legendi">Työtiedot</legend>
				<div class = "sectioni8">
          <label for = "Työnimike">Työnimike <span class = "Tähti"> &nbsp * <?php echo $työnimikeError;?></span></label> <br>
          <input id = "Työnimike" type="text" name = "työnimike">
				</div>
        <div class = "sectioni9">
          <label for = "Esimies">Esimies <span class = "Tähti"> &nbsp * <?php echo $esimiesError;?></span></label> <br>
          <input id = "Esimies" type="text" name = "esimies">
        </div>
        <div>
				<div class = "sectioni10">
          <label for = "Sijainti">Sijainti <span class = "Tähti"> &nbsp * <?php echo $sijaintiError;?></span></label> <br>
          <input id = "Sijainti" type="text" name = "sijainti">
				</div>
        <div class = "sectioni11">
          <label for = "Työsuhde">Työsuhde</label> <br>
						<select id = "Työsuhde" name="työmuodot">
							<option value="kokoaikainen">Kokoaikainen</option>
							<option value = "Määräaikainen" <?php if(isset($_POST['työmuodot']) && $_POST['työmuodot'] == 'Määräaikainen')
							echo 'selected= "selected"';
							?>>Määräaikainen</option>
						</select>
        </div>
      </div>
      <div>
			<div class = "sectioni12">
          <label for = "Aloituspäivämäärä" id = "Aloituspvm">Aloituspvm <?php echo $aloituspvmError;?></label> <br>
          <input id = "Aloituspäivämäärä" type="text" name = "aloituspäivämäärä">
				</div>
        <div class = "sectioni13">
          <label for = "Päättymispäivämäärä" id = "Päättymispvm">Päättymispvm <?php echo $päättymispvmError;?></label> <br>
          <input id = "Päättymispäivämäärä" type="text" name = "päättymispäivämäärä">
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
