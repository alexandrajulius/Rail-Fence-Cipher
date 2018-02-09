<?php

class Matrix
{
    public function getMatrix($textArray, $rails, $numberOfRails)
    {
        #todo: error-handling check if empty and then return empty string
        #todo: don't use rails as a parameter but call it here so the class can later be used without calling rails first
        $matrix = array();
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
