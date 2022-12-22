<!DOCTYPE html>
<html>
<head>
   <title></title>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   </head>
   <body>
   <form method='POST'>
   <h1>DATABASE CREATION</h1>
  <h2>Enter Database Name:</h2>
 <input type="text" name="db_name">
 <input type="submit" name="create" id='create' value="Create">
<br>
</form>
<form method='POST'>
   <h1>TABLE CREATION</h1>
   <h2>Enter Table Name:</h2>
 <input type="text" name="db_name" placeholder="Enter Database name">
<input type="text" name="table_name" placeholder="Enter Table name">
 <input type="submit" name="tb_create" id='tb_create' value="Create">
</form>
<?php


$servername = "localhost:3306";
$username = "root";
$password = "Sana)(18143#";
$conn = new mysqli($servername, $username, $password);


$db_name = $_POST["db_name"];
//Database Creation
if(isset($_REQUEST['db_name']) && isset($_REQUEST['create'])){
   $sql1 = $conn->query("SHOW DATABASES LIKE '$db_name'");
   if ($sql1->num_rows == 1){
      echo nl2br("Database Already Exists \n");
   }
else{
   $sql = "CREATE DATABASE $db_name";
      if($conn->query($sql) === TRUE) {
         echo nl2br("Database created successfully\n");
         }  
   }
}

//$result = var_dump((bool) mysqli_select_db($conn, $db_name));
$result = $conn->select_db($db_name);
if($result){
  echo nl2br("\nDatabase selected successfully");
}
//Table Creation
$tb_name = $_REQUEST["table_name"];
if(isset($_REQUEST['table_name']) && isset($_REQUEST['tb_create'])){
  // $conn = new mysqli($servername, $username, $password, 'class');
   $sql1 = $conn->query("SHOW TABLES LIKE '$tb_name'");
   if ($sql1->num_rows == 1){
      echo nl2br("\nTable Already Exists \n");
   }
else{
   $sql = "CREATE TABLE $tb_name(
      Roll INT NOT NULL,
      Names VARCHAR(30) NOT NULL,
      PRIMARY KEY(Roll))";
      if($conn->query($sql) === TRUE) {
         echo nl2br("\nTable created successfully");
         }  
   }
}
?>
</body>

</html>