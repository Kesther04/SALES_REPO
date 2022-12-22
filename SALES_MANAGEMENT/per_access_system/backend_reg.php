<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $full = $_POST['full'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pno = $_POST['pno'];
    $date = date("d/m/y");
    $hour = date("h")+1;
    $time = date("$hour:i:s.a");

    require("../d_con/database_connection.php");

    $ins = $con->query("INSERT INTO registration_tb(FULLNAME,GENDER,EMAIL_ADDRESS,PASSWORD,PHONE_NUMBER,DATE,TIME)VALUE('$full','$gender','$email','$pass','$pno','$date','$time')");

    if ($ins) {
        header("location:per_sales_login.php");
    }else {
        header("location:per_sales_signup.php?msg='not registered'");
    }
}


?>