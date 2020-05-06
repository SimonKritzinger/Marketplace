<?php


	class CategoriesDB
	{
		
		


		public static function getCategories(){
			$ret = "";
			//https://www.a2hosting.com/kb/developer-corner/postgresql/connect-to-postgresql-using-php
			$db_connection = pg_connect("host=localhost port=5433 dbname=postgres user=Admin password=master69key420");
			//$result = pg_query($db_connection, "SELECT lastname FROM employees");

			$stat = pg_connection_status($db_connection);
			if($stat === PGSQL_CONNECTION_OK){
				echo 'Connection status ok';
			}else{
				echo 'Connection status bad';
			}
		}

		public static storepassword(){
			$stuser = $dbh-
			>prepare("INSERIT INTO Muser(username, email, name, passwordhash) VALUES (:username, :email, :name, :passwordhash)");

			$stuser->bindParam(':username', $username);
			$stuser->bindParam(':email', $email);
			$stuser->bindParam(':name', $name);
			$stuser->bindParam(':passwordhash', $hpassword);

			$password = $_POST['password'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$username = $_POST['username'];

			$hpassword = password_hash($password, PASSWORD_DEFAULT);

			$stmt->execute();
		}
		

		public static checkpassword(){

			$email = $_POST['email'];
			$password = $_POST['lpassword'];
		}
	}

 ?>
