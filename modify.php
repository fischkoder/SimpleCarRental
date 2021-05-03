<?php
session_start();
$reserve = $_SESSION['reserve'];
$image = $_POST['image'];
$days = $_POST['days'];

if($reserve[$image]['image'] = $image){
    $reserve[$image]['days'] = $days;
    $_SESSION['reserve'] = $reserve;
}
?>