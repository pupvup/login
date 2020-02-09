<?php
    session_start();

    if ($_SESSION['email'])
        echo "[OK]";
    else
        header("Location: index.php");

?>