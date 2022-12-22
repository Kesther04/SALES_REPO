<?php session_start();
if(!isset($_SESSION['id'])){
    header('location:../../admin_access_system/per_sales_login_admin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE SALES</title>
</head>
<body>
    <?php  require("../../dashboard/dashboard_header22.php") ?>

    <section class="sales-main-tag">

        <div class="sel-prod">
        
            <form name="up-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            
            <p>PRODUCT CODE: <span class="mini-sel-prod"><input type="number" name="id" required></span> </p>
           
            <p><button>VIEW PRODUCT</button></p>
            
            </form>

        </div>

        <?php require("uup_sales.php") ?>
    
    </section>
</body>
</html>