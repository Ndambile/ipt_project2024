<?php
    session_destroy();
    $_GET['variable'] = "";
    $_POST['variable'] = "";

    header("Location: ../index.php");
    die;
?>