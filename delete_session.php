<?php
    require_once("session.php");

    $_SESSION["logged"] = "false";
    session_unset();
    session_destroy();

    echo "<p> Done </p>";
    header("Location: index.php");
?>