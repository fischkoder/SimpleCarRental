<?php
session_start();
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
     
        .reservelist {
            background-color: #f1f1f1;
            width: 100%;
        }
        .reservelist th{
            background-color: #FFF43A;
            border-style: none;
            border-spacing:0;
        }
        .reservelist td{
            text-align: center;
        }

    </style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="navbar">
        <h1 id="logo">Hertz-UTS</h1>
        <h1 id="title">Car Rental Center</h1>
</div>
<div class="form">
    <form name="qty" method="POST" action="checkout.php" onsubmit="return isEmpty()">
        <table class="reservelist">
            <th>Picture</th>
            <th>Name</th>
            <th>Price Per Day</th>
            <th>Days</th>
            <th>Delete</th>
            <?php
                
                $reserve = $_SESSION['reserve'];
                $count = count($_SESSION['reserve']);
                if(isset($reserve)){
                    foreach($reserve as $r) {
                        echo "<tr>";
                        echo "<td><img src=\"pics/".$r['image'].".jpg\" height=\"120px\" width=\"160px\"></td>";
                        echo "<td>".$r['name']."</td>";
                        echo "<td>AU$".$r['price']."</td>";
                        echo "<td><input name=\"".$r['image']."\" value=\"".$r['days']."\"type=\"number\" min=\"1\" max=\"99\" onchange=\"changeDays('".$r['image']."',this.form.".$r['image'].".value)\"></td>";
                        echo "<td><a href=\"rm.php?id={$r['image']}\">DELETE</a></td>";
                        echo "</tr>";
                    }
                }
            ?>
            <tr>
                <td colspan="4"></td>
                <td><input type="submit" id="btn" value="CheckOut"></td>
            </tr>
        </table>
    </form>
</div>
<div class="bottom"></div>
</body>
<script type="text/javascript">
    function changeDays(id,number){
        var req = "image="+id+"&days="+number;
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){

            }
        }
        xhr.open("POST","modify.php",true);
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhr.send(req);

    }

    function isEmpty(){
        var rows = <?php echo $count;?>;
        if(rows == 0){
            alert("Sorry, your reservation list is empty, brower will back to main page.");
            window.location.href = "index.html";
            return false;
        }
    }
</script>
</html>