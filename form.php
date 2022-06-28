<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// the parametres was set randomly, to work properly we must get it from our db
$adress = "localhost";
$name = "root";
$password = "pass";
$db = "mydatabase";
//our input
$query = $_POST["text"];

// Create connection
$conn = new mysqli($adress, $name, $password, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

echo "<h1>Connected successfully</h1>";
// Check that query gives something to write
if(mysqli_query($conn, $query) === false){
    echo "Hey, the query isn't construed properly, I don't know the reason, but check it and try again :)";
}
if (empty($query)){
    echo "Hey, the query should't be empty, go back and fill it";
}
else{
    if ($result = $conn -> query("$query")){
    echo "Returned rows are: " . $result -> num_rows;
  // Free result set
  $result -> free_result();
    }
    
    }
// Close connection
$conn -> close();
?> 
</body>
</html>
