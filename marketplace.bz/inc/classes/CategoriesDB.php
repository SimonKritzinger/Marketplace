<?php


	class CategoriesDB
	{
		
		


		public static function getCategories(){
			$ret = "";
			//https://www.a2hosting.com/kb/developer-corner/postgresql/connect-to-postgresql-using-php
			$db_connection = pg_connect("host=localhost port=5432 dbname=postgres user=Admin password=master69key420");
			//$result = pg_query($db_connection, "SELECT lastname FROM employees");

			$stat = pg_connection_status($db_connection);
			if($stat === PGSQL_CONNECTION_OK){
				echo 'Connection status ok';
			}else{
				echo 'Connection status bad';
			}
			pg_close($db_connection);
		}

		public static function storepassword(){
			
			
			$db_connection = pg_connect("host=localhost port=5432 dbname=postgres user=Admin password=master69key420");
			$stuser = $dbh->prepare("INSERT INTO Muser(username, email, name, passwordhash) VALUES (:username, :email, :name, :passwordhash)");
			$stuser = $dbh->prepare("SELECT id, username, password FROM Muser WHERE email = :email");

			$password = $_POST['password'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$username = $_POST['username'];

			$stuser->bindParam(':username', $username);
			$stuser->bindParam(':email', $email);
			$stuser->bindParam(':name', $name);
			$stuser->bindParam(':passwordhash', $hpassword);

			$result = pg_query($db_connection, $stuser);

			if(pg_num_rows($result) != 0){

				$message = "email already exists";
				echo "<script type='text/javascript'>alert('$message');</script>";

			}else{

				$hpassword = password_hash($password, PASSWORD_DEFAULT);

				$stmt->execute();	
			}

			pg_close($db_connection);
		}
		

		public static function loginuser(){
	
			$db_connection = pg_connect("host=localhost port=5433 dbname=postgres user=Admin password=master69key420");
			$stuser = $dbh->prepare("SELECT id, username, password FROM Muser WHERE email = :email");

			$hpassword = password_hash($password, PASSWORD_DEFAULT);
			$email = $_POST['lemail'];
			$lpassword = $_POST['lpassword'];

			$stuser->bindParam(':email', $email);
		
			$result = pg_query($db_connection, $stuser);

			if(pg_num_rows($result) != 0){
				$id = pg_fetch_result($result, 0, 0);
				$username = pg_fetch_result($result, 0, 1);
				$password = pg_fetch_result($result, 0, 2);

				if(password_verify($passowrd, $lpassword)){
					
					$_SESSION["id"] = $id;
					$_SESSION["lusername"] = $username;

				}else{

					$message = "worng password";
					echo "<script type='text/javascript'>alert('$message');</script>";
				}

			}
			
			pg_close($db_connection);	
			
		}


		public static function insertpost(){

			$post = $_POST['password'];
			$picutres = $_POST['name'];
		}
	}

 ?>
