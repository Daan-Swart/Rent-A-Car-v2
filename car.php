<?php
include("includes/header.php");
// include("includes/functions.inc.php");
require_once('includes/dbcon.inc.php');

$car_id = $_GET['id'];

try {
    $sql =   "SELECT * FROM voertuigen WHERE id = '$car_id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $auto = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection:" . $e->getMessage();
}
?>

<section class="car" id="car">
    <div class="container">
        <br>
        <div class="navigation">
            <a href="cars.php">Auto huren</a> -> <a href="car.php?id=<?php echo $auto['id'] ?>"><?php echo $auto['merk'] . " " . $auto['type']  ?></a>
        </div>
        <h4 class="center">
            <span><?php echo $auto['merk'] . " " . $auto['type'] ?></span>
        </h4>
        <div class="row">
            <div class="col m12 l6">
                <img style="border-radius: 10px;" src="img/<?php echo $auto['afbeelding'] ?>" width="100%" alt="car">
            </div>
            <div class="col m12 l6">
                <p id="kenteken"><?php echo $auto['kenteken'] ?></p>
                <!-- <span class="card-title"><?php echo $auto['merk'] . " " . $auto['type'] ?></span> -->
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus nobis fugit explicabo quos, repellat delectus 
                    deserunt nulla sapiente at a.</p>
                <h2><?php echo "€" . $auto['prijsPerDag'] ?><span> / per dag</span></h2>
                <a href="#" class="btn">Reserveer</a>
            </div>
        </div>
    </div>

</section>

<?php
include("includes/footer.php");
?>