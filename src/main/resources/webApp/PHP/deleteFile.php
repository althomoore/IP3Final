<?php
$file = $_GET['delete'];
if (!unlink($file)) {
    echo("Error deleting $file");
} else {
    echo("Deleted $file");
}