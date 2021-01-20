<?php

$file = $_COOKIE['file'];

$homepage = file_get_contents($file);

echo $homepage;
?>