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
  <body style="background-color:lightsteelblue;">
    <div class="jumbotron">
        <h1>Add Contact</h1>
      </div>

      <div class="container">
        <?php

        if(isset($con_results)&&$con_results){
          echo '<div class="alert alert-success alert-dismissible">'
          .'Contact Inserted successfully'
          .'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'
          ."</div>";
        } ?>
        <?php

        $errors = array();
        if(count($errors) !== 0)
        {
          echo '<div class="alert alert-danger">';
          foreach ($errors as $value) {
            echo $value. "</br>";
          }
          echo '</div>';
        }
          ?>
          <?php
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
            }
          }
           ?>

          <form action="update.php" method="post">
            <div class="form-group">
              <label for="exampleInputfirstname"><font size ="5">ID </font></label>
              <input type="text" class="form-control" id="exampleInputfistname" aria-describedby="" name="id" value = "<?php echo $contact['id']; ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputfirstname"><font size ="5">First Name </font></label>
              <input type="text" class="form-control" id="exampleInputfistname" aria-describedby="" name="fname" value = "<?php echo $contact['first_name']; ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputlastname"><font size ="5">Last Name </font></label>
              <input type="text" class="form-control" id="exampleInputPassword1" name="lname" value = "<?php echo $contact['last_name']; ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputlastname"><font size ="5">Phone Number </font></label>
              <input type="text" class="form-control" id="exampleInputPassword1" name="phone" value = "<?php echo $phone['phone_number']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">UPDATE</button>
          </form>

        </br> </br>
          <div class="container" align = "center">
            <a href="insertUI.php">
            <button type="button" class="btn btn-primary">INSERT</button>
            </a>

            <a href="searchUI.php">
            <button type="button" class="btn btn-secondary">SEARCH</button>
            </a>

            <a href="deleteUI.php">
            <button type="button" class="btn btn-success">DELETE</button>
            </a>



  </body>
</html>

  </div>
</body>
</html>
