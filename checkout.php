<?php
    session_start();
    $reserve = $_SESSION['reserve'];
    $total = 0;
    foreach($reserve as $r){
        $total += $r['price']*$r['days'];
    }
?>
<html lang="en">
    <style>
        .navbar {
            height: 100px;
            white-space: nowrap;
            background-color: black;
        } 
        #logo {
            padding-top: 5px;
            padding-left: 20px;
            font-style: italic;
            font-weight: bold;
            color: yellow;
            float: left;
        }
        #title {
            position: absolute;
            top: 15px;
            left: 40%;
            color: white;
            float: left;
        }
        .bottom {
            height: 80px;
            background-color: black;
        }
        .form{
            width:100%;
        }
        .left{
            text-align: center;
            background-color: lightgrey;
            width: 30%;
        }
        .right{
            text-align: center;
            width:100%;
        }
        
    </style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

    <script>
    $().ready(function() {
        // validate signup form on keyup and submit
        $("#signupForm").validate({
            rules: {
                firstname: "required",
                lastname: "required",
                address: "required",
                postcode: "required",
                state: "required",
                payment:"required",
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                firstname: "Please enter your firstname",
                lastname: "Please enter your lastname",
                address: "Please enter your address",
                postcode: "Please enter your postcode",
                suburb: "Please enter suburb of your address",
                email: "Please enter a valid email address",
            }
        });
    });
    </script>
</head>
<body>
    <div class="navbar">
            <h1 id="logo">Hertz-UTS</h1>
            <h1 id="title">Car Rental Center</h1>
    </div>
    <div class="form">
        <form class="checkform" id="signupForm" method="GET" action="" novalidate="novalidate"> 
        <table class="form">
        <tr>
                <td class="left">Firstname<span>*</span></td>
                <td class="right"><input type="text" class="right" name="firstname" id="firstname">
        </tr>
        <tr>
                <td class="left">Lastname<span>*</span></td>
                <td class="right"><input type="text" class="right" name="lastname" id="lastname">
        </tr>
        <tr>
                <td class="left">Address<span>*</span></td>
                <td class="right"><input type="text" class="right" name="address" id="address">
        </tr>
        <tr>
                <td class="left">Postcode<span>*</span></td>
                <td class="right"><input type="text" class="right" name="postcode" id="postcode">
        </tr>
        <tr>
                <td class="left">State<span>*</span></td>
                <td class="right"><select class="right" name="state" id="state" >
                    <option value="ACT">ACT</option>
                    <option value="NSW">NSW</option>
                    <option value="NT">NT</option>
                    <option value="QLD">QLD</option>
                    <option value="SA">SA</option>
                    <option value="TAS">TAS</option>
                    <option value="VIC">VIC</option>
                    <option value="WA">WA</option>           
                </select></td>
        </tr>
        <tr>
                <td class="left">Payment Type<span>*</span></td>
                <td class="right"><select class="right" name="payment" id="payment">
                    <option value="VISA">VISA</option>
                    <option value="MASTER">MASTER</option>
                    <option value="BPAY">BPAY</option>
                    <option value="PAYPAL">PAYPAL</option>             
                </select></td>
        </tr>
        <tr>
                <td colspan="2" style="text-align: right;">
                    <input id="button1" type="submit" value="Confirm">
                    <button id="button2" onclick="jump()">HomePage</button>
                </td>
        </tr>
        </table>
        <p>Your total payment would be AU$<?php echo $total;?> </p>
        </form>
    </div>
    <div class="bottom"></div>
    <script type="text/javascript">
        function jump(){
            window.location.href="index.html";
        }
    </script>
</body>
</html>