<?php
$file = $_GET['file'];

$homepage = file_get_contents($file);

echo $homepage;
?>
