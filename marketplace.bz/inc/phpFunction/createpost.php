<?php
        session_start();
        $pdescription = $_POST['description'];
        $titel = $_POST['titel'];
        $category = $_POST['category'];

        $upload_dir = "\sites\marketplace.bz\marketplace.bz\inc\images".DIRECTORY_SEPARATOR;
        $allowed_types = array('jpg', 'png', 'jpeg', 'gif');

        $maxsize = 2 * 1024 * 1024;
        $imagefilepatharray =array();
        $stboolean = false;
        //implemented with foreach so that if needed in the future upload of multiple images can be done
        foreach ($_FILES['files']['tmp_name'] as $key => $value) {
            $file_tmpname = $_FILES['files']['tmp_name'][$key];
            $file_name = $_FILES['files']['name'][$key];
            $file_size = $_FILES['files']['size'][$key];
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

            $filepath = $upload_dir.$file_name;

            if(in_array(strtolower($file_ext), $allowed_types)) {

                if ($file_size > $maxsize){
                   $return4 = array("message"=> 'Error: File size is larger than the allowed limit');
                    echo json_encode($return4);
                    exit;
                }

                if(file_exists($filepath)) {
                    $filepath = $upload_dir.time().$file_name;
                    $file_name = time().$file_name;

                    if(move_uploaded_file($file_tmpname, $filepath)) {
                       $stboolean = true;
                       $imagefilepatharray[] = $file_name;
                    }
                }else{

                    if( move_uploaded_file($file_tmpname, $filepath)) {
                        $stboolean = true;
                        $imagefilepatharray[] = $file_name;
                    }

                }

            }else {

                // If file extention not valid
                $return5 = array("message"=> '{$file_ext} file type is not allowed');
                echo json_encode($return5);
                exit;
            }
        }

        if($stboolean == true){

            $userid = $_SESSION['userid'];

            $db_connection = pg_pconnect("host=localhost port=5433 dbname=Marketplace user=Admin password=master69key420");
            $insertpostsql ="INSERT INTO post(userid, category, titel, description, primaryimage) VALUES($1, $2, $3, $4, $5)";
            $rs = pg_query_params($db_connection, $insertpostsql, array($userid, $category, $titel, $pdescription, $file_name));

            if(pg_affected_rows($rs) != 0){

                $return1 = array("message"=>'Post was created');
                echo json_encode($return1);

            }else{
                $return2 = array("message"=>'Post creation failed');
                echo json_encode($return2);

            }

        }else{
        $return6 = array("message"=>"error");
        echo json_encode($return6);
        }

        pg_close($db_connection);
        exit();
?>
