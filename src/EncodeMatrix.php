<?php

declare(strict_types = 1);

final class EncodeMatrix
{
    /**
     * @var Rail
     */
    private $rail;

    public function __construct(Rail $rail) {
        $this->rail = $rail;
    }

    /**
     * @param string[] $textArray exploded input string example:
     *   [
     *      0 => 'H',
     *      1 => 'e',
     *      2 => 'l',
     *      3 => 'l',
     *      4 => 'o'
     *  ]
     *
     * @param int $numberOfRails
     *
     * @return array $$decodeMatrixWithLetters example:
     *   [
     *      0 => [
     *          0 => 'H',
     *          1 => '.',
     *          2 => 'e',
     *          3 => '.',
     *          4 => 'l'
     *      ]
     *      1 => [
     *          0 => '.',
     *          1 => 'l',
     *          2 => '.',
     *          3 => 'o',
     *          4 => '.'
     *      ]
     *  ]
     */
    public function create(array $textArray, int $numberOfRails): array
    {
        if ($numberOfRails <=1) {
            throw new InvalidArgumentException('The number of rails must be greater than one.\n');
        }

        if (empty($textArray)) {
            return [];
        }
        $numberOfLetters = count($textArray);
        $rails = $this->rail->getRails($numberOfLetters, $numberOfRails);
        $railsToLetters = $this->getRailsToLetters($textArray, $rails);

        $matrix = [];
        for ($i = 0; $i < $numberOfRails; $i++)
        {
            $rail = [];
            foreach ($railsToLetters as $k => $railToLetter)
            {
                if ($i == $railToLetter[0]) {
                    $rail[$i][] = $railToLetter[1];
                } else {
                    $rail[$i][] = '.';
                }
            }
            array_push($matrix, $rail[$i]);
        }

        return $matrix;
    }

    /**
     * @param string[] $textArray exploded input string example:
     *   [
     *      0 => 'H',
     *      1 => 'e',
     *      2 => 'l',
     *      3 => 'l',
     *      4 => 'o'
     *  ]
     *
     *
     * @param int[] $rails example:
     *   [
     *      0 => 0,
     *      1 => 1,
     *      2 => 0,
     *      3 => 1,
     *      4 => 0
     *  ]
     *
     * @return array $railsToLetters example:
     *   [
     *      0 => [
     *          0 => 0,
     *          1 => 'H'
     *      ],
     *      1 => [
     *          0 => 1,
     *          1 => 'e'
     *      ],
     *      2 => [
     *          0 => 0,
     *          1 => 'l'
     *      ],
     *      3 => [
     *          0 => 1,
     *          1 => 'l'
     *      ],
     *      4 => [
     *          0 => 0,
     *          1 => 'o'
     *      ]
     *  ]
     */
    private function getRailsToLetters(array $textArray, array $rails): array
    {
        $railsToLetters = [];
        foreach ($rails as $index => $element) {
            $railsToLetters[$index] = array($element, $textArray[$index]);
        }

        return $railsToLetters;
    }
}
