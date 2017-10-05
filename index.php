<?php
   $username = 'kalebcorcoran23';
   $password = '';
   //$pdo = new PDO('mysql:host=localhost;dbname=tech_support', $username, $password);
   $con = mysqli_connect('localhost', $username, $password, 'tech_support');
   // $result = $con->
   $stateName = 'CA';
   $query = "SELECT firstName,lastName FROM customers WHERE state = ?";
//    if (!$result) { // add this check.
//     die('Invalid query: ' . mysql_error());
// }

   if ($stmt = $con->prepare($query)) {
       $stmt = $con->prepare($query);
       $stmt->bind_param('s', $firstName);
       $stmt->execute();
       $stmt->bind_result($firstName);
       echo("<b>Search results for customers residing in '$stateName':</b><br />");
       while ($stmt->fetch())
           {
              printf($firstName);
              echo("<br />");
           }
       $stmt->close();
   }
   else {
    printf("Error message: %s\n", $mysqli->error);
}
    
?>