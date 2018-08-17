<?php
    require_once("config.php");

    $id = base64_decode($_REQUEST['token']);
    $num = $_REQUEST['num'];
    $mon = $_REQUEST['mon'];
    $stmt = $dbh->prepare("SELECT * FROM usr WHERE id = ?");
    if ($stmt->execute([$id])) {
        if ($row = $stmt->fetch()) {
            if (isset($num) && isset($mon)) {
                $stmt = $dbh->prepare("INSERT INTO fin (uid, num, mon) VALUES (?, ?, ?)");
                if ($stmt->execute([$id, $num, $mon])) {
                    send([ "errno" => 0 ]);
                } else {
                    send([ "errno" => 1 ]);
                }
            } else {
                $stmt = $dbh->prepare("SELECT * FROM fin WHERE uid = ?");
                $stmt->execute([$id]);
                $rows = $stmt->fetchAll(PDO::FETCH_CLASS);
                send([
                    "errno" => 0,
                    "data" => $rows
                ]);
            }
        } else {
            send([ "errno" => 1 ]);
        }
    } else {
        send([ "errno" => 1 ]);
    }
?>
