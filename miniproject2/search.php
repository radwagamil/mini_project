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
      <div class="container">

   <?php
   require_once('buttonsss.php');
   $errors = array();

   if($_SERVER['REQUEST_METHOD']==='GET'){

     $id = $_GET['id'];


     $contact = array ();
     $phone = array ();

     if(!is_numeric($id)){
       $errors[] = "ID must be numeric";
     }

     if(count($errors) == 0){
       $conn = db_connect();

       $sql = "SELECT * FROM contact WHERE id = '{$id}'";
       $con_results = mysqli_query($conn, $sql);
       $row = mysqli_fetch_assoc($con_results);
       $contact = $row;
       if ($con_results) {
         $sql = "SELECT phone_number FROM phone_numbers WHERE contact_id = '{$id}'";
         $con_results = mysqli_query($conn, $sql);
         $row = mysqli_fetch_assoc($con_results);
         $phone = $row;
       }

       ?> <table class="table table-striped table-dark">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last NAme</th>
                  <th scope="col">Phone Number</th>
                </tr>
              </div>
                <?php


                echo "<tbody>";
           echo "<tr>";
           echo "<td>".$contact['id']."</td>";
           echo "<td>".$contact['first_name']."</td>";
           echo "<td>".$contact['last_name']."</td>";
           echo "<td>".$phone['phone_number']."</td>";
           echo "</tr>";
           echo "</tbody>";
           echo "</table>";


}
}


    ?>

 </body>
</html>
