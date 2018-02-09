<?php

include_once 'Rail.php';
include_once 'DecodeMatrix.php';

class RailFenceCipherDecode
{
    public function __construct() {
        $this->rail = new Rail;
        $this->decodeMatrix = new DecodeMatrix;
    }

    public function decode($string, $numberOfRails)
    {
        if (empty($string)) {
            throw new InvalidArgumentException('Empty input.\n');
        }
        if ($numberOfRails <=1) {
            throw new InvalidArgumentException('The number of rails must be greater than one.\n');
        }

        $textArray = str_split($string);
        $numberOfLetters = count($textArray);

        //todo: call the rails inside the matrix class, so matrix can be used without calling rails before
        $rails = $this->rail->getRails($numberOfLetters, $numberOfRails);
        $decodeMatrix = $this->decodeMatrix->getDecodeMatrix($rails, $numberOfRails);
        $decodeMatrixWithLetters = $this->matchInputWithDecodeMatrix($decodeMatrix, $textArray);
        $outputString = $this->getOutputStringFromMatrix($decodeMatrixWithLetters);
        return $outputString;
    }

    private function matchInputWithDecodeMatrix($decodeMatrix, $textArray)
    {
        foreach ($decodeMatrix as &$rail) {
            foreach ($rail as $k => &$placeholder) {
                foreach($textArray as $l => $letter) {
                    if ($placeholder == "?") {
                        $placeholder = $textArray[$l];
                        unset($textArray[$l]);
                    }
                }
            }
        }
        return $decodeMatrix;
    }

    private function getOutputStringFromMatrix($decodeMatrixWithLetters)
    {
        $outputArray = array();
        foreach ($decodeMatrixWithLetters as $key => $matrixRail)
        {
            foreach ($matrixRail as $k => $v) {
                if ($v != "."){
                    $outputArray[$k] = $v;
                }
            }
        }
        ksort($outputArray);
        $outputString = "";
        $outputString .= implode("", $outputArray);
        return $outputString;
    }
}
