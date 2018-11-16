
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

          <form action="insert.php" method="post" >
            <div class="form-group" >
              <label for="exampleInputfirstname" > <font size ="5">First Name </font></label>
              <input type="text" class="form-control" id="exampleInputfistname" aria-describedby="" name="fname">
            </div>
            <div class="form-group">
              <label for="exampleInputlastname"><font size ="5">Last Name</font></label>
              <input type="text" class="form-control" id="exampleInputPassword1" name="lname">
            </div>
            <div class="form-group">
              <label for="exampleInputlastname"><font size ="5">Phone Number</font></label>
              <input type="text" class="form-control" id="exampleInputPassword1" name="phone">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </br> </br>
          <div class="container" align = "center">
            <a href="searchUI.php">
            <button type="button" class="btn btn-primary">SEARCH</button>
            </a>

            <a href="deleteUI.php">
            <button type="button" class="btn btn-secondary">DELETE</button>
            </a>

            <a href="updateUI1.php">
            <button type="button" class="btn btn-success">UPDATE</button>
            </a>
  </body>
</html>

  </div>
</body>
</html>
