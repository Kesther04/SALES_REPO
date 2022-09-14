<?php session_start();
if(!isset($_SESSION['id'])){
    header('location:per_sales_login_admin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sales_management.css" media="all">
    <title>DELETE PRODUCT</title>
</head>
<body>
    <?php require("dashboard_header22.php") ?>
   
<div class="pre-div">
    
    <div class="sel-prod">
        
        <form name="product-form" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        
        <p>SELECT PRODUCT:
        <?php
            $con = new mysqli("localhost","root","","SALES");
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

    <?php require("del_pro.php") ?>

</div>  

</body>
</html>