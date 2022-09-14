
<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $pro_id = $_POST['pro_id'];
    $pn = $_POST['pn'];
    $cp = $_POST['cp'];
    $sp = $_POST['sp'];
    $ta = $_POST['ta'];
    $ap = $_POST['ap'];
    $qpb = $_POST['qpb'];
    $bal = $_POST['bal'];
    $status = $_POST['status'];
    if ($bal>=0) {
        $status = "COMPLETED";
        $bal = 0;
    }else {
        $status = "UNCOMPLETED";
    }
    $rep = $_POST['rep'];
    $dep = $_POST['dep'];
    $cname = $_POST['cname'];
    $pno = $_POST['pno'];
    $date=date("d/m/y");
    $hour=date("h")+1;
    $time=date("$hour:i:s.a");

    require("database_connection.php");

    $insert = $con->query("INSERT INTO sales_registration
    (PRODUCT_ID,PRODUCT_NAME,COST_PRICE,SELLING_PRICE,TOTAL_AMOUNT,AMOUNT_PAID,QUANTITY_OF_PRODUCT_BOUGHT,BALANCE,STATUS_OF_PRODUCT,SOLD_BY,SOLD_BY_ID,CUSTOM_NAME,PHONE_NUMBER,DATE,TIME)VALUE('$pro_id','$pn','$cp','$sp','$ta','$ap','$qpb','$bal','$status','$rep','$dep','$cname','$pno','$date','$time')");
    if ($insert) {
        $sel = $con->query("SELECT * FROM PRODUCT WHERE ID='$pro_id' ");
        if ($sel) {
            while ($row=$sel->fetch_assoc()) {
                $cup = $row['STOCK_QUANTITY']-$qpb;
                $up = $con->query("UPDATE PRODUCT SET STOCK_QUANTITY='$cup' WHERE ID='$pro_id' ");
                $ins=$con->query("INSERT INTO transactions 
                (PRODUCT_ID,PRODUCT_NAME,TOTAL_AMOUNT,AMOUNT_PAID,QUANTITY_OF_PRODUCT_REMAINING,QUANTITY_OF_PRODUCT_BOUGHT,STATUS_OF_PRODUCT,SALES_STATUS,DATE,TIME)VALUE('$pro_id','$pn','$ta','$ap','$cup','$qpb','$status','SALES INSERTED','$date','$time')");
            }
        }
        
        header("location:add_sales.php?msg='sales uploaded'");
    }else {
        header("location:add_sales.php?msg='sales not uploaded'");
    }
}

?>