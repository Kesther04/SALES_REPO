<?php session_start();
if(!isset($_SESSION['id'])){
    header('location:per_sales_login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE SALES</title>
</head>
<body>

    <?php  require("dashboard_header.php") ?>

</body>
</html>