<?php
include('../includes/dbcon.php');
include('../includes/a_header.php');
try {
    $sql = 'SELECT * FROM voertuigen WHERE `verwijderd` = false AND autoOfBus = "auto"';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() == 0) {
        $notFound = "Geen auto's gevonden";
    }
    $autos = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


?>



<!-- Auto's toevoegen -->
<section class="services" id="rent-a-car">
    <div class="heading">
        <h1 style="font-size: 2.5rem;">Auto's</h1>
        <a href="add_car.php" style="font-weight: bold;">Toevoegen +</a>
    </div>
    <div class="center">
        <?php if (isset($notFound)) {
            echo "<p style='text-align: center:'>" . $notFound . "</p>";
        } ?>
    </div>
    <div class="services-container">
        <?php $i = 0;
        foreach ($autos as $auto) {

        ?>
            <div class="box">
                <div class="box-img">
                    <img src="../img/uploaded/<?php echo $auto['afbeelding'] ?>" alt="">
                </div>
                <p>2017</p>
                <h3><?php echo $auto['merk'] . " " . $auto['type'] ?></h3>
                <h2>€<?php echo $auto['prijsPerDag'] ?><span> / per maand</span></h2>
                <a href="#" class="btn-admin"><i class='bx bxs-pencil'></i></a>

                <!-- COMMAND -->
                <a class="btn-admin" href="delete_cars.php?id=<?php echo $auto['kenteken'] ?>"><i class='bx bxs-trash-alt'></i></a>

            </div>
        <?php } ?>

        <!-- Modal -->
        <div id="modal1" class="modal">
            <div class="modal-content">
                <h4>Waarschuwing</h4>
                <p>Weet u zeker dat u deze auto wilt verwijderen</p>
            </div>
            <div class="modal-footer">
                <a href="delete_cars.php" class="btn green">Ja</a>
                <a href="cars.php" class="btn red">Nee</a>

            </div>
        </div>
</section>


<!-- Footer -->
<section class="copyright" id="copyright">
    <p>&#169; SherryDesign. Alle rechten voorbehouden.</p>
</section>

<!-- Javascript at end of body for optimized loading -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    //Sidenav
    const sideNav = document.querySelectorAll('.sidenav')
    M.Sidenav.init(sideNav, {});

    //modal
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems, {});
    });
</script>
</body>

</html>