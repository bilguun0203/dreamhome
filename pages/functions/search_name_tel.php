<?php
include_once '../../include/connection.php';
if(isset($_POST['text']) || isset($_GET['text'])) {
    if(isset($_POST['text'])) {
        $text = $_POST['text'];
    }
    else $text = $_GET['text'];
    if($text == ""){
        $result = $res = $db->select("(SELECT fName, lName FROM client UNION SELECT fName, lName FROM staff UNION SELECT fName, lName FROM privateowner) sq", "*", "1", "sq.fName ASC, sq.lName ASC");
    }
    else {
        $result = array();
        $res = $db->select("(SELECT fName, lName FROM client UNION SELECT fName, lName FROM staff UNION SELECT fName, lName FROM privateowner) sq", "*", "fName LIKE '%{$text}%' OR lName LIKE '%{$text}%'", "sq.fName ASC, sq.lName ASC");
        if ($res != 0) {
            if (is_array($res[0]))
                $result = $res;
            else $result[0] = $res;
        } else {
            $result = 0;
        }
    }
    if ($result != 0) {
        foreach ($result as $name) {
            echo "
        <tr>
            <td>{$name['fName']}</td>
            <td>{$name['lName']}</td>
        </tr>";
        }
    } else {
        echo "<tr>Өгөгдөл олдсонгүй</tr>";
    }
}


if(isset($_POST['tel']) || isset($_GET['tel'])) {
    if(isset($_POST['tel'])) {
        $tel = $_POST['tel'];
    }
    else $tel = $_GET['tel'];
    if($tel == ""){
        $result = $res = $db->select("(SELECT telNo FROM client UNION SELECT telNo FROM privateowner) sq", "*", "1", "sq.telNo ASC");
    }
    else {
        $result = array();
        $res = $db->select("(SELECT telNo FROM client UNION SELECT telNo FROM privateowner) sq", "*", "telNo LIKE '%{$tel}%'", "sq.telNo ASC");
        if ($res != 0) {
            if (is_array($res[0]))
                $result = $res;
            else $result[0] = $res;
        } else {
            $result = 0;
        }
    }
    if ($result != 0) {
        foreach ($result as $telNo) {
            echo "
        <tr>
            <td>{$telNo['telNo']}</td>
        </tr>";
        }
    } else {
        echo "<tr>Өгөгдөл олдсонгүй</tr>";
    }
}