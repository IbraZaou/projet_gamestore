<?php

include '_config.php';

session_start();
session_unset();
session_destroy();

header('location:seconnecter.php');

?>