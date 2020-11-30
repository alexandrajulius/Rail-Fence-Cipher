<?php

require 'vendor/autoload.php';

$stringToBeDecoded = $argv[1] ?? null;
$numberOfRails = $argv[2] ?? null;

if ($argc != 3) {
    $formatErrorMessage = 'FORMAT ERROR: Please enter <script name> <text> <number of rails>';
    echo $formatErrorMessage . "\n";

    return;
}

if ($numberOfRails <= 1) {
    $argumentErrorMessage = 'ARGUMENT ERROR: <number of rails> must be greater than 1';
    echo addslashes($argumentErrorMessage) . "\n";

    return;
}

if ($argc == 3 && $numberOfRails >= 1) {
    $decodedString = (new DIContainer)->getRailFenceCipherDecode()->decode($stringToBeDecoded, (int)$numberOfRails);
    echo "The decoded string is: " . $decodedString . "\n";
}