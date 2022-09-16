<div>
            
    <?php if ($_SERVER['REQUEST_METHOD']=="POST") { ?>
        <div class="dis">
    <form name="prx-form" id="prx-form" action="admin_update_per.php" method="post">
        <table>
    <?php
    require("database_connection.php");
    
    $select = $con->query("SELECT * FROM sales_registration WHERE ID='$_POST[id]'");
    if($select){
        while ($des=$select->fetch_assoc()) { ?>
             
           
                <?php
                $sel = $con->query("SELECT * FROM PRODUCT WHERE ID='$des[PRODUCT_ID]'");
                if($sel){
                    while ($rac=$sel->fetch_assoc()) {
                    echo "<img src='images/$rac[PRODUCT_IMAGE]' style='height:250px;border-radius:20px;width:20%;'>";
                }
            }
            
            ?>
            
        <h2>UPDATE SALES TRANSACTION<h2>
    <tr> 
        <td>PRODUCT NAME:</td> 
        <td><input type="text" size="25" name="pn" required value="<?php echo $des['PRODUCT_NAME']; ?>" readonly></td>
                    
        <td>COST PRICE:</td> 
        <td><input type="text" size="25" name="cp" required value="<?php echo $des['COST_PRICE']; ?>" readonly></td>
                
        <td>SELLING PRICE:</td> 
        <td><input type="text" size="25" name="sp" required value="<?php echo $des['SELLING_PRICE']; ?>"  readonly></td>
    </tr>
                
        <input type="hidden" name="prod_code" required value="<?php echo $des['ID']; ?>">
        <input type="hidden" name="prod_id" required value="<?php echo $des['PRODUCT_ID']; ?>">

    <tr>
        <td>QUANTITY OF PRODUCT:</td> 
        <td>
        <?php $dac=$des['QUANTITY_OF_PRODUCT_BOUGHT']; ?>           
           
           <select required   name="qpb" onchange="total()">
               <?php for ($a=$dac; $a >= 0; $a--) { ?> 
               <option><?php echo $a; ?></option>
               <?php } ?>
        </td> 
        
        <td>AMOUNT PAID:</td> 
        <td><input type="number" size="25" name="ap" required onkeyup="bold()" value="<?php echo $des['AMOUNT_PAID']; ?>"></td> 
        
        <td>TOTAL  AMOUNT:</td> 
        <td><input type="number" size="25" required readonly name="ta" value="<?php echo $des['TOTAL_AMOUNT']; ?>"></td> 
    </tr>
    
    <tr>
        <td>BALANCE:</td> 
        <td><input type="text" size="25" name="bal" required readonly value="<?php echo $des['BALANCE']; ?>"></td>
    
        <input type="hidden" name="status">
        <input type="hidden" value="<?php echo  $_SESSION['name']; ?>" name="rep">
        <input type="hidden" value="<?php echo  "$_SESSION[id] $_SESSION[email]"; ?>" name="dep">

   
        <div>
        <td>CUSTOMER NAME:</td> 
        <td><input type="text" size="25" name="cname" required readonly value="<?php echo $des['CUSTOM_NAME']; ?>"></td>

        <td>PHONE NUMBER:</td> 
        <td><input type="number" size="25" name="pno" required readonly value="<?php echo $des['PHONE_NUMBER']; ?>"></td>
        </div>
    </tr>
        
    
    </table>

    <p><button>UPDATE SALES</button></p>
    </form>
    <script src="sales.js"></script>
    
    <?php } } } ?>
    
</div>