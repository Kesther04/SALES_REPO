<?php session_start();
if(!isset($_SESSION['id'])){
    header('location:.../../admin_access_system/per_sales_login_admin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css_sales/sales_management.css" media="all">
    <title>PRODUCT FIELDS</title>
</head>
<body>

<?php require("../../dashboard/dashboard_header22.php") ?>

<?php

require("../../d_con/database_connection.php");

$sel = $con->query("SELECT * FROM PRODUCT WHERE ID='$_GET[msg]' ");

if ($sel) {
      echo "<div class='pre-div'>";
    
      while ($row=$sel->fetch_assoc()) {
    
        echo    "<div class='rec-div'>";
        
        echo "<div style='float:left;box-shadow: 0px 2px 15px 0px rgb(216, 216, 216);border-radius:20px;width:100%;padding:10px;'>";

        echo "<h2>PRODUCT DETAILS</h2>

        <div style='float:left;'><img src='../../images/$row[PRODUCT_IMAGE]' width='300' style='height:300px;border-radius:20px;'></div>
        <table>
        <tr><td><span>PRODUCT NAME:</span></td> <td>$row[PRODUCT_NAME]</td></tr>
        <tr><td><span>PRODUCT BRAND:</span></td> <td>$row[PRODUCT_BRAND]</td></tr>
        <tr><td><span>PERCENTAGE DISCOUNT:</span></td> <td>$row[PERCENTAGE_DISCOUNT]</td></tr> 
        <tr><td><span>PRODUCT DESCRIPTION:</span></td> <td>$row[PRODUCT_DESCRIPTION]</td></tr>
        <tr><td><span>PRODUCT CATEGORY:</span></td> <td>$row[PRODUCT_CATEGORY]</td></tr>
        </table>

        <table>
        
        <tr><td><span>OPENING STOCKS:</span></td> <td>$row[OPENING_STOCKS]</td></tr>
        <tr><td><span>COST PRICE:</span></td> <td>$row[COST_PRICE]</td></tr>
        <tr><td><span>DISCOUNT PRICE:</span></td> <td>$row[DISCOUNT_PRICE]</td></tr>
        <tr><td><span>SELLING PRICE:</span></td> <td>$row[SELLING_PRICE]</td></tr>
        <tr><td><span>DATE ADDED:</span></td> <td>$row[DATE]</td></tr>

        </table>";

        echo "</div>";
        $date = date("d/m/y");
        $sel = $con->query("SELECT *,SUM(TOTAL_AMOUNT),SUM(QUANTITY_OF_PRODUCT_BOUGHT) FROM sales_registration WHERE PRODUCT_ID='$_GET[msg]' AND DATE='$date' ");
        if ($sel) {
          echo "<div class='product-sales'>";
          echo "<h2>REPORT OF DAILY SALES</h2>";
          $bat = $sel->fetch_assoc();
          echo "<div>";
          echo "<h2>TOTAL SALES OF THE DAY</h2>";
          echo "<p>"; echo $bat['SUM(TOTAL_AMOUNT)']; echo "NGN</p>";
          echo "</div>";

          echo "<div>";
          echo "<h2>QUANTITY OF PRODUCTS SOLD</h2>";
          echo "<p>"; echo $bat['SUM(QUANTITY_OF_PRODUCT_BOUGHT)']; echo "</p>";
          echo "</div>";
          
          echo "</div>";
          
        }

        echo "<div style='float:left;width:100%;'>";
        $select = $con->query("SELECT TOTAL_AMOUNT, SUM(TOTAL_AMOUNT) FROM sales_registration WHERE PRODUCT_ID='$_GET[msg]' ");
        if ($select) {
        echo "<div class='detail-divs'>
        <h2>TOTAL SALES</h2>";
        $res=$select->fetch_assoc();
        echo "<p>";       
        echo $res['SUM(TOTAL_AMOUNT)'];
        echo "NGN";
        echo "</p>";
        echo "</div>";
        }

        $sel = $con->query("SELECT QUANTITY_OF_PRODUCT_BOUGHT, SUM(QUANTITY_OF_PRODUCT_BOUGHT) FROM sales_registration WHERE PRODUCT_ID='$_GET[msg]' ");
        if ($sel) {
        echo "<div class='detail-divs'>
        <h2>TOTAL PRODUCTS SOLD</h2>";
          $a =$sel->fetch_assoc();
            echo "<p>";
            echo $a['SUM(QUANTITY_OF_PRODUCT_BOUGHT)'];
            echo "</p>";
        
        echo "</div>";
        }

        echo "<div class='detail-divs'>
        <h2>REMAINING STOCK</h2>";
        echo "<p>$row[STOCK_QUANTITY]</p>";
        "</div>";
        echo "</div>";
        
        echo "</div>";
}

   echo "</div>";

}

?>


   
</body>
</html>