<?php

include('db.php');

//send is the name of the submit button
if (isset($_POST['send'])) {

//this variable now holds the input data from the field with the name 'task'
    $taskdata = $_POST['task'];

//create new data in db 
    $sql = "insert into tasks (name) values ('$taskdata')";

    $val = $con->query($sql);

    if ($val) {
        header('location: index.php');
    }  
}
?>