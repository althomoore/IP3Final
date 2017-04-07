<?php
/**
 * Created by IntelliJ IDEA.
 * User: altho_000
 * Date: 07/04/2017
 * Time: 13:03
 */

$filename = 'adimo11';
$extension = ".doc";
$count = 1;
$dir = "../file directory/";
$archive = "../Archive/";
$destfile = $filename . $extension;
$newfile = $filename . $extension;


    rename($dir . $destfile, $dir . $newfile);
    copy($dir . $newfile, $archive . $destfile);



