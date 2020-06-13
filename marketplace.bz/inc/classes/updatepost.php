<?php
$db_connection = pg_pconnect("host=localhost port=5433 dbname=Marketplace user=Admin password=master69key420");
      

    if(!$db_connection){
        echo "An Error occured while trying to connect to the Database.\n";
        exit;
    }else if($_POST['input'] == "Search"){

       $searchtext = $_POST['searchinput'];

       $sql = "SELECT postid, category, titel,  description, primaryimage , email FROM post join muser on muser.userid = post.userid AND titel ILIKE $1 ORDER BY creationtime DESC;";
       $result = pg_query_params($db_connection, $sql, array($searchtext));

                if(!$result){
                    $return = array("message"=>"An Error occured while trying to query the Database.\n");
                    echo json_encode($return);
                    exit;
                }else{

                    if(pg_num_rows($result) == 0){
                        $return = array("message"=>"There are 0 records.\n");
                        echo json_encode($return);
                    
                    }else{
                        
                        $return = pg_fetch_all($result);
                        echo json_encode($return);  


                    }
                }
    }else{

        switch($_POST['input']){

            case "Books":
                $sql = "SELECT postid, category, titel,  description, primaryimage , email FROM post join muser on muser.userid = post.userid AND Post.category = 'Books' ORDER BY creationtime DESC;";
            break;

            case "Entertainment":
                $sql = "SELECT postid, category, titel, description, primaryimage , email FROM post join muser on muser.userid = post.userid AND Post.category = 'Entertainment' ORDER BY creationtime DESC;";
            break;

            case "Electronic":
                $sql = "SELECT postid,  category, titel, description, primaryimage , email FROM post join muser on muser.userid = post.userid AND Post.category = 'Electronic' ORDER BY creationtime DESC;";
            break;

            case "Videogames":
                $sql = "SELECT postid, category, titel, description, primaryimage, email FROM post join muser on muser.userid = post.userid AND Post.category = 'Videogames' ORDER BY creationtime DESC;";
            break;

            case "Games":
                $sql = "SELECT postid,  category, titel, description, primaryimage, email FROM post join muser on muser.userid = post.userid AND Post.category = 'Games' ORDER BY creationtime DESC;";
            break;

            case "House":
                $sql = "SELECT postid,  category, titel, description, primaryimage, email FROM post join muser on muser.userid = post.userid AND Post.category = 'House' ORDER BY creationtime DESC;";
            break;

            case "Health and Care":
                $sql = "SELECT postid,  category, titel, description, primaryimage, email FROM post join muser on muser.userid = post.userid AND Post.category = 'Health and Care' ORDER BY creationtime DESC;";
            break;

            case "Colthing":
                $sql = "SELECT postid,  category, titel, description, primaryimage, email FROM post join muser on muser.userid = post.userid AND Post.category = 'Colthing' ORDER BY creationtime DESC;";
            break;

            case "Sport":
                $sql = "SELECT postid,  category, titel, description, primaryimage, email FROM post join muser on muser.userid = post.userid AND Post.category = 'Sport' ORDER BY creationtime DESC;";
            break;

            case "Vehicle":
                $sql = "SELECT postid,  category, titel, description, primaryimage, email FROM post join muser on muser.userid = post.userid AND Post.category = 'Vehicle' ORDER BY creationtime DESC;";
            break;

            case "Office":
                $sql = "SELECT postid,  category, titel, description, primaryimage, email FROM post join muser on muser.userid = post.userid AND Post.category = 'Office' ORDER BY creationtime DESC;";
            break;

            case "Services":
                $sql = "SELECT postid,  category, titel, description, primaryimage, email FROM post join muser on muser.userid = post.userid AND Post.category = 'Services' ORDER BY creationtime DESC;";
            break;

        }
            $result = pg_query($db_connection,$sql);
                if(!$result){
                    $return = array("message"=>"An Error occured while trying to query the Database.\n");
                    echo json_encode($return);
                exit;
                }else{

                    if(pg_num_rows($result) == 0){
                        $return = array("message"=>"There are 0 records.\n");
                        echo json_encode($return);
                    
                    }else{
                        
                        $return = pg_fetch_all($result);
                        echo json_encode($return);  


                    }
                }
    }
    
    

    pg_close($db_connection);

?>