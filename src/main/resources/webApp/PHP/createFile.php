<?php



$name = $_GET['filename'];
$extn = $_GET['extension'];

$file = fopen('../testdirectory/' . $name . $extn, 'w');
