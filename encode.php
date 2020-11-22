<?php

require 'src/RailFenceCipherEncode.php';
require 'src/EncodeMatrix.php';
require 'src/Rail.php';

$stringToBeEncoded = $argv[1] ?? null;
$numberOfRails = $argv[2] ?? null;

if ($argc != 3) {
    $formatErrorMessage = 'FORMAT ERROR: Please enter <script name> <text> <number of rails>';
    eval("echo '" . addslashes($formatErrorMessage) . "\n';");
    return;
}

if ($numberOfRails <= 1) {
    $argumentErrorMessage = 'ARGUMENT ERROR: <number of rails> must be greater than 1';
    eval("echo '" . addslashes($argumentErrorMessage) . "\n';");
    return;
}

if ($argc == 3 && $numberOfRails >= 1) {
    $encodedString = (new RailFenceCipherEncode(new EncodeMatrix(new Rail())))->encode($stringToBeEncoded, (int)$numberOfRails);
    echo "The encoded string is: " . $encodedString . "\n";
}

