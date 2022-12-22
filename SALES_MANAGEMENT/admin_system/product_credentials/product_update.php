<?php session_start();
if(!isset($_SESSION['id'])){
    header('location:../admin_access_system/per_sales_login_admin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css_sales/sales_management.css" media="all">
    <title>UPDATE PRODUCT</title>
</head>
<body>
    <?php require("../../dashboard/dashboard_header22.php") ?>

    
<div class="pre-div">
    
    <div class="sel-prod">
        
        <form name="product-form" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        
        <p>SELECT PRODUCT:
        <?php
            require("../../d_con/database_connection.php");
            $select = $con->query("SELECT * FROM PRODUCT");
            if ($select) {
                echo "<span class='mini-sel-prod'>";
        ?>
        
        <select name='id' required>
        <option></option>

        <?php
            while ($row = $select->fetch_assoc()) {
                echo "<option value=$row[ID]>$row[PRODUCT_CATEGORY] $row[PRODUCT_NAME]</option>  ";   
            }
            echo "</select>";
            echo "</span>";  
            }
       ?>
        </p>
        
        <p><button>VIEW PRODUCT DETAILS</button></p>
        
        </form>

    </div>

    <?php require("prod_up.php") ?>

</div>
</body>
</html>