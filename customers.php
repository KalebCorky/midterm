<?php
   $username = 'kalebcorcoran23';
   $password = '';
   //$pdo = new PDO('mysql:host=localhost;dbname=tech_support', $username, $password);
   $con = mysqli_connect('localhost', $username, $password, 'tech_support');
   // $result = $con->
   $stateName = 'CA';
   $version = '2.0';
   $query = "SELECT firstName,lastName,city FROM customers WHERE state = ? ORDER BY lastName";
//    if (!$result) { // add this check.
//     die('Invalid query: ' . mysql_error());
// }

   if ($stmt = $con->prepare($query)) {
       $stmt = $con->prepare($query);
       $stmt->bind_param('s', $stateName);
       $stmt->execute();
       $stmt->bind_result($firstName, $lastName, $city);
       echo("<b>Search results for customers residing in '$stateName':</b><br />");
       while ($stmt->fetch())
           {
              printf($firstName);
              echo(" ");
              printf($lastName);
              echo(" from the fair state of ");
              printf($stateName);
              echo("<br />");
           }
       $stmt->close();
   }
   else {
    printf("Error message: %s\n", $mysqli->error);
}
    
?>