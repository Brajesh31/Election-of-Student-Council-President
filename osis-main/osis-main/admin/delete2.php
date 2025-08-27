<?php
    include("../connection.php");
    $delete = $_GET['id'];

    $sql = "DELETE FROM user WHERE `id` = '".$delete."'";
    mysqli_query($connection, $sql);

    header('location:admins.php');
    if (!isset($_SESSION["username"]) == null) {
        header("Location: login.php");
        exit;
    }
?>