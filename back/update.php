<?php
    require_once("config.php");

    $info_arr = [
        'name', 'school', 'stuid', 'sex', 'major', 'grade',
        'gpa', 'reason', 'english', 'worktime', 'experiment',
        'addr', 'phone', 'mail', 'rank', 'income', 'pledge',
        'bank', 'saving', 'bankno', 'idno', 'pname',
        'fidno', 'midno', 'photo', 'pre'
    ];

    function upd($id, $k, $v) {
        global $dbh;
        $stmt = $dbh->prepare("UPDATE info SET $k = ? WHERE id = ?");
        return $stmt->execute([$v, $id]);
    }

    $id = base64_decode($_REQUEST['token']);
    $stmt = $dbh->prepare("SELECT * FROM usr WHERE id = ?");
    if ($stmt->execute([$id])) {
        if ($row = $stmt->fetch()) {
            foreach ($info_arr as $i) {
                $res = true;
                if (isset($_REQUEST[$i])) {
                    if (!upd($id, $i, $_REQUEST[$i])) {
                        $res = false;
                    }
                }
            }
            if ($res) {
                send([ "errno" => 0 ]);
            } else {
                send([ "errno" => 1 ]);
            }
        } else {
            send([ "errno" => 1 ]);
        }
    } else {
        send([ "errno" => 1 ]);
    }
?>