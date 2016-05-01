<?php

use App\Room;

$room = Room::findOrFail($_POST['id']);
$room->canvas = $_POST['json'];
$room->save();

echo "yey";