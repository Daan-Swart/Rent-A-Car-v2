<?php
include("../includes/a_header.php");
require_once('../includes/dbcon.inc.php');

$car_id = $_GET['id'];
echo $car_id;


// try {
//     $sql =   "UPDATE voertuigen SET verwijderd = true WHERE id = $car_id";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute();
//     header("location: cars.php");
// } catch (PDOException $e) {
//     echo "Connection:" . $e->getMessage();
// }


?>

<?php

include("../includes/footer.php");
?>