<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $prd = $_POST['prd'];
    $pb = $_POST['pb'];
    $pdis = $_POST['pdis'];
    $cp = $_POST['cp'];
    $cop = $_POST['cop'];
    $pd = $_POST['pd'];
    $nos = $_POST['nos'];
    $dp = $_POST['dp'];
    $mp = $_POST['mp'];
   
   
    require("database_connection.php");
    
    $sel = $con->query("SELECT * FROM PRODUCT WHERE ID ='$_POST[id]' ");
    if ($sel) {
        while ($row=$sel->fetch_assoc()) {
            $csto=$row['STOCK_QUANTITY']+$nos;
            $osto=$row['OPENING_STOCKS']+$nos;
        }
        
        $up = $con->query("UPDATE PRODUCT SET PRODUCT_NAME='$prd',PRODUCT_BRAND='$pb',PERCENTAGE_DISCOUNT='$pdis',COST_PRICE='$cp',PRODUCT_CATEGORY='$cop',PRODUCT_DESCRIPTION='$pd',OPENING_STOCKS='$osto',STOCK_QUANTITY='$csto',DISCOUNT_PRICE='$dp',SELLING_PRICE='$mp' WHERE ID ='$_POST[id]' "); 
       
        if ($up) {
            header("location:product_update.php?m='PRODUCT UPDATE SUCCESSFUL'");
        }else {
            header("location:product_update.php?m='PRODUCT NOT UPDATED'");
        }
    }
   
   
}

?>