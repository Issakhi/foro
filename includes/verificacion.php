<?php
    session_start();
    
    if($_SESSION['verifi'] !="true"){
        header('Location: login.php');
    }

    
?>



