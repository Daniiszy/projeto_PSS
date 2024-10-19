<?php
    session_start();

    session_destroy();

    sleep(5);
    
    header("Location: index.php");
    exit();
?>