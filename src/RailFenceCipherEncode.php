<?php

include_once 'Rail.php';
include_once 'Matrix.php';

class RailFenceCipherEncode
{
    public function __construct() {
        $this->rail = new Rail;
        $this->matrix = new Matrix;
    }

    public function encode($plainText, $numberOfRails)
    {
        if (empty($plainText)) {
            throw new InvalidArgumentException('Empty input.\n');
        }
        if ($numberOfRails <=1) {
            throw new InvalidArgumentException('The number of rails must be greater than one.\n');
        }
        //remove white spaces
        //todo: do not delete white spaces but take a valid string as input
        $cleanedString = preg_replace('/\s/', '', $plainText);
        $textArray = str_split($cleanedString);

        //todo: call the rails inside the matrix class, so matrix can be used without calling rails before
        $numberOfLetters = count($textArray);
        $rails = $this->rail->getRails($numberOfLetters, $numberOfRails);

        $matrix = $this->matrix->getMatrix($textArray, $rails, $numberOfRails);

        $outputString = $this->generateOutput($matrix);
        return $outputString;
    }

    private function generateOutput($matrix)
    {
        $outputString = "";
        foreach ($matrix as $k => $rail) {
            $outputString .= implode("", $rail);
        }
        return str_replace(".", "", $outputString);
    }
}
