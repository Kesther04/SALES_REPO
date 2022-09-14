<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sales_management.css" media="all">
    <title>document</title>
</head>
<body>

<div class="dash-div">
       <h2>DASHBOARD</h2>

       <button class="but"><a href="add_product">PRODUCT MAN</a></button>
       <button class="but"><a href="product_table" > PRODUCTS</a></button>
       <button class="but"><a href="add_sales_admin">ADD SALES</a></button>
       <button class="but"><a href="view_sold_product_admin">VIEW SOLD PRODUCT</a></button>
       <button class="but"><a href="transaction" >TRANSACTION HISTORY</a></button>
       <button class="but"><a href="daily_sales" >VIEW DAILY SALES</a></button>
       <button class="but"><a href="sales_update">UPDATE SALES</a></button>
       <button class="but" onclick="if(window.confirm('ARE YOU SURE YOU WANT TO LOG OUT')){window.location='per_sales_login_admin.php';}">LOG OUT</button>
</div>

</body>
</html>