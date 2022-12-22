<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css_sales/sales_management.css" media="all">
    <link rel="stylesheet" href="../../css_sales/phone_sales_management.css" media="all">
    <title>document</title>
</head>
<body>

<div class="e-dash">
<button id="b-dash-div" onclick="bolt()">DASHBOARD</button>
<button id="c-dash-div" onclick="bort()">DASHBOARD</button>
</div>


<div id="dash-div">
<div class="dash-div">
       <h2>DASHBOARD</h2>

       <button class="but"><a href="../product_credentials/add_product">PRODUCT MAN</a></button>
       <button class="but"><a href="../product_tbl/product_table" > PRODUCTS</a></button>
       <button class="but"><a href="../add_sales/add_sales_admin">ADD SALES</a></button>
       <button class="but"><a href="../view_products_sold/view_sold_product_admin">VIEW SOLD PRODUCT</a></button>
       <button class="but"><a href="../trs/transaction">TRANSACTION HISTORY</a></button>
       <button class="but"><a href="../daily_sales/daily_sales" >VIEW DAILY SALES</a></button>
       <button class="but"><a href="../update_sales/sales_update">UPDATE SALES</a></button>
       <button class="but" onclick="if(window.confirm('ARE YOU SURE YOU WANT TO LOG OUT')){window.location='../../admin_access_system/per_sales_login_admin.php';}">LOG OUT</button>
</div>
</div>


<script src="../../js_sales/dash.js"></script>

</body>
</html>