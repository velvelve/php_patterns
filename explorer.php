<?php

$path = "/path/to/directory";
$dir = new RecursiveDirectoryIterator($path);
$iterator = new RecursiveIteratorIterator($dir);

foreach ($iterator as $fileinfo) {
    // Check if the current file is a directory
    if ($fileinfo->isDir()) {
        echo "Directory: " . $fileinfo->getPathname() . PHP_EOL;
    } else {
        echo "File: " . $fileinfo->getPathname() . PHP_EOL;
    }
}
