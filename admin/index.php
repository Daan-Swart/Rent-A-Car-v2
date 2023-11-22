<?php
include('../includes/dbcon.php');
include('../includes/a_header.php');
if (isset($_SESSION['login_error_message'])) {
    unset($_SESSION['login_error_message']);
}
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password_hash = sha1($_POST['password']);
    
    try {
        $sql = 'SELECT * FROM user where email = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        // print_r($user);
        if (!empty($user)) {
            if ($user['password_hash'] === $password_hash) {
                $_SESSION['name'] = $user['name'];
                ob_start();
                header("Location: add_car.php");
                // header("Location: https://daanswart.nl/index.php");
                ob_end_flush();
                exit;
            } else {
                $_SESSION['login_error_message'] = "Gegevens zijn onjuist!";
            }
        } else {
            $_SESSION['login_error_message'] = "Gegevens zijn onjuist!";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>


    <!-- Sign in -->
    <section class="sign-in">
        <div class="popup">
            <form action="index.php" method="post">
                <h2>Inloggen</h2>
                <div class='form-element'>
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email">
                </div>
                <div class='form-element'>
                    <label for="email">Password</label>
                    <input type="password" id="password" name="password">
                </div>
                <p class="error-message">
                    <?php if (isset($_SESSION['login_error_message'])) {
                        echo $_SESSION['login_error_message'];
                    } ?></p>
                <div class='form-element'>
                    <input type="submit" id="submit" name="submit" value="Inloggen" class="btn">
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