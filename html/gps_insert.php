<?php
require_once './DbManager.php';

$db = getDb();

$date = new DateTime(); 
$date = $date->format('Y-m-d H:i:s'); 

$stt = $db->prepare('INSERT INTO gps(id,time,latitude,longitude) VALUES(:id,:time,:latitude,:longitude)');
$stt->bindValue(':id', 1);
$stt->bindValue(':time', $date);
$stt->bindValue(':latitude', $_POST['latitude']);
$stt->bindValue(':longitude', $_POST['longitude']);
$stt->execute();