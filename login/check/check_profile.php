<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit;
}
include "../../database/connectDB.php";

$user_id   = $_SESSION['user_id'];
$user_name = $_POST['user_name'];
$old_pass  = $_POST['user_password'];
$new_pass  = $_POST['new_pass'];



if(
    $user_name != "" &&
    $password != "" &&
    $new_pass != ""){

















    }

?>