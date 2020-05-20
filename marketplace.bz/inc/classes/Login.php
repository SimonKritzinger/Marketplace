<?PHP
    $db_connection = pg_pconnect("host=localhost port=5433 dbname=Marketplace user=Admin password=master69key420");
    $emailexist ="SELECT email, passwordhash, userid, username  FROM MUser where muser.email = $1";

    $password = $_POST['password'];
    $email = $_POST['email'];

    $rs = pg_query_params($db_connection, $emailexist, array($email));
    $row = pg_num_rows ($rs); 
    $rw = pg_fetch_row($rs);
    
    if($row == 0){

        $return = array("message"=>"Sorry we could not find a user for this Email");
        echo json_encode($return);

    }else{

        $pw1 = $rw[1];

        if(password_verify ($password, $pw1)){

        $return = array("message"=>"Login completed", "email"=> $rw[0], "userid"=> $rw[2], "username"=>$rw[3]);
        echo json_encode($return);

        }else{
            
            $return = array("message"=>"Wrong password");
        } 
    }
?>