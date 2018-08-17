<?php
    require_once("config.php");

    $id = $_REQUEST['id'];
    $pwd = $_REQUEST['pwd'];

    if (is_null($id) || is_null($pwd)) {
        send([ "errno" => 2 ]);
    } else {
        $stmt = $dbh->prepare("SELECT COUNT(*) AS cnt FROM usr WHERE id = ?");
        if ($stmt->execute([$id])) {
            if ($stmt->fetch()['cnt'] > 0) {
                send([ "errno" => 1 ]);
            } else {
                $stmt = $dbh->prepare("INSERT INTO usr (id, pwd) VALUES (?, ?)");
                $stmt->bindParam(1, $id);
                $stmt->bindParam(2, $pwd);
                if ($stmt->execute()) {
                    $stmt = $dbh->prepare("INSERT INTO info (id) VALUES (?)");
                    $stmt->execute([$id]);
                    send([ "errno" => 0 ]);
                } else {
                    send([ "errno" => 2 ]);
                }
            }
        } else {
            send([ "errno" => 2 ]);
        }
    }
?>
