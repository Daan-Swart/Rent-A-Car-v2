<?php
include('../includes/dbcon.php');
include('../includes/a_header.php');
try {
    $sql = 'SELECT * FROM voertuigen WHERE `verwijderd` = true AND autoOfBus = "auto"';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $autos = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


?>


    <!-- Auto's toevoegen -->
    <section class="services" id="rent-a-car">
        <div class="heading">
            <h1 style="font-size: 2.5rem;">Verwijderde auto's</h1>
        </div>
        <div class="services-container">
            <?php foreach ($autos as $auto) {
            ?>
                <div class="box">
                    <div class="box-img">
                        <img src="../img/uploaded/<?php echo $auto['afbeelding'] ?>" alt="">
                    </div>
                    <p>2017</p>
                    <h3><?php echo $auto['merk'] . " " . $auto['type'] ?></h3>
                    <h2>€<?php echo $auto['prijsPerDag'] ?><span> / per maand</span></h2>
                    <a href="#" class="btn-admin"><i class='bx bxs-pencil'></i></a><a href="#" class="btn-admin"><i class='bx bxs-trash-alt'></i></a>
                </div>
            <?php } ?>
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
    </script>
</body>

</html>