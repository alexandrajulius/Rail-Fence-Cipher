<?php

class DecodeMatrix
{
    //todo: pack hier auch gleich noch die Buchstaben mit in die Matrix
    public function getDecodeMatrix($rails, $numberOfRails)
    {
        $matrix = array();
        for ($i = 0; $i < $numberOfRails; $i++)
        {
            $rail = array();
            foreach ($rails as $m => $n)
            {
                $rail[$i][] = ".";
                $rail[$n][$m] = "?";
            }
            array_push($matrix, $rail[$i]);
        }
        return $matrix;
    }
}
