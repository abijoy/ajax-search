 <?php  
 require_once('dbConfig.php');
 $record_per_page = 6;  
 $page = '';  
 $output = '';
 $page_query = ''; 
 $temp = '';
 $next = false;
 $prev = false;

 if (isset($_POST["search"]) && !empty($_POST["search"])) {
   $search = $_POST["search"];
   //echo empty($search);
 }

 if(isset($_POST["page"]))  
 {  
      $page = $_POST["page"];
      //echo $page;

 }

 else
 {  
      $page = 1;  
 }


 $start_from = ($page - 1) * $record_per_page;


 if (isset($_POST["term"])){

    $search = $_POST["term"];
    $temp = '%' . $search . '%';
    //echo $temp;
    $sql = "SELECT * FROM dummy WHERE d_ext LIKE '$temp' ";
    $page_query = "SELECT * FROM dummy WHERE d_ext LIKE '$temp'";
 }
 else if (!isset($_POST["term"]) && isset($_POST["search"])) {
   $search = $_POST["search"];
   $temp = '%' . $search . '%';
   //echo $temp;
   $sql = "SELECT * FROM dummy WHERE d_ext LIKE '$temp' ";
   $page_query = "SELECT * FROM dummy WHERE d_ext LIKE '$temp'";
 }
 else {
    $sql = "SELECT * FROM dummy";
    $page_query = "SELECT * FROM dummy";
 }

 if (isset($search)) {
   $page_query = "SELECT * FROM dummy WHERE d_ext LIKE '$temp'";
 }

 $sql .= " LIMIT $start_from, $record_per_page";
 // echo $sql;
 $result = mysqli_query($conn, $sql);  

 while($row2 = mysqli_fetch_array($result))  
 {  

      echo "<div class=\"row trow\">";
      echo "<div class=\"col-xs-2 col-sm-3 td\">" . $row2["d_ext"] . "</div>";
      echo "<div class=\"col-xs-3 col-sm-3 td\">" . "৳". $row2["reg"] . "</div>";
      echo "<div class=\"col-xs-3 col-sm-3 td\">" . "৳". $row2["reg"] . "</div>";
      $domLink = "https://ap.limda.net/cart.php?a=add&domain=register&query=". $row2["d_ext"];
      // echo "<p>". $domLink . "</p>";
      echo "<div class='search-box col-xs-4 col-sm-3 td'><a href='$domLink' class='register-button' target='_blank'>Order</a></div>";
      echo "</div>";
 }  

 $page_result = mysqli_query($conn, $page_query);  
 $total_records = mysqli_num_rows($page_result);  
 $total_pages = ceil($total_records/$record_per_page); 
 // echo "total_pages: " . $total_pages; 

 echo "<div class=domain' style='max-width:400px;margin:0 auto;'>";
 echo "<div class='pagination'>";
 if (!empty($search)) {
  for($i=1; $i<=$total_pages; $i++)  
  {  
       echo "<span class='pagination_link' data-str='$search' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='$i'>$i</span>";
  }  
 }
 else {

  for($i=1; $i<=$total_pages; $i++)  
  {  

       //echo $i;
       echo "<span class='pagination_link' data-str='' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='$i'>$i</span>";
  }  
 }

 echo "<br><br></div>";

 ?>  