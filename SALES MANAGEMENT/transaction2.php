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
    <title>TRANSACTION</title>
</head>
<body>

    <?php  require("dashboard_header.php") ?>

    
    <div>
            

            <?php
            require("database_connection.php");
            
            $select = $con->query("SELECT * FROM transactions ORDER BY (ID)DESC ");
            if($select){
                echo "<div class='dre-div'>";
                echo "<table>";
                echo "<tr id='beef'>";
            
                echo "
                    <td>PRODUCT_NAME</td> 
                    <td>AMOUNT_PAID</td>
                    <td>TOTAL_AMOUNT</td>
                    <td>PROD.QNTY</td>
                    <td>STATUS_OF_PRODUCT</td>
                    <td>SALES_STATUS</td>
                    <td>DATE</td>
                    <td>TIME</td>";
                echo "</tr>";
            
                while ($row = $select->fetch_assoc()) {
                    echo "<tr class='beef'>";
                    echo " 
                    <td>$row[PRODUCT_NAME]</td> 
                    <td>$row[AMOUNT_PAID]</td>
                    <td>$row[TOTAL_AMOUNT]</td>
                    <td>$row[QUANTITY_OF_PRODUCT_BOUGHT]</td>
                    <td>$row[STATUS_OF_PRODUCT]</td>
                    <td>$row[SALES_STATUS]</td>
                    <td>$row[DATE]</td>
                    <td>$row[TIME]</td>";
                    echo "</tr>";
                    
                }
                echo "</table>";
                
                echo "</div>";
            }
            
            ?>
            
            
        </div>
</body>
</html>