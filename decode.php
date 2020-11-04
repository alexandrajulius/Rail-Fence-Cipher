<?php

require 'src/RailFenceCipherDecode.php';

if ($argc != 3) {

    echo 'ERROR: Please enter the script-name, the string that should be decoded and the number of rails, each separated by a white space.\n';
} else {

    $decode = new RailFenceCipherDecode();
    $stringToBeDecoded = $argv[1];
    $numberOfRails = $argv[2];
    $decodedString = $decode->decode($stringToBeDecoded, (int)$numberOfRails);
    echo "The decoded string is: " . $decodedString . "\n";
}