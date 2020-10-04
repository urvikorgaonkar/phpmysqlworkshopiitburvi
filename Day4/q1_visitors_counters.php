<?php

$file = file_get_contents("count.txt");

$visitors = $file;

$visitorsnew = $visitors + 1;

$filenew = fopen("count.txt","w");
fwrite($filenew , $visitorsnew);

echo "You've had $visitorsnew visitors";


 ?>
