
<?php if ($_SERVER['REQUEST_METHOD']=="POST") { ?>
    <div class="dis">
    <form name="prx-form" id="prx-form" action="add_sold" method="post">
        <table>
        <?php
        require("../../d_con/database_connection.php");

        $sel = $con->query("SELECT * FROM PRODUCT WHERE ID='$_POST[id]'");
        if ($sel) {
            while ($des=$sel->fetch_assoc()) {
                echo "<img src='../../images/$des[PRODUCT_IMAGE]' id='dimg'> <h2>MAKE SALES TRANSACTION<h2>";
                echo "<tr> <td>PRODUCT NAME:</td> <td><input type='text' size='25' name='pn' value='$des[PRODUCT_CATEGORY] $des[PRODUCT_NAME]' readonly></td>
                            <td>COST PRICE:</td> <td><input type='text' size='25' name='cp' value='$des[COST_PRICE]' readonly></td>
                     <td>SELLING PRICE:</td> <td><input type='text' size='25' name='sp' value='$des[SELLING_PRICE]'  readonly></td></tr>
                    <input type='hidden'name='pro_id' value='$des[ID]'>
                ";
            }
        
        ?>

        <tr><td>QUANTITY OF PRODUCT:</td> <td><input type="number" size="25" name="qpb" required onkeyup="total()" ></td> 
            <td>AMOUNT PAID:</td> <td><input type="number" size="25" name="ap" required onkeyup="bold()"></td> 
            <td>TOTAL  AMOUNT:</td> <td><input type="number" size="25" name="ta" required readonly></td> </tr>
        <tr><td>BALANCE:</td> <td><input type="number" size="25" name="bal" readonly required></td>
        <input type="hidden" name="status">
        <input type="hidden" value="<?php echo $_SESSION['name']; ?>" name="rep">
        <input type="hidden" value="<?php echo  "$_SESSION[id] $_SESSION[email]"; ?>" name="dep">

        <div>
            <td>CUSTOMER NAME:</td> <td><input type="text" size="25" name="cname" required></td>

            <td>PHONE NUMBER:</td> <td><input type="number" size="25" name="pno" required></td></tr>
        </div>
        </table>
    <p><button>ADD SALES</button></p>
    </form>
    <script src="../../js_sales/sales.js"></script>
    </div>

<?php } }?>