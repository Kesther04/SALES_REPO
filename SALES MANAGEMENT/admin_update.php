<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $qpb = $_POST['qpb'];
    $ta = $_POST['ta'];
    $ap = $_POST['ap'];
    $bal = $_POST['bal'];
    $status = $_POST['status'];
    if ($bal>=0) {
        $status = "COMPLETED";
        $bal = 0;
        $ap = $ta;
    }else {
        $status = "UNCOMPLETED";
    }
    $date=date("d/m/y");
    $hour=date("h")+1;
    $time=date("$hour:i:s.a");
    
    require("database_connection.php");
    
    $sel = $con->query("SELECT * FROM PRODUCT WHERE ID='$_POST[prod_id]' ");
    if ($sel) {
        //if selected successfully
        while ($row=$sel->fetch_assoc()) {
            $sele = $con->query("SELECT * FROM sales_registration WHERE PRODUCT_ID='$_POST[prod_id]'");
            if ($sele) {
                while ($dow=$sele->fetch_assoc()) {
                $cat=$dow['QUANTITY_OF_PRODUCT_BOUGHT']-$qpb;
                }
            }
            $cup=$row['STOCK_QUANTITY']+$cat;
            $update=$con->query("UPDATE PRODUCT SET STOCK_QUANTITY='$cup' WHERE ID='$_POST[prod_id]' ");
        }
        $up = $con->query("UPDATE sales_registration SET QUANTITY_OF_PRODUCT_BOUGHT='$qpb',TOTAL_AMOUNT='$ta',AMOUNT_PAID='$ap',BALANCE='$bal',STATUS_OF_PRODUCT='$status'  WHERE ID='$_POST[prod_code]' ");
        if ($up) {
            $ins=$con->query("INSERT INTO transactions 
            (PRODUCT_ID,PRODUCT_NAME,TOTAL_AMOUNT,AMOUNT_PAID,QUANTITY_OF_PRODUCT_REMAINING,QUANTITY_OF_PRODUCT_BOUGHT,STATUS_OF_PRODUCT,SALES_STATUS,DATE,TIME)VALUE('$_POST[prod_id]','$_POST[pn]','$ta','$ap','$cup','$qpb','$status','SALES UPDATED','$date','$time')");
            //if such sales is updated successfully    
            header("location:sales_update.php?msg='sales updated'");
        }else {
            //if such sales is not updated successfully
            header("location:sales_update.php?msg='sales not updated'");
        }
    }
   
}

?>