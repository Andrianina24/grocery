<?php
include ('./inc/connect.inc.php');

function getProducts($con){
    $sql= "SELECT distinct(item) from products";
    $result= mysqli_query($con,$sql);
    return $result;
}

function getProductByItem($con,$item){
    $req= "SELECT * from products where item='%s'";
    $sql=sprintf($req,$item);
    $result= mysqli_query($con,$sql);
    return $result;
}

?>