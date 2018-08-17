<?php
    $db_usr = "root";
    $db_pwd = "csqpw001";
    $dbh = new PDO('mysql:host=localhost;dbname=hqb', $db_usr, $db_pwd);

    function send($res) { echo json_encode($res); }
?>
