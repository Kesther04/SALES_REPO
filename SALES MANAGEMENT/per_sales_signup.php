<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sales_login.css" media="all">
    <title>SIGN UP</title>
</head>

<body>
    <div class="form-sec">
            
        <h1>REGISTRATION FORM</h1>
        
        <form name="reg-form" action="backend_reg.php" method="post">
        
        <table>
        
            <tr>
                <td>FULLNAME:</td>  <td><input type="text"  name="full"></td>
            </tr>

            <tr>
                <td>GENDER:</td> 
                
                <td>
                    <select name="gender">
                        <option></option>
                        <option>MALE</option>
                        <option>FEMALE</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>EMAIL ADDRESS:</td>   <td><input type="text"  name="email"></td>
            </tr>

            <tr>
                <td>PASSWORD:</td>  <td><input type="password"  name="pass"></td>
            </tr>

            <tr>
                <td>PHONE NUMBER:</td>     <td><input type="text"  name="pno"></td>
            </tr>

        </table>

        <div class="btn-div">
            <button class="btn">REGISTER</button>
        </div>
        
        </form>
    
    </div>

</body>

</html>