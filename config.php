<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$bdname = 'simplon';
try {
    $conn = new PDO( "mysql:host=$servername;dbname=$bdname;charset=utf8", $username, $password );
    // set the PDO error mode to exception

    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    // echo "<script>alert('Connection reusie à la base')</script>";

} catch( PDOException $e ) {
    echo 'Connection erreur: ' . $e->getMessage();
}

?>