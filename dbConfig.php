<?php

$conn = new mysqli("localhost", "root", "1234", "domain");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}

?>