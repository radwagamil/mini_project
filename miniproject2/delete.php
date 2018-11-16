<?php
function db_connect(){
  $servername = "localhost";
  $username 	= "root";
  $password 	= "machine1";
  $dbname 		= "contacts";
  $conn = mysqli_connect($servername, $username, $password,$dbname);
  return $conn;
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <title></title>
  </head>
  <body>
    <?php
    require_once('buttonsss.php');
    $errors = array();
    if($_SERVER['REQUEST_METHOD']==='POST'){

      $fname = $_POST['fname'];
      $lname = $_POST['lname'];

      if(strlen($fname)<3){
        $errors[] = "First Name must be 5 or more charactes";
      }

      if(strlen($lname)<3){
        $errors[] = "Last Name must be 5 or more charactes";
      }

      if(count($errors) == 0){
        $conn = db_connect();

    $sql = "SELECT * FROM contact WHERE first_name = '{$fname}' AND last_name = '{$lname}'" ;
    $con_results = mysqli_query($conn, $sql);
    if (mysqli_num_rows($con_results) > 0){
      $sql = "DELETE FROM contact WHERE first_name = '{$fname}' AND last_name = '{$lname}'" ;
      $con_results = mysqli_query($conn, $sql);
      if ($con_results) {
        echo "<h3 align = 'center'> </br>deleted successfully</h3>";
      } else {
        echo "<h3 align = 'center'>  </br>Error deleting</h3>";
      }

    }else {
      echo"<h3 align = 'center'>  </br>ID doesn't exist</h3>";
    }
}
}
     ?>
  </body>
</html>
