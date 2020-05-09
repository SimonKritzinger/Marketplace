<!DOCTYPE html>
<html>
	<?php
	require_once "inc/classes/Categories.php";
    require_once "inc/classes/CategoriesDB.php";
	require_once "inc/classes/Comments.php";
    require_once "inc/classes/CommentsDB.php";
    require_once "inc/classes/Images.php";
    require_once "inc/classes/ImagesDB.php";
    require_once "inc/classes/Post.php";
    require_once "inc/classes/PostDB.php";
    require_once "inc/classes/User.php";
    require_once "inc/classes/UserDB.php";
		session_start();
	?>
	
	<head>
    <meta charset="UTF-8">
    <meta name="description" content="Project Marketplace">
    <meta name="keywords" content="HTML,CSS,JS,JQUERY,javascript,purecss,php">
    <meta name="author" content="Tonini Lukas, Rassele Kevin, Kritzinger Simon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Marketplace</title>
		<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


        <!--  <link rel="stylesheet" href="inc/css/mycss.css">   -->
    <link rel="stylesheet" href="inc/css/stylesheet.css">
    <link rel="stylesheet" href="inc/css/zoom.css">
        <link rel="stylesheet" href="inc/css/SideBar.css">

		<script src="inc/js/zoom.js"></script>

		<script>

		function myFunction(){
			<?php
			$test = new CategoriesDB();
			?>

			alert("<?php echo $test->getCategories(); ?>")

		};
		</script>
		<style>

    </style>
	</head>
	<body>
		<?php require_once("scripts/scr.Header.php"); ?>
    <div class="container-fluid pl-0">
        <div class="row">

            <div class="col-md-2 d-none d-md-block" style="position: fixed; z-index: 1" id="sidebar">
                <?php require_once("scripts/scr.CategoryList.php"); ?>
            </div>

            <div class="col-md-8 col-sm-12 ml-sm-auto">
                <?php
                  if(empty($_REQUEST["id"])){
                    require_once("scripts/scr.PostList.php");
                  }elseif($_REQUEST["id"] == 1){
                    require_once("scripts/scr.Post.php");
                  }
                ?>

                <?php require_once("scripts/scr.Footer.php"); ?>
            </div>

            <div class="col-md-2 d-none d-md-block">
            <?php require_once("scripts/scr.Advertisement.php"); ?>
            </div>
        </div>
    </div>

    <?php
      if(10 == 45){
  			if(empty($_REQUEST["id"])){
  				$suchbegriffe = $_POST["suchbegriffe"];
  				require_once("scripts/scr.Fotoliste.php");

  			} elseif($_REQUEST["id"] == 10){
  				$_SESSION["foto"] = new Foto();
  				$foto = $_SESSION["foto"];
  				require_once("scripts/scr.EintragenFoto.php");
  			} elseif($_REQUEST["id"] == 11){
  				if(empty($_SESSION["foto"])){
  					$_SESSION["foto"] = new Foto();
  				}
  				$foto = $_SESSION["foto"];
  				$foto->setBeschreibung($_POST["beschreibung"]);
  				$foto->setFotodatei($_FILES["foto"]);
  				//var_dump($_FILES["foto"]);
  				$foto->setSuchbegriffe($_POST["suchbegriffe"]);
  				$foto->validiere();
  				$fehler = $foto->getFehler();
  				if(isset($fehler)){
  					require_once 'scripts/scr.EintragenFoto.php';
  					var_dump($fehler);
  					echo "<br>";
  					echo $fehler["groesse"];
  				}else{
  					if(FotoDBZugriff::aufnehmenFoto($foto)){
  						unset($_SESSION["foto"]);
  						//require_once 'scripts/scr.Fotoliste.php';
  						echo '<script type="text/javascript">window.location="index.php" </script>';
  					}else{
  						$fehler = "Fehler beim Eintragen des Fotos in die Datenbank!";
  						require_once 'scripts/scr.Fehler.php';
  					}
  				}

  			} elseif($_REQUEST["id"] == 20){
  				if(FotoDBZugriff::loescheFoto($_GET["nummer"])){
  					require_once 'scripts/scr.Fotoliste.php';
  				}else{
  					$fehler = "Fehler beim Loeschen des Fotos in der Datenbank!";
  					require_once 'scripts/scr.Fehler.php';
  				}
  			} elseif($_REQUEST["id"] == 22){
  				if(FotoDBZugriff::loeschealleFoto()){
  					require_once 'scripts/scr.Fotoliste.php';
  				}else{
  					$fehler = "Fehler beim Loeschen aller Fotos in der Datenbank!";
  					require_once 'scripts/scr.Fehler.php';
  				}
  			}
      }
		?>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
</html>
