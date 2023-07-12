<?php

session_start();
unset($_SESSION['sessionId']);
unset($_SESSION['sessionUser']);
header("location:../index.php");

?>