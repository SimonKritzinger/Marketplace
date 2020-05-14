<?php


	class CategoriesDB
	{
		
		


		public static function getCategories(){
			$ret = "";
			//https://www.a2hosting.com/kb/developer-corner/postgresql/connect-to-postgresql-using-php
			$db_connection = pg_connect("host=localhost port=5433 dbname=Marketplace user=Admin password=master69key420");
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
			
			$db_connection = pg_pconnect("host=localhost port=5433 dbname=Marketplace user=Admin password=master69key420");
			$sql = 'INSERT INTO muser(username, email, name, passwordhash) VALUES ($1, $2, $3, $4)';
			$sqlName ='insertUser';

			if(!pg_prepare ($sqlName, $sql)){
				echo'error';	
			}
			//$stuser = $dbh->prepare("SELECT id, username, password FROM muser WHERE email = :email");

			$password = $_POST['password'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$username = $_POST['username'];
			$hpassword = password_hash($password, PASSWORD_DEFAULT);
			echo "test";

			$rs = pg_execute($sqlName, array($username, $email, $name, $hpassword));
			
			

			

			//$result = pg_query($db_connection, $stuser);

			//if(pg_num_rows($result) != 0){

			//	$message = "email already exists";
			//	echo "<script type='text/javascript'>alert('$message'); console.log(\"asdf\")</script>";

			//}else{
				
			//	$stuser = $dbh->prepare("INSERT INTO muser(username, email, name, passwordhash) VALUES (:username, :email, :name, :passwordhash)");
			//	$stuser->bindParam(':username', $username);
			//	$stuser->bindParam(':email', $email);
			//	$stuser->bindParam(':name', $name);
			//	$stuser->bindParam(':passwordhash', $hpassword);
				


			//	$stmt->execute();	

				
			//}

			pg_close($db_connection);

			
			
			
		}
		

		public static function loginuser(){
	
			$db_connection = pg_pconnect("host=localhost port=5433 dbname=Marketplace user=Admin password=master69key420");
			
			$sql = 'SELECT userid, username, passwordhash FROM muser WHERE email = $1';
			$loginUser ='loginUser';
			
			$lemail = $_POST['lemail'];
			$lpassword = $_POST['lpassword'];

			if(!pg_prepare ($sqlName, $sql)){
				echo'error';	
			}

			$rs = pg_execute($loginUser, array($lemail));
			
			$rows = pg_num_rows($rs);

			
			if($rows == 0){

				
			}else{

				$row = pg_fetch_row($rs);
				$pw = $row[2];

				if(password_verify($lpassword, $pw) == TRUE){
					 
					$userid= $row[0];
					$logedinuser= $row[1];

				}else{


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
