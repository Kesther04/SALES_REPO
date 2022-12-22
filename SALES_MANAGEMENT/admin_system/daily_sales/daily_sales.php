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
    <title>DAILY SALES</title>
</head>
<body>

    <?php  require("../../dashboard/dashboard_header22.php") ?>

    <section class="sales-main-tag">
    <?php 
         require("../../d_con/database_connection.php");
        $sel = $con->query("SELECT * FROM sales_registration GROUP BY DATE ORDER BY (ID)DESC");
        if ($sel) {
            echo "<div class='sel-prod'>";
            echo "<div class='mini-sel-prod'>";
    ?>
        <form name="d-sales-form" action="daily_sales.php" method="post">
        <p>SELECT DATE: <select name='wed' required>
            <option></option>

    <?php  
            while ($row = $sel->fetch_assoc()) {
                echo "<option>$row[DATE]</option>";
            }
            
    ?>

        </select></p>
        <p><button>VIEW</button></p>

    <?php 
        echo "</div>";
        echo "</div>";
        } 
    ?>

   
    <?php 
        require("full_daily_sales_admin.php"); 
    ?>
     </section>
</body>
</html>