<?php
include("includes/header.php");
// include("includes/functions.inc.php");
require_once('includes/dbcon.inc.php');



try {
    $sql =   "SELECT * FROM voertuigen WHERE autoOfbus = 'auto'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $rowCount = $stmt->rowCount();

    if ($rowCount == 0) {
        $notFound = "Geen auto's gevonden";
    } else {
        $autos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    echo "Connection:" . $e->getMessage();
}


?>
<!-- Section: Cars-->
<section class="section section-cars scrollspy">
    <div class="container">
        <h4 class="center">
            <span>Onze</span> Auto's
        </h4>
        <?php if (isset($notFound)) echo "<p class='center'>" . $notFound . "</p>" ?>
        <div class="row">
            <?php if (isset($autos)) {
                foreach ($autos as $auto) {
            ?>
                    <div class="col s12 m4">
                        <div class="card">
                            <div class="card-image">
                                <img src="img/<?php echo $auto['afbeelding'] ?>" alt="">
                            </div>
                            <div class="card-content">
                                <p><?php echo $auto['kenteken'] ?></p>
                                <span class="card-title"><?php echo $auto['merk'] . " "; echo $auto['type']?></span>
                                <h2><?php echo "€" . $auto['prijsPerDag'] ?><span> / per maand</span></h2>
                            </div>
                            <div class="card-action center">
                                <a href="car.php">Bekijk beschikbaarheid</a>
                            </div>
                        </div>
                    </div>

            <?php }
            } ?>

        </div>
    </div>
</section>

<?php

include("includes/footer.php");
?>