<?php

session_start();

if ($_SERVER['REQUEST_METHOD']=="POST") {

    require("database_connection.php");

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    
    if (empty($email)) {
        header("location:per_sales_login_admin.php?msg=ENTER YOUR EMAIL ADDRESS");
    }
    elseif (empty($pass)) {
        header("location:per_sales_login_admin.php?msg=ENTER YOUR PASSWORD");
    }
    elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        header("location:per_sales_login_admin.php?msg=INVALID EMAIL ADDRESS");
    }else {
        $sel = $con->query(" SELECT * FROM admin_registration_tb WHERE EMAIL_ADDRESS = '$email' AND PASSWORD = '$pass' ");
        if($sel->num_rows>0){
            $row =$sel->fetch_assoc();
            $_SESSION['id'] = $row['ID'];
            $_SESSION['email'] = $row['EMAIL_ADDRESS'];
            $_SESSION['pass'] = $row['PASSWORD'];
            $_SESSION['name'] = $row['FULLNAME'];
    
            header("location:add_product.php?msg='WELCOME $_SESSION[name]'");
        }else {
            header("location:per_sales_login_admin.php?msg=INCORRECT EMAIL OR PASSWORD");
        }
    }
}

?>