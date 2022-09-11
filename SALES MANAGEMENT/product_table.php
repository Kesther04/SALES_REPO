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



<?php
$con = new mysqli("localhost","root","","SALES");

$select = $con->query("SELECT * FROM PRODUCT");
if($select){
    echo "<div class='dre-div'>";
    echo "<table>";
    echo "<tr id='beef'>";

    echo "
        <td>PRODUCT_NAME</td> 
        <td>PRODUCT_BRAND</td> 
        <td>PRODUCT_CATEGORY</td>
        <td>COST_PRICE</td> 
        <td>SELLING_PRICE</td>
        <td>DATE</td>
        <td>TIME</td>
        <td>VIEW_OTHER_DETAILS</td>";
    echo "</tr>";

    while ($row = $select->fetch_assoc()) {
        echo "<tr class='beef'>";
        echo " 
            <td>$row[PRODUCT_NAME]</td> 
            <td>$row[PRODUCT_BRAND]</td> 
            <td>$row[PRODUCT_CATEGORY]</td> 
            <td>$row[COST_PRICE]</td> 
            <td>$row[SELLING_PRICE]</td>
            <td>$row[DATE]</td>
            <td>$row[TIME]</td>
            <td><button class='gut'><a href='product_fields?msg=$row[ID]'>PRODUCT DETAILS</a></button></td>";
        echo "</tr>";
        
    }
    echo "</table>";
    echo "</div>";
}

?>



</body>
</html>