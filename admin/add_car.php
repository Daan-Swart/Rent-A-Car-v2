<?php
include('../includes/dbcon.php');
include('../includes/a_header.php');
if (isset($_POST['submit'])) {
    $merk = $_POST['merk'];
    $type = $_POST['type'];
    $kenteken = $_POST['kenteken1'] . "-" . $_POST['kenteken2'] . "-" . $_POST['kenteken3'];
    $prijs = $_POST['prijs'];
    $autoOfBus = $_POST['autoOfBus'];
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 10000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = '../img/uploaded/' . $fileNameNew;
                try {
                    $sql = 'INSERT INTO voertuigen(kenteken, merk, `type`, prijsPerDag, autoOfBus, afbeelding) VALUES(?, ?, ?, ?, ?, ?)';
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$kenteken, $merk, $type, $prijs, $autoOfBus, $fileNameNew]);
                    move_uploaded_file($fileTmpName, $fileDestination);
                    header("Location: cars.php");
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            } else {
                echo "Afbeelding is te groot";
            }
        } else {
            "Oeps ,er ging iets mis";
        }
    } else {
        echo "Je kan geen bestand uploaden van dit type";
    }
}

?>


<!-- Add Car -->
<section class="sign-in">
    <div class="popup add-car-popup">
        <form action="add_car.php" method="post" enctype="multipart/form-data">
            <h3 style="text-align: center; font-size: 1.5rem">Auto</h3>
            <h2 style="font-size: 2rem">Toevoegen</h2>
            <div class='form-element'>
                <label for="merk">Merk</label>
                <input type="text" id="merk" name="merk" value="" required>
            </div>
            <div class='form-element'>
                <label for="type">Type</label>
                <input type="text" id="type" name="type" value="" required>
            </div>
            <div class='form-element'>
                <label for="type" style="display: block;">Kenteken</label>
                <input type="text" id="type" name="kenteken1" value="" class="kenteken" required>-
                <input type="text" id="type" name="kenteken2" value="" class="kenteken" required>-
                <input type="text" id="type" name="kenteken3" value="" class="kenteken" required>
            </div>
            <div class='form-element'>
                <label for="type">Prijs</label>
                <input type="number" name="prijs" min="0.00" step="0.01" max="1000" value="" required />
            </div>

            <input type="hidden" id="autoOfBus" name="autoOfBus" value="auto">

            <div class='form-element'>
                <input type="file" name='file'><br><br>
            </div>
            <p class="error-message">
                <?php if (isset($_SESSION['login_error_message'])) {
                    echo $_SESSION['login_error_message'];
                } ?></p>
            <div class='form-element'>
                <input type="submit" id="submit" name="submit" value="toevoegen" class="btn">
            </div>
        </form>
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
<?php print_r($_POST); ?>