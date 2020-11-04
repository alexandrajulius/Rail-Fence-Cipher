<?php

require 'src/RailFenceCipherEncode.php';

if ($argc != 3) {

    echo 'ERROR: Please enter the script-name, the string that should be encoded and the number of rails, each separated by a white space.\n';
} else {

    $encode = new RailFenceCipherEncode();
    $stringToBeEncoded = $argv[1];
    $numberOfRails = $argv[2];
    $encodedString = $encode->encode($stringToBeEncoded, (int)$numberOfRails);
    echo "The encoded string is: " . $encodedString . "\n";
}
