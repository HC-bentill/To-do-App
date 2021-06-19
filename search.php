<!doctype html>

<?php
include('db.php');

if (isset($_POST['search'])){
    //get text from form field
$name = $_POST['search']; 
//statement to search for similar item in the db
$sql = "select * from tasks where name like '%$name%'";

$rows = $con->query($sql) or die($con->error);

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


    <title>TO-DO List</title>
  </head>


  <body>
   
   <div class="container">
     <div class="row">
       
       <div class="col-md-10 offset-md-1">
       <h1 class="text-center mb-5 mt-5">To do List App</h1>

       <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Add new task</button>
       <button type="button" class="btn btn-info float-right" onclick="print()">Print</button>

       <div class="col-md-12 text-center">
       <p>Search</p>
       <form action="search.php" method="post" class="form-group">
         <input type="text" required placeholder="Search" name="search" class="form-control"/>
               </form>
         
       </div>

       <?php if(mysqli_num_rows($rows) < 1 ):?>
       <h3 class="text-danger text-center">Nothing Found</h3>
       <a href="index.php" class="btn btn-success">Return</a>

       <?php else: ?>
       <!-- table begins here -->
       <table class="table table-hover">
        <br> <br>
  <thead>
    <tr>
      <th scope="col">ID.</th>
      <th scope="col">Task</th>

    </tr>
  </thead>
  <tbody>
  <!-- return associative array , read whatever is in the db and loop all of it -->
  <tr> 
  <?php while($row = $rows->fetch_assoc()): ?>    
      <th scope="row"><?php echo $row['id'] ;?></th>
      <td class="col-md-10"><?php echo $row['name'] ;?></td>
      <td><a href="update.php?id=<?php echo $row['id'] ;?>" class="btn btn-success">Edit</a></td>
      <td><a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>
    </tr>
 <?php endwhile; ?>

  </tbody>
  </table>
<?php endif;?>
       </div>
     </div>
   </div>

 


    
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="bootstrap/js/jquery-slim.min.js"></script>
  <script src="bootstrap/js/popper.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"
      >
      <form method="post" action="add.php">
  <div class="form-group">
   <label>Task Name </label>
    <input type="text" name="task" class="form-control" required>
  </div>
  <input name="send" value="Add Task" type="submit" class="btn btn-success" />
     </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

  </body>

</html>