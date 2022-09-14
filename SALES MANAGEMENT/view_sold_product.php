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
    <link rel="stylesheet" href="sales_management.css" media="all">
    <title>SOLD PRODUCTS</title>
</head>
<body>
    <?php  require("dashboard_header.php") ?>

        <div>
            

            <?php
            $con = new mysqli("localhost","root","","SALES");
            

            
            $select = $con->query("SELECT * FROM sales_registration WHERE SOLD_BY='$_SESSION[name]' ORDER BY (ID)DESC");
            if($select){
                echo "<div class='dre-div'>";
                echo "<table>";
                echo "<tr id='beef'>";
            
                echo "
                    <td>PRODUCT_NAME</td> 
                    <td>AMOUNT_PAID</td>
                    <td>TOTAL_AMOUNT</td>
                    <td>BALANCE</td>
                    <td>PROD.QNTY</td>
                    <td>STATUS_OF_PRODUCT</td>
                    <td>DATE</td>
                    <td>VIEW_OTHER_DETAILS</td>";
                echo "</tr>";
            
                while ($row = $select->fetch_assoc()) {
                    echo "<tr class='beef'>";
                    echo " 
                    <td>$row[PRODUCT_NAME]</td> 
                    <td>$row[AMOUNT_PAID]</td>
                    <td>$row[TOTAL_AMOUNT]</td>
                    <td>$row[BALANCE]</td>
                    <td>$row[QUANTITY_OF_PRODUCT_BOUGHT]</td>
                    <td>$row[STATUS_OF_PRODUCT]</td>
                    <td>$row[DATE]</td>
                        <td><button class='gut'><a href='sales_fields?msg=$row[ID]'>SALES DETAILS</a></button></td>";
                    echo "</tr>";
                    
                }
                echo "</table>";
                
                echo "</div>";
            }
            
            ?>
            
            
        </div>

</body>
</html>