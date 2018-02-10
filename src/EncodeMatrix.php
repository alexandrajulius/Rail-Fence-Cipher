<?php

include_once 'Rail.php';

class EncodeMatrix
{
    public function __construct() {
        $this->rail = new Rail;
    }

    public function getEncodeMatrix($textArray, $numberOfRails)
    {
        #todo: error-handling check if empty and then return empty string
        #todo: where does the empty space from the input disapear? find out in tests
        $matrix = array();

        $numberOfLetters = count($textArray);
        $rails = $this->rail->getRails($numberOfLetters, $numberOfRails);
        $railsToLetters = $this->getRailsToLetters($textArray, $rails);
        for ($i = 0; $i < $numberOfRails; $i++)
        {
            $rail = array();
            foreach ($railsToLetters as $k => $railToLetter)
            {
                if ($i == $railToLetter[0]) {
                    $rail[$i][] = $railToLetter[1];
                } else {
                    $rail[$i][] = ".";
                }
                //todo: it works also without the "." but the tests must be adjusted
            }
            array_push($matrix, $rail[$i]);
        }
        return $matrix;
    }

    private function getRailsToLetters($textArray, $rails)
    {
        $railsToLetters = array();
        foreach ($rails as $index => $element) {
            $railsToLetters[$index] = array($element, $textArray[$index]);
        }
        return $railsToLetters;
    }
}
