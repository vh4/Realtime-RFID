<?php

require_once __DIR__ . '/Config/autoload.php';

$Login = new Login;
echo $Login->register();
echo $Login->Masuk();

$Admin = new Admin;
$data = $Admin->index();
$jumlahdata = $Admin->pagination();
$Admin->update();