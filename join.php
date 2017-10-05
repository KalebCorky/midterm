<?php
   $username = 'kalebcorcoran23';
   $password = '';
   //$pdo = new PDO('mysql:host=localhost;dbname=tech_support', $username, $password);
   $con = mysqli_connect('localhost', $username, $password, 'tech_support');
   // $result = $con->
   $customerID = '1004';
   $query = "SELECT registrations.productCode, products.name FROM registrations INNER JOIN products ON registrations.productCode=products.productCode WHERE customerID = ?";
//    if (!$result) { // add this check.
//     die('Invalid query: ' . mysql_error());
// }

   if ($stmt = $con->prepare($query)) {
       $stmt->bind_param('s', $customerID);
       $stmt->execute();
       $stmt->bind_result($productCode, $name);
       echo("<b>Search results for products with customerID '$customerID':</b><br />");
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