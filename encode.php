<?php

require 'vendor/autoload.php';

$stringToBeEncoded = $argv[1] ?? null;
$numberOfRails = $argv[2] ?? null;

if ($argc != 3) {
    $formatErrorMessage = 'FORMAT ERROR: Please enter <script name> <text> <number of rails>';
    echo addslashes($formatErrorMessage) . "\n";
    return;
}

if ($numberOfRails <= 1) {
    $argumentErrorMessage = 'ARGUMENT ERROR: <number of rails> must be greater than 1';
    echo addslashes($argumentErrorMessage) . "\n";
    return;
}

if ($argc == 3 && $numberOfRails >= 1) {
    $encodedString = (new DIContainer())->getRailFenceCipherEncode()->encode($stringToBeEncoded, (int)$numberOfRails);
    echo "The encoded string is: " . $encodedString . "\n";
}

