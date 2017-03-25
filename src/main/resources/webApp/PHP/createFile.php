<?php



$name = $_GET['filename'];
$extn = $_GET['extension'];
$dire = '../testdirectory/';

$file = fopen($dire . $name . $extn, 'w');

header('location: ../index.php');