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
        <h1>UPDATE RECORD</h1>
      </div>

      <div class="container">

          <form action="updateUI2.php" method="get">
            <div class="form-group">
              <label for="exampleInputfirstname"><font size ="5">ID</font></label>
              <input type="number" class="form-control" id="exampleInputfistname" aria-describedby="" name="id">
            </div>


            <button type="submit" class="btn btn-primary">SEARCH</button>
          </form>
          
        </br> </br>
          <div class="container" align = "center">
            <a href="insertUI.php">
            <button type="button" class="btn btn-primary">INSERT</button>
            </a>

            <a href="searchUI.php">
            <button type="button" class="btn btn-secondary">SEARCH</button>
            </a>

            <a href="updateUI1.php">
            <button type="button" class="btn btn-success">UPDATE</button>
            </a>
  </body>
</html>

  </div>
</body>
</html>
