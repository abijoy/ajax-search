<?php

require_once('dbConfig.php');
 
if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql = "SELECT * FROM dummy WHERE d_ext LIKE ?";
    
    if($stmt = $conn->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("s", $param_term);
        
        // Set parameters
        $param_term = '%'. $_REQUEST["term"] . '%';
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            $result = $stmt->get_result();
            
            // Check number of rows in the result set
            if($result->num_rows > 0){
                // Fetch result rows as an associative array
                while($row1 = $result->fetch_array(MYSQLI_ASSOC)){
                    echo "<div class=\"row trow\">";
                    echo "<div class=\"col-xs-2 col-sm-3 td\">" . $row1["d_ext"] . "</div>";
                    echo "<div class=\"col-xs-3 col-sm-3 td\">" . "৳". $row1["reg"] . "</div>";
                    echo "<div class=\"col-xs-3 col-sm-3 td\">" . "৳". $row1["reg"] . "</div>";
                    $domLink = "https://ap.limda.net/cart.php?a=add&domain=register&query=". $row1["d_ext"];
                    // echo "<p>". $domLink . "</p>";
                    echo "<div class='search-box col-xs-4 col-sm-3 td'><a href='$domLink'>Order</a></div>";
                    echo "</div>";
                    //echo "<p>" . $row1["d_ext"] ." ".$row1['reg']."</p>";

                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
     
    // Close statement
    $stmt->close();
}
 
// Close connection
$conn->close();
?>

