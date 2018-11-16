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
    <link rel="stylesheet" href="butt.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <title></title>
  </head>
  <body>
    <?php
    $errors = array();

      $username = '';
      $password = '';

      if (isset($_POST['username'])) {
        $username = $_POST['username'];
      }
      if (isset($_POST['password'])) {
        $password = $_POST['password'];
      }
      if (!isset($password)){
        $errors[] = "set the password";
      }
      if(strlen($username)<4){
        $errors[] = "username must be more than 5 characters";
      }

      if(count($errors) == 0){
      $conn = db_connect();

        $array_result = array();

        $sql = "SELECT * FROM admin where user_name ='".$username."' " ;
        $con_results = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($con_results);
        $array_result = $row;

        if (mysqli_num_rows($con_results) > 0){
          if ($row['password'] === $password){
    ?>
    <div class="jumbotron">
        <h1>NAVIGATION</h1>
      </div>

      <div class="container">

          <form>
            <a href="insertUI.php">
            <button type="button" class=" btn-primary btn-lg btn-block">INSERT</button>
          </a>

            <a href="searchUI.php">
            <button type="button" class=" btn-secondary btn-lg btn-block">SEARCH</button>
          </a>
            <a href="updateUI1.php">
            <button type="button" class=" btn-primary btn-lg btn-block">UPDATE</button>
          </a>
            <a href="deleteUI.php">
            <button type="button" class=" btn-secondary btn-lg btn-block">DELETE</button>
          </a>

          </form>
          <?php
        } else {
          echo "wrong password ";
        }
      }else {
        echo "wrong username";
      }
    }else {
      echo "error inputs";
    }
          ?>
  </body>
</html>

  </div>
</body>
</html>
