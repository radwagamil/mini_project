<?php

function db_connect(){
  $servername = "localhost";
  $username 	= "root";
  $password 	= "machine1";
  $dbname 		= "contacts";
  $conn = mysqli_connect($servername, $username, $password,$dbname);
  return $conn;
}
$errors = array();
$id = '';
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
  case 'POST':

//  $errors = array();

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];

    if(strlen($fname)<3){
      $errors[] = "First Name must be 5 or more charactes";
    }

    if(strlen($lname)<3){
      $errors[] = "Last Name must be 5 or more charactes";
    }

    if(strlen($phone)<11 || !is_numeric($phone)){
      $errors[] = "Phone number is not in the correct format. ex: 905415415412";
    }


    if(count($errors) == 0){
      $conn = db_connect();

      if(!$conn){
        echo "error";}
      else {
        echo "connected";
      }

    $sql = "INSERT INTO contact"." (first_name,last_name)"." VALUES ('".$_POST['fname']."' , '".$_POST['lname']."');";

    $con_results = mysqli_query($conn, $sql);
    if($con_results){
    $contactID = mysqli_insert_id($conn);

    $sql = "INSERT INTO phone_numbers"
    ." (phone_title,phone_number, default_num ,contact_id)"
    ." VALUES ("."'HOME'".",".$_POST['phone'].","."1".",".$contactID.");";

    $con_results = mysqli_query($conn, $sql);

    if(!$con_results){
      die("SQL error - phone " . mysqli_error($conn));
    }
  }else{
    die("SQL error - contact" . mysqli_error($conn));
  }
}else {
  foreach ($errors as $error) {
    echo $error;
  }
}
break;

case 'DELETE':

if(isset($_GET['id'])){
  $id = $_GET['id'];
}

$conn = db_connect();

$sql = "SELECT * FROM contact WHERE id = '{$id}'" ;
$con_results = mysqli_query($conn, $sql);
if (mysqli_num_rows($con_results) > 0){
  $sql = "DELETE FROM contact WHERE id = '{$id}'" ;
  $con_results = mysqli_query($conn, $sql);
  if ($con_results) {
    echo "deleted successfully";
  } else {
    echo "error deleteing";
  }
}else {
  echo"ID doesn't exist";
}

break;

case 'PUT':

$json = json_decode(file_get_contents("php://input"), true);
print_r($json);

if(strlen($json['fname'])<3){
  $errors[] = "First Name must be 5 or more charactes";
}

if(strlen($json['lname'])<3){
  $errors[] = "Last Name must be 5 or more charactes";
}

if(strlen($json['phone'])<11 || !is_numeric($json['phone'])){
  $errors[] = "Phone number is not in the correct format. ex: 905415415412";
}


if(count($errors) == 0){
  $conn = db_connect();

$sql = "UPDATE contact SET first_name='".$json['fname']."', last_name= '".$json['lname']."' WHERE id= '".$json['id']."'";
$con_results = mysqli_query($conn, $sql);

if($con_results){
  $sql = "UPDATE phone_numbers SET phone_number='".$json['phone']."' WHERE contact_id= '".$json['id']."'";
  $con_results = mysqli_query($conn, $sql);
  if(!$con_results){
    die("SQL error - phone " . mysqli_error($conn));
  }

}else{
  die("SQL error - contact" . mysqli_error($conn));
}
}
break;

case 'GET':
$id = $_GET['id'];
$contact = array ();
$phone = array ();

$conn = db_connect();
echo "conect";

$sql = "SELECT * FROM contact WHERE id = {$id}";
$con_results = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($con_results);
$contact [] = $row;
if ($con_results) {
  $sql = "SELECT phone_number FROM phone_numbers WHERE contact_id = {$id}";
  $con_results = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($con_results);
  $phone [] = $row;
}
print_r(json_encode($contact));
echo "</br>";
print_r(json_encode($phone));


}
