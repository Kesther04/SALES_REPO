<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $id = $_POST['id'];
    $prd = $_POST['prd'];
    $pb = $_POST['pb'];
    $pdis = $_POST['pdis'];
    $cp = $_POST['cp'];
    $cop = $_POST['cop'];
    $pd = $_POST['pd'];
    $nos = $_POST['nos'];
    $dp = $_POST['dp'];
    $mp = $_POST['mp'];
    $filename = $_FILES['pim']['name'];
    $date=date("d/m/y");
    $hour=date("h")+1;
    $time=date("$hour:i:s.a");


    require("database_connection.php");
    
    $del = $con->query("DELETE FROM PRODUCT");

    if ($del) {
    $insert = $con->query("INSERT INTO DELETE_BIN
    (PRODUCT_ID,PRODUCT_NAME,PRODUCT_BRAND,PERCENTAGE_DISCOUNT,COST_PRICE,PRODUCT_CATEGORY,PRODUCT_DESCRIPTION,OPENING_STOCKS,STOCK_QUANTITY,DISCOUNT_PRICE,SELLING_PRICE,PRODUCT_IMAGE,DATE,TIME)VALUE('$id','$prd','$pb','$pdis','$cp','$cop','$pd','$nos','$nos','$dp','$mp','$filename','$date','$time')");
    header("location:add_product.php?msg='PRODUCT DELETED'");
    }else {
    header("location:add_product.php?msg='PRODUCT NOT DELETED'");
    }
    
}
   
?>
