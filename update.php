<!doctype html>

<?php
include('db.php');
$id = (int)$_GET['id'];
//select data with its id in the db
$sql = "select * from tasks where id='$id'";
//query the db
$rows = $con->query($sql) or die($con->error);
//fetch data from db with fetch_assoc and put it in row variable
$row = $rows->fetch_assoc();

if(isset($_POST['send'])){
    //data from the form
  $taskdata = htmlspecialchars($_POST['task']);
  $Ssql = "update tasks set name='$taskdata' where id = '$id'";
  $con->query($Ssql);
header('location: index.php');
      


}


?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- font awesome -->
  <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />

  <!-- boostrap -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />

<!-- style css -->
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />

  <!-- site icon -->
  <link href="" rel="shortcut icon" />

  <!-- font type -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Benne&display=swap" rel="stylesheet">


    <title>Update List</title>
  </head>


  <body>
   
   <div class="container">
     <div class="row">
       
       <div class="col-md-10 offset-md-1">
       <h1 class="text-center mb-5 mt-5">To do List App</h1>
       
       <form method="post">
  <div class="form-group">
   <label> Update Task </label>
    <input type="text" value="<?php echo $row['name'] ;?>" name="task" class="form-control" required>
  </div>
  <input name="send" value="Update Task" type="submit" class="btn btn-success" />
  <a href="index.php" class="btn btn-danger ml-2"><i class="fa fa-arrow-left"></i> &nbsp Back</a>
     </form>
       
       </div>
     </div>
   </div>


    
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="bootstrap/js/jquery-slim.min.js"></script>
  <script src="bootstrap/js/popper.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>