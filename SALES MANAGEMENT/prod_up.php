<?php if ($_SERVER['REQUEST_METHOD']=="POST") { ?>

<div class="pro-div" style="margin-top:20px;">

<?php
     require("database_connection.php");
    $select = $con->query("SELECT * FROM PRODUCT WHERE ID ='$_POST[id]' ");
    if ($select) {
        while ($row=$select->fetch_assoc()) {

?>

<div style="width:100%;float:left;">
<?php echo "<img src='images/$row[PRODUCT_IMAGE]' style='border-radius:20px;width:250px;'>"; ?>
</div>

<h1>UPDATE PRODUCT</h1>

<form name="prod-form" id="product-form" method="post" action="backend_prod_up.php">


<table>

<tr>    
    <td>NAME OF PRODUCT:</td> 
    <td><input type="text" size="20" name="prd" value="<?php echo $row['PRODUCT_NAME'] ?>" readonly required></td>
</tr>

<tr>
    <td>PRODUCT BRAND:</td>
    <td><input type="text" size="20" value="NEW BRAND" name="pb" readonly></td>
</tr>



<tr>
    <td>PERCENTAGE DISCOUNT:</td> 
    <td><input type="text" size="20" name="pdis" value="<?php echo $row['PERCENTAGE_DISCOUNT'] ?>"  required></td>
</tr>


<tr>
    <td>COST PRICE:</td>
    <td><input type="text" size="20" name="cp" value="<?php echo $row['COST_PRICE'] ?>"  required></td>
</tr>



<tr>
    
    <td>OPENING STOCKS:</td>
    <td><input type="number" size="20" name="nos" value="<?php echo $row['OPENING_STOCKS'] ?>"  required></td>

</tr>


</table>

<table>

<tr>
    <td>CATEGORY OF PRODUCT:</td>
    <td><input type="text" size="20" name="cop" value="<?php echo $row['PRODUCT_CATEGORY'] ?>" readonly required></td>
</tr>

<tr>
    <td>PRODUCT DESCRIPTION:</td>
    <td><input type="text" size="20" name="pd" value="<?php echo $row['PRODUCT_DESCRIPTION'] ?>"  required></td>
</tr>


<tr>
    <td>DISCOUNT PRICE:</td> 
    <td><input type="text" size="20" name="dp" value="<?php echo $row['DISCOUNT_PRICE'] ?>"  required></td>
 
</tr>

<tr>
    <td>SELLING PRICE:</td> 
    <td><input type="text" size="20" name="mp"  onkeyup="discount()" value="<?php echo $row['SELLING_PRICE'] ?>"  required></td>
    <script src="sales.js"></script>
</tr>


<tr>
    
    <td>STOCK QUANTITY:</td>
    <td><input type="number" size="20"  value="<?php echo $row['STOCK_QUANTITY'] ?>" readonly required></td>

</tr>

<input type="hidden" name="id" value="<?php echo $row['ID'] ?>">
</table>


<div class="add-but-div">    
    <button class="add-but">UPDATE</button>
</div>

</form>

</div>

<?php } } } ?>