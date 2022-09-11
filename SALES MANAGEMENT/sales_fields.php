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
    <title>SALES FIELDS</title>
</head>
<body>
    <?php  require("dashboard_header.php") ?>


<?php

$con = new mysqli("localhost","root","","SALES");

$sel = $con->query("SELECT * FROM sales_registration WHERE ID='$_GET[msg]' ");

if ($sel) {
      echo "<div class='pre-div'>";
    
      while ($row=$sel->fetch_assoc()) {
    
        echo    "<div class='rec-div'>";
        
        echo "<div style='float:left;box-shadow: 0px 2px 15px 0px rgb(216, 216, 216);border-radius:20px;width:100%;padding:10px;'>";

        echo "<h2>SOLD PRODUCT DETAILS</h2>

        
        <table>
        <tr><td><span>PRODUCT CODE:</span></td> <td>$row[ID]</td></tr>
        <tr><td><span>PRODUCT NAME:</span></td> <td>$row[PRODUCT_NAME]</td></tr>
        <tr><td><span>TOTAL AMOUNT:</span></td> <td>$row[TOTAL_AMOUNT]</td></tr>
        <tr><td><span>AMOUNT PAID:</span></td> <td>$row[AMOUNT_PAID]</td></tr>
        <tr><td><span>QUANTITY OF PRODUCT BOUGHT:</span></td> <td>$row[QUANTITY_OF_PRODUCT_BOUGHT]</td></tr>
        <tr><td><span>CUSTOMER'S NAME:</span></td> <td style='text-transform:uppercase;'>$row[CUSTOM_NAME]</td></tr>
        </table>

        <table>
        
        <tr><td><span>SELLING PRICE:</span></td> <td>$row[SELLING_PRICE]</td></tr>
        <tr><td><span>COST PRICE:</span></td> <td>$row[COST_PRICE]</td></tr>
        <tr><td><span>BALANCE:</span></td> <td>$row[BALANCE]</td></tr>
        <tr><td><span>STATUS OF PRODUCT:</span></td> <td>$row[STATUS_OF_PRODUCT]</td></tr>
        <tr><td><span>PHONE NUMBER OF CUSTOMER:</span></td> <td>$row[PHONE_NUMBER]</td></tr>
        <tr><td><span>DATE ADDED:</span></td> <td>$row[DATE]</td></tr>
        
        </table>";

        echo "</div>";
        
}

   echo "</div>";

}

?>

</body>
</html>