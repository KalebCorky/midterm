<?php
   $username = 'kalebcorcoran23';
   $password = '';
   //$pdo = new PDO('mysql:host=localhost;dbname=tech_support', $username, $password);
   $con = mysqli_connect('localhost', $username, $password, 'tech_support');
   // $result = $con->
   $version = '2.0';
   $query = "SELECT productCode,name FROM `products` WHERE version = ?";
//    if (!$result) { // add this check.
//     die('Invalid query: ' . mysql_error());
// }

   if ($stmt = $con->prepare($query)) {
       $stmt->bind_param('s', $version);
       $stmt->execute();
       $stmt->bind_result($productCode, $name);
       echo("<b>Search results for products with Version number '$version':</b><br />");
       while ($stmt->fetch())
           {
              echo("Prouct Code: ".$productCode."<br />");
              echo("Name: ".$name."<br /><br />");
           }
       $stmt->close();
   }
   else {
    printf("Error message: %s\n", $mysqli->error);
}
    
?>