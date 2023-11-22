<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'rent-a-car';

// $host = 'daansw-web.db.transip.me';
// $user = 'daansw_Admin';
// $password = 'HAHA123';
// $dbname = 'daansw_web';


try {
    // Set DSN
    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

    // Create PDO instance
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
