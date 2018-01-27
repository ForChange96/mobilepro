<?php
$debug = 0;
if (isset($_GET['debug']) && $_GET['debug']) {
    $debug = 1;
}
ini_set("display_errors", "{$debug}");
error_reporting(E_ALL);
session_start();
include "includes/init.php";
?>