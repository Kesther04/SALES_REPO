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
    <title>PRODUCT TABLE</title>
</head>
<body>
    
<?php require("dashboard_header22.php") ?>


<div class="re-div">
<?php
$con = new mysqli("localhost","root","","SALES");

$select = $con->query("SELECT * FROM PRODUCT");
if($select){
    echo "";
    echo "<table class='dre-class'>";
    echo "<tr id='beef'>";

    echo "
        <td>PRODUCT_NAME</td>
        <td>OPENING_STOCKS</td> 
        <td>CLOSING_STOCKS</td>
        <td>PRODUCT_CATEGORY</td>
        <td>COST_PRICE</td> 
        <td>SELLING_PRICE</td>
        <td>TOTAL_AMT</td>
        <td>DATE</td>
        <td>VIEW_OTHER_DETAILS</td>";
    echo "</tr>";

    while ($row = $select->fetch_assoc()) {
        echo "<tr class='beef'>";
        echo " 
            <td>$row[PRODUCT_NAME]</td>
            <td>$row[OPENING_STOCKS]</td>
            <td>$row[STOCK_QUANTITY]</td> 
            <td>$row[PRODUCT_CATEGORY]</td> 
            <td>$row[COST_PRICE]NGN</td> 
            <td>$row[SELLING_PRICE]NGN</td>";  
 
            $sel = $con->query("SELECT *, SUM(TOTAL_AMOUNT), SUM(QUANTITY_OF_PRODUCT_BOUGHT) FROM sales_registration WHERE PRODUCT_ID='$row[ID]'");
            if ($sel) {
                    $res=$sel->fetch_assoc();       
                    $am=$res['SUM(TOTAL_AMOUNT)'];
                    $qb=$res['SUM(QUANTITY_OF_PRODUCT_BOUGHT)']; 
                    echo "<td>";
                    echo $am; 
                    echo "NGN</td>";
            } 
        echo "<td>$row[DATE]</td>
            <td><button class='gut'><a href='product_fields?msg=$row[ID]'>PRODUCT DETAILS</a></button></td>";
        echo "</tr>";
        echo "<tr class='beef'>
        <td></td>
        <td></td>
        <td></td>
        <td></td> 
        <td></td>
        <td align=right>TOTAL PROFIT</td>
       ";
        
        $sel = $con->query("SELECT *, SUM(TOTAL_AMOUNT), SUM(QUANTITY_OF_PRODUCT_BOUGHT) FROM sales_registration WHERE PRODUCT_ID='$row[ID]'");
        if ($sel) {
                $res=$sel->fetch_assoc();       
                $am=$res['SUM(TOTAL_AMOUNT)'];
                $qb=$res['SUM(QUANTITY_OF_PRODUCT_BOUGHT)']; 
                echo "<td bgcolor='darkcyan'>";
                echo ($am)-($qb*$row['COST_PRICE']); 
                echo "NGN</td>";
        } 
        
        echo "
       
        </tr>";
    }
    echo "</table>";
}

?>


<?php
   
    
    
    
    
    
?>
   
</div>

  

</body>
</html>