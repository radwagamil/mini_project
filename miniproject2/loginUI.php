<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <meta charset="utf-8">
    <title>LOGIN</title>
  </head>
  <body>
   <div class="container">
   <div class="jumbotron">
     <div class="p-3 mb-2 bg-dark text-white">
     <header>
       <h1>Login here</h1>
     </header>
     <div class="progress">
     <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
     </div>

  <form method = "post" action = "buttons.php" id = "login" >
  <div class="form-group">
    <label for="exampleInputEmail1"><font size ="5">Username</font></label>
    <input type="text" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Username" name="username">

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"><font size ="5">Password</font></label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name = "password">
  </div>
  <button type="submit" class="btn btn-danger" >Submit</button>
</form>
</div>
</div>


 </body>
</html>
