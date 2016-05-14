<?php

require_once 'Image2JPG.class.php';

$src = "in.png";
$dst = "out.jpg";
$res = Image2JPG::convert($src, $dst);
var_dump($res);

