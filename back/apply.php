<?php
    require_once("config.php");

    $id = base64_decode($_REQUEST['token']);
    $want = $_REQUEST['want'];
    $ppay = $_REQUEST['ppay'];
    $selfmpay = $_REQUEST['selfmpay'];
    $pmpay = $_REQUEST['pmpay'];
    $interest = $_REQUEST['interest'];
    $poundage = $_REQUEST['poundage'];
    $stmt = $dbh->prepare("SELECT * FROM usr WHERE id = ?");
    if ($stmt->execute([$id])) {
        if ($row = $stmt->fetch()) {
            if (isset($want) && isset($ppay) && isset($selfmpay) && isset($pmpay)) {
                $stmt = $dbh->prepare("INSERT INTO app (uid, want, ppay, selfmpay, pmpay, interest, poundage, status) VALUES (?, ?, ?, ?, ?, ?, ?, 0)");
                if ($stmt->execute([$id, $want, $ppay, $selfmpay, $pmpay, $interest, $poundage])) {
                    send([ "errno" => 0 ]);
                } else {
                    send([ "errno" => 1 ]);
                }
            } else {
                $stmt = $dbh->prepare("SELECT * FROM app WHERE uid = ?");
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
