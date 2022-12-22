<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>SQL</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<span>Enter any sql command for checking the data selection</span>

<form  method='post'>
<h3>Enter Database Name:</h3>
 <input type="text" name="db_name" size="45">
<!-- <input type="text" class="query" name="sql_query" size="30"> -->
<br>
<h2> Enter your SQL Query</h2>
<textarea name="sql_query" class="query" id="query" rows="4" cols="35" wrap="soft"
        placeholder="Enter the query"> 
</textarea>
<input type="submit" name="check" id="check" value="Submit">
</form>
<style>
    #check{
        width: 100px;
        height: 50px;
        margin-left: 12px ;
    }
</style>
<?php

$servername = "localhost:3306";
$username = "root";
$password = "Sana)(18143#";
$conn = new mysqli($servername, $username, $password);
if($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
$db_name = $_POST["db_name"];
$result1 = $conn->select_db($db_name);
if($result1){
    echo nl2br("\nDatabase selected successfully\n");
    echo nl2br("Selected Database is $db_name");
  }
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_REQUEST['db_name']) && isset($_REQUEST['check'])) {    
    $sql_query = trim($_POST["sql_query"]);
    
    $sql = $sql_query;
    if ($result = $conn->query($sql)){
            echo "<br> Query Successfully executed";
        if (($result->num_rows) >= 0) {
            echo "<br>OUTPUT:<br>";
            while($row = $result->fetch_assoc()) { 
                print_r($row);
                echo "<br>";
            }
        } 
        else {
            echo "0 results";
        }
    }
    else{
        echo "Query not executed";
    }
}
  }
?>
</body>
</html>
