<?php

    setcookie("account_type", "", time() - 3600); // destroy account type cookie

    session_start();
    session_unset();
    session_destroy();
    header("location: index.php");

?>