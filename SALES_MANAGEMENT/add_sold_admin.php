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
        $ap = $ta;
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

        echo " 
        <link rel='stylesheet' href='sales_receipt.css' media='all'>
        <div class='dis'>
        <form name='sales_form' action='add_sales_admin.php'>
        <h2>ELECTRONIC SALES<h2>

        <table style='float:left;'>
        <tr><td>CUSTOMER DETAILS</td></tr> 
        <tr><td>$cname</td></tr> 
        <tr><td>$pno</td></tr>
        </table>

        <table style='float:right;margin-left:20%;text-align:center;width:40%;'>
        <tr><td>DATE OF TRANSACTION</td></tr>
        <tr><td>$date</td></tr>
        </table>
            
        <table width='100%' style='margin-top:20px;float:left;'>    
                    <tr>
                        <td>QUANTITY OF PRODUCT</td> 
                        <td>PRODUCT NAME</td> 
                        <td>TOTAL AMOUNT PAID</td> 
                        <td>BALANCE</td>
                    </tr>
                   
                    <tr>
                        <td>$qpb</td>  
                        
                        <td>$pn</td>

                        <td>$ap NGN</td> 
                     
                        <td>$bal</td>
                        
                    </tr>
        </table>

        <table style='margin-top:20px;float:right;'>

                <tr>
                    <td>PRODUCT STATUS:</td> 
                    <td>TRANSACTION $status</td>
                </tr>
                <tr>
                    <td>SOLD BY:</td>
                    <td>$rep</td>
                </tr>
            
                <tr>
                <td>PRODUCT CODE:</td>";
                    $sele = $con->query("SELECT * FROM sales_registration ORDER BY (ID)DESC LIMIT 1 ");
                    if ($sele) {
                    while($dow = $sele->fetch_assoc()){
                    echo "<td>$dow[ID]</td>";
                        }
                    }
                echo "
                </tr>
        </table>

        <p><button onclick='window.print()'>SALES RECEIPT</button></p>
        </form>
        </div>
         ";
        
    }else {
        header("location:add_sales_admin.php?msg='sales not uploaded'");
    }


}

?>


