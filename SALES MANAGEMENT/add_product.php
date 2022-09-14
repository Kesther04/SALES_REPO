<?php session_start();
if(!isset($_SESSION['id'])){
    header('location:per_sales_login_admin.php');
}
?>

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
    $filename = $_FILES['pim']['name'];
    $filetype = $_FILES['pim']['type'];
    $filesize = $_FILES['pim']['size'];
    $temp = $_FILES['pim']['tmp_name'];
    $date=date("d/m/y");
    $hour=date("h")+1;
    $time=date("$hour:i:s.a");
   
    $con = new mysqli("localhost","root","","SALES");

    if ($filesize > 10000000000) {
    
    header("location:add_product.php?msg='FILESIZE IS TOO LARGE'");
    
    }elseif ($_FILES['pim']['type']!=="image/png" AND $_FILES['pim']['type']!=="image/jpg" AND $_FILES['pim']['type']!=="image/jpeg" AND 
    $_FILES['pim']['type']!=="image/jfif" AND $_FILES['pim']['type']!=="image/bmp" AND $_FILES['pim']['type']!=="image/webp") {

        header("location:add_product.php?msg='INVALID FILE TYPE'");

    }else {
    
    $insert = $con->query("INSERT INTO PRODUCT
    (PRODUCT_NAME,PRODUCT_BRAND,PERCENTAGE_DISCOUNT,COST_PRICE,PRODUCT_CATEGORY,PRODUCT_DESCRIPTION,OPENING_STOCKS,STOCK_QUANTITY,DISCOUNT_PRICE,SELLING_PRICE,PRODUCT_IMAGE,DATE,TIME)VALUE
    ('$prd','$pb','$pdis','$cp','$cop','$pd','$nos','$nos','$dp','$mp','$filename','$date','$time')");
    if ($insert) {
        header("location:add_product.php?m=inserted successfully");
        move_uploaded_file($temp, "images/".$_FILES['pim']['name']);
    }else{
        header("location:add_product.php?m=not inserted");
    }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sales_management.css" media="all">
    <title>ADD PRODUCT</title>
</head>
<body>
    <?php require("dashboard_header22.php") ?>

<div class="pre-div" >
<div class="pro-div">
    <h1>ADD PRODUCT</h1>
<form name="product-form" id="product-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
    <?php    
  $con = new mysqli("localhost","root","","SALES");

    if(isset($_GET['m'])){}
    if(isset($_GET['msg'])){}
    ?>
    
    
    <table>
    
    <tr>    
        <td>NAME OF PRODUCT:</td> 
        <td><input type="text" size="20" name="prd"></td>
    </tr>
    
    <tr>
        <td>PRODUCT BRAND:</td>
        <td><input type="text" size="20" value="NEW BRAND" name="pb" readonly></td>
    </tr>

    
    
    <tr>
        <td>PERCENTAGE DISCOUNT:</td> 
        <td><input type="text" size="20" name="pdis"></td>
    </tr>
    
    
    <tr>
        <td>COST PRICE:</td>
        <td><input type="text" size="20" name="cp"></td>
    </tr>
    
    
    
    <tr>
        
        <td>STOCK QUANTITY:</td>
        <td><input type="number" size="20" name="nos"></td>
    
    </tr>
    
    
    </table>

    <table>
    
    <tr>
        <td>CATEGORY OF PRODUCT:</td>
        <td><input type="text" size="20" name="cop"></td>
    </tr>

    <tr>
        <td>PRODUCT DESCRIPTION:</td>
        <td><input type="text" size="20" name="pd"></td>
    </tr>
    
    
    <tr>
        <td>DISCOUNT PRICE:</td> 
        <td><input type="text" size="20" name="dp"></td>
     
    </tr>
    
    <tr>
        <td>SELLING PRICE:</td> 
        <td><input type="text" size="20" name="mp"  onkeyup="discount()"></td>
        <script src="sales.js"></script>
    </tr>
    
    <tr>
        <td>PRODUCT IMAGE:</td>
        <td><input type="file" name="pim"></td>
    </tr>
    </table>
   

    <div class="add-but-div">    
        <button class="add-but">ADD</button>
    </div>

</form>

</div>

    <div class="but-but-div">    
        <button class="but-but"><a href="product_update.php">UPDATE PRODUCT</a></button>
    </div>

    
    <div class="but-but-div">    
        <button class="but-but"><a href="delete_product.php">DELETE PRODUCT</a></button>
    </div>
</div>

</body>
</html>