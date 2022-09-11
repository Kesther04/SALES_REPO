<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAILY SALES</title>
</head>
<body>
        <?php if ($_SERVER['REQUEST_METHOD']=="POST") { ?>
        
        
        <?php 
        $con = new mysqli("localhost","root","","SALES");
        $sel = $con->query("SELECT * FROM sales_registration WHERE DATE='$_POST[wed]' ");
        if ($sel) {
            echo "<div class='dre-div'>";
            echo "<table>";
            echo "<tr id='beef'>";
        
            echo "
                <td>PRODUCT_NAME</td> 
                <td>PRODUCT_PRICE</td>
                <td>AMOUNT_PAID</td>
                <td>TOTAL_AMOUNT</td>
                <td>BALANCE</td>
                <td>PROD.QNTY</td>
                <td>STATUS_OF_PRODUCT</td>
                <td>DATE</td>";
            echo "</tr>";
        
            while ($row = $sel->fetch_assoc()) {
                echo "<tr class='beef'>";
                echo " 
                <td>$row[PRODUCT_NAME]</td>
                <td>$row[SELLING_PRICE]</td> 
                <td>$row[AMOUNT_PAID]</td>
                <td>$row[TOTAL_AMOUNT]</td>
                <td>$row[BALANCE]</td>
                <td>$row[QUANTITY_OF_PRODUCT_BOUGHT]</td>
                <td>$row[STATUS_OF_PRODUCT]</td>
                <td>$row[DATE]</td>";
                echo "</tr>";
                
            }
            echo "</table>";
            
            echo "</div>";
        
        
        ?>

        <?php } ?>

       <?php } ?>
</body>
</html>