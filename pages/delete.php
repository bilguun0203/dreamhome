<?php

if(isset($_GET['table']) && isset($_GET['col']) && isset($_GET['id'])){
    $table = $_GET['table'];
    $id = $_GET['id'];
    $col = $_GET['col'];

    $db->delete($table,$col . " = '" . $id . "'");
    header("Location: ?page=home&delete=1");

}