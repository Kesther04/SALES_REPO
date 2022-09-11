<?php 
session_start(); 
session_destroy();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sales_login.css" media="all">
    <title>LOGIN</title>
</head>

<body>
    
    <div class="login-sec">
            <h1>LOGIN</h1>
    
    <form name="login-form" action="backend_login.php" method="post">
    <?php
        if (isset($_GET['msg'])) {
            echo "<div class='msg-log'>$_GET[msg]</div>";
        }
    ?>
    <table>
    
        <tr>
            <td>EMAIL ADDRESS:</td> 
            <td><input type="text" name="email" placeholder="EMAIL ADDRESS"></td>
        </tr>
        
        <tr>
            <td>PASSWORD:</td> 
            <td><input type="password" name="pass" placeholder="PASSWORD"></td>
        </tr>

        <tr>
            <td><i><a href="per_sales_signup.php" title="If you don't have an account with us click here">CREATE ACCOUNT</a></i></td>
        </tr>

    </table>

    

        <div class="btn-div">
            <button class="btn">ENTER</button>
        </div>
    
    </form>

       
    </div>


</body>

</html>