<?php

define('database_server', 'localhost');
define('database_uname', 'jgeorge15');
define('database_pass', 'jgeorge15');
define('database', 'jgeorge15');
$db = mysqli_connect(database_server,database_uname,database_pass,database);

$query = "DROP TABLE parkingSpots";
mysqli_query($db, $query);
$query = "CREATE TABLE parkingSpots(id INT PRIMARY KEY AUTO_INCREMENT, spot INT)";
mysqli_query($db, $query);

for ($x=1;$x<61;$x++){
$query = "INSERT INTO parkingSpots(id,spot) VALUES({$x},1)";
mysqli_query($db, $query);
}


?>