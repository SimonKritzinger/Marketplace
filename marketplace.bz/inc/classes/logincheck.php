<?php
   session_start();
    if ((isset($_SESSION['login']) && $_SESSION['login'] != '')) {
        $return = array("message"=>"already logged in");
        echo json_encode($return);
    }

?>