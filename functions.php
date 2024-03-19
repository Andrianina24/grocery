<?php
require ('./inc/connect.inc.php');

function getProducts($con){
    $sql= "SELECT distinct(item) from Products";
    $result= mysqli_query($con,$sql);
    return $result;
}

function getProductByItem($con,$item){
    $req= "SELECT * from Products where item='%s'";
    $sql=sprintf($req,$item);
    $result= mysqli_query($con,$sql);
    return $result;
}

?>