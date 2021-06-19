<?php
include('db.php');

$id = (int)$_GET['id'];

$sql = "delete from tasks where id = '$id'";

$val = $con->query($sql);

if($val){
    header('location: index.php')
;}

;?>