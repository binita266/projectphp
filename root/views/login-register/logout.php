<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['id']);
$_SESSION = [];
session_destroy();
header("Location: login.php");