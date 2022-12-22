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
    
    require("../../d_con/database_connection.php");
    
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
            $selec = $con->query("SELECT * FROM sales_registration WHERE ID='$_POST[prod_code]' ");
            if ($selec) {
                while($cow = $selec->fetch_assoc()){
            echo " 
            <link rel='stylesheet' href='../../css_sales/sales_receipt.css' media='all'>
            <div class='dis'>
            <form name='sales_form' action='sales_update_per.php'>
            <h2>ELECTRONIC SALES<h2>
    
            <table style='float:left;'>
            <tr><td>CUSTOMER DETAILS</td></tr> 
            <tr><td>$cow[CUSTOM_NAME]</td></tr> 
            <tr><td>$cow[PHONE_NUMBER]</td></tr>
            </table>
    
            <table style='float:right;margin-left:20%;text-align:center;width:40%;'>
            <tr><td>DATE OF TRANSACTION</td></tr>
            <tr><td>$cow[DATE]</td></tr>
            </table>
                
            <table width='100%' style='margin-top:20px;float:left;'>    
                        <tr>
                            <td>QUANTITY OF PRODUCT</td> 
                            <td>PRODUCT NAME</td> 
                            <td>TOTAL AMOUNT PAID</td> 
                            <td>BALANCE</td>
                        </tr>
                       
                        <tr>
                            <td>$cow[QUANTITY_OF_PRODUCT_BOUGHT]</td>  
                            
                            <td>$cow[PRODUCT_NAME]</td>
    
                            <td>$cow[AMOUNT_PAID] NGN</td> 
                         
                            <td>$cow[BALANCE]</td>
                            
                        </tr>
            </table>
    
            <table style='margin-top:20px;float:right;'>
    
                    <tr>
                        <td>PRODUCT STATUS:</td> 
                        <td>TRANSACTION $cow[STATUS_OF_PRODUCT]</td>
                    </tr>
                    <tr>
                        <td>SOLD BY:</td>
                        <td>$cow[SOLD_BY]</td>
                    </tr>
                
                    <tr>
                    <td>PRODUCT CODE:</td>
                     <td>$cow[ID]</td> 
                    </tr>
            </table>
    
            <p><button onclick='window.print()'>SALES RECEIPT</button></p>
            </form>
            
             
</div>";
}}

        }else {
            //if such sales is not updated successfully
            header("location:sales_update_per.php?msg='sales not updated'");
        }
    }
   
}

?>