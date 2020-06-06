        <?PHP
             
            $db_connection = pg_pconnect("host=localhost port=5433 dbname=Marketplace user=Admin password=master69key420");
            $emailalreadyexists = "SELECT email FROM MUser where muser.email = $1";
            $sql = 'INSERT INTO muser(username, email, name, passwordhash) VALUES ($1, $2, $3, $4)';
            $usernamealreadyexists ="SELECT username FROM MUser where muser.username = $1";

			$password = $_POST['password'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$username = $_POST['username'];
            $hpassword = password_hash($password, PASSWORD_DEFAULT);
            $rs = pg_query_params($db_connection, $emailalreadyexists, array($email));
            $row = pg_num_rows ($rs); 
          
            if($row  == 0){

                $rs = pg_query_params($db_connection, $usernamealreadyexists, array($username));
                $row1 = pg_num_rows ($rs); 

                if($row1 == 0){

                    $rs = pg_query_params($db_connection, $sql, array($username, $email, $name, $hpassword));

                     if(pg_affected_rows($rs) != 0){

                        $return = array("message"=>"Registration complete");
                        echo json_encode($return);

                    }else{
                        $return = array("message"=>"Registration failed");
                        echo json_encode($return);
                        
                    }

                }else{
                    $return = array("message"=>"Username already taken");
                    echo json_encode($return);
                    
                }
                
            }else{
                $return = array("message"=>"Email already taken");
                echo json_encode($return);
            }
			pg_close($db_connection);
			
        exit();

        ?>
			
			
			