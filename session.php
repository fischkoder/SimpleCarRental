<?php
    session_start();
    $reserve = $_SESSION['reserve'];
    $image = $_POST['image'];
    $vehicle = $_POST['car'];
    $price = $_POST['price'];
    $avail = $_POST['availability'];
    $day = 1;

    if(isset($_POST['availability'])){
        if($avail == "False"){
            echo "false";
            exit();
        }else{
            echo "true";
        }
    }

    if(!empty($image)){
        if(empty($reserve)){
            $reserve[$image] = array("image" => $image, "name" => $vehicle, "price" => $price, "days"=>$day);
            $_SESSION['reserve'] = $reserve;
        }elseif(!array_key_exists($image, $reserve)){
            $reserve[$image] = array("image" => $image, "name" => $vehicle, "price" => $price, "days"=>$day);
            $_SESSION['reserve'] = $reserve;
        }else{
            $_SESSION['reserve'] = $reserve;
        }
    }
?>