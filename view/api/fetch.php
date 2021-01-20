<?php

session_start();

if(isset($_SESSION['id'])){

    $id = $_SESSION['id'];

}
$mysql = new mysqli('localhost', 'root', '', 'kantor');

$query = "select nama,value, card_number, tanggal from register join rfid on register.id = rfid.register_id join data_rfid on rfid.id = data_rfid.rfid_id WHERE register.id = '$id' ";

$result = $mysql->query($query);
$array = [];

while($row = $result->fetch_array()){
    
    $array[] = $row;

}

echo json_encode(array("result" => $array, "count" => count($array)));
