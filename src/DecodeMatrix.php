<?php

declare(strict_types = 1);

include_once 'Rail.php';

final class DecodeMatrix
{
    public function __construct() {
        $this->rail = new Rail();
    }

    /**
     * @param array $textArray exploded input string example:
     *   [
     *      0 => 'H',
     *      1 => 'l',
     *      2 => 'o',
     *      3 => 'e',
     *      4 => 'l'
     *  ]
     *
     * @param int $numberOfRails
     *
     * @return array $decodeMatrixWithLetters example:
     *   [
     *      0 => [
     *          0 => 'H',
     *          1 => '.',
     *          2 => 'l',
     *          3 => '.',
     *          4 => 'o'
     *      ]
     *      1 => [
     *          0 => '.',
     *          1 => 'e',
     *          2 => '.',
     *          3 => 'l',
     *          4 => '.'
     *      ]
     *  ]
     */
    public function getDecodeMatrix(array $textArray, int $numberOfRails): array
    {
        $decodeMatrix = [];
        if ($numberOfRails <= 1) {
            throw new InvalidArgumentException('The number of rails must be greater than one.\n');
        }

        $numberOfLetters = count($textArray);
        $rails = $this->rail->getRails($numberOfLetters, $numberOfRails);

        for ($i = 0; $i < $numberOfRails; $i++)
        {
            $rail = [];
            foreach ($rails as $m => $n)
            {
                $rail[$i][] = '.';
                $rail[$n][$m] = '?';
            }
            array_push($decodeMatrix, $rail[$i]);
        }

        $decodeMatrixWithLetters = $this->matchInputWithDecodeMatrix($decodeMatrix, $textArray);

        return $decodeMatrixWithLetters;
    }

    /**
     * @param string[] $decodeMatrix example:
     *   [
     *      0 => '?',
     *      1 => '.',
     *      2 => '?',
     *      3 => '.',
     *      4 => '?'
     *  ]
     *
     * @param string[] $textArray exploded input string example:
     *   [
     *      0 => 'H',
     *      1 => 'l',
     *      2 => 'o',
     *      3 => 'e',
     *      4 => 'l'
     *  ]
     * @return array
     */
    private function matchInputWithDecodeMatrix(array $decodeMatrix, array $textArray): array
    {
        foreach ($decodeMatrix as &$rail) {
            foreach ($rail as $k => &$placeholder) {
                foreach($textArray as $l => $letter) {
                    if ($placeholder == '?') {
                        $placeholder = $textArray[$l];
                        unset($textArray[$l]);
                    }
                }
            }
        }

        return $decodeMatrix;
    }
}
