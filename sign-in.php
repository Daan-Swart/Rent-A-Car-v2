<?php
include('includes/header.php');
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
                header("Location: index.php");
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
<!-- Home -->
<section class="home blur" id="home">
    <div class="text">
        <h1><span>Op zoek naar<br></span>een auto<br>om te huren</h1>
        <p>Lorem ipsum dolor sit amet consectetur<br>adipisicing elit. Fuga, ut Que</p>
        <div class="form-container">
            <form action="sign-in.php" method="POST">
                <div class="input-box">
                    <span>Zoek een auto</span>
                    <input type="search" name="" id="search" placeholder="Zoek">
                </div>
                <div class="input-box">
                    <span>Begindatum</span>
                    <input type="date" name="" id="Pick-up-date">
                </div>
                <div class="input-box">
                    <span>Einddatum</span>
                    <input type="date" name="" id="End-date">
                </div>
                <div class="input-box">
                    <input type="submit" name="" id="" class="btn">
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Pop Up Sign In -->
<div class="popup">
    <form action="sign-in.php" method="post">
        <h2>Inloggen</h2>
        <div class='form-element'>
            <label for="email">Email</label>
            <input type="text" id="email" name="email">
        </div>
        <div class='form-element'>
            <label for="email">Password</label>
            <input type="password" id="password" name="password">
        </div>
        <p class="error-message"><?php if (isset($_SESSION['login_error_message'])){
            echo $_SESSION['login_error_message']; 
        } ?></p>
        <div class='form-element'>
            <input type="submit" id="submit" name="submit" value="Inloggen" class="btn">
        </div>
    </form>
</div>
<?php

?>