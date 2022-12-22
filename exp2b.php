<!DOCTYPE html>
<html>
<head>
   <title></title>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   </head>
   <body>
   <form method='POST'>
   <h1>DATABASE DELETION</h1>
  <h2>Enter Database Name:</h2>
 <input type="text" name="db_name">
 <input type="submit" name="delete" id='delete' value="Delete">
<br>
</form>
<form method='POST'>
   <h1>TABLE DELETION</h1>
   <h2>Enter Table Name:</h2>
 <input type="text" name="db_name" placeholder="Enter Database name">
<input type="text" name="table_name" placeholder="Enter Table name">
 <input type="submit" name="tb_delete" id='tb_delete' value="Delete1">
</form>
<?php


$servername = "localhost:3306";
$username = "root";
$password = "Sana)(18143#";
$conn = new mysqli($servername, $username, $password);


$db_name = $_POST["db_name"];
//Database DELETION
if(isset($_REQUEST['db_name']) && isset($_REQUEST['delete'])){
   $sql1 = $conn->query("SHOW DATABASES LIKE '$db_name'");
   if ($sql1->num_rows == 0){
      echo nl2br("Database Not Exists \n");
   }
else{
   $sql = "DROP DATABASE $db_name";
      if($conn->query($sql) === TRUE) {
         echo nl2br("Database deleted successfully\n");
         }  
   }
}

//$result = var_dump((bool) mysqli_select_db($conn, $db_name));
$result = $conn->select_db($db_name);
if($result){
  echo nl2br("\nDatabase selected successfully");
}
//Table Deletion
$tb_name = $_REQUEST["table_name"];
if(isset($_REQUEST['table_name']) && isset($_REQUEST['tb_delete'])){
  // $conn = new mysqli($servername, $username, $password, 'class');
   $sql1 = $conn->query("SHOW TABLES LIKE '$tb_name'");
   if ($sql1->num_rows == 0){
      echo nl2br("\nTable Not Exists \n");
   }
else{
   $sql = "DROP TABLE IF EXISTS $tb_name";
      if($conn->query($sql) === TRUE) {
         echo nl2br("\nTable deleted successfully");
         }  
   }
}
?>
</body>

</html>