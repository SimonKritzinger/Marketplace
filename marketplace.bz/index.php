<!DOCTYPE html>
<html>
	<head>
    <meta charset="UTF-8">
    <meta name="description" content="Project Marketplace">
    <meta name="keywords" content="HTML,CSS,JS,JQUERY,javascript,purecss,php">
    <meta name="author" content="Tonini Lukas, Rassele Kevin, Kritzinger Simon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Marketplace</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="inc/css/stylesheet.css">
    <link rel="stylesheet" href="inc/css/SideBar.css">
		<link rel="stylesheet" href="inc/css/NavBar.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="inc/js/Scripts.js"></script>
    <script>
			//Was used to check if the connection to the database works
			function getConnection(){
			  <?php
			    require_once 'inc/phpFunction/Functions.php';
			    $test = new Functions();
			  ?>
			  alert("<?php echo $test->getConnectionStatus(); ?>")
			};
    </script>
	</head>
	<body onload="Checkifloggedin()">
		<?php require_once("webStructure/Header.php"); ?>
    <div class="container-fluid pl-0">
      <div class="row">
        <div class="col-md-2 d-none d-md-block" style="position: fixed; z-index: 1" id="sidebar">
        	<?php require_once("webStructure/CategoryList.php"); ?>
        </div>
        <div class="col-md-8 col-sm-12 ml-sm-auto">
					<br><br>
					<!-- this is a test button which can be used to check the connection to the database -->
					<!--
					<button onclick="getConnection();">TestConnection</button>
					-->
        	<?php require_once("webStructure/PostList.php"); ?>
        	<?php require_once("webStructure/Footer.php"); ?>
        </div>
        <div class="col-md-2 d-none d-md-block">
      		<?php require_once("webStructure/Advertisement.php"); ?>
        </div>
      </div>
    </div>
	</body>
</html>
