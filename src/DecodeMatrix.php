<?php

declare(strict_types = 1);

final class DecodeMatrix
{
    /**
     * @var Rail
     */
    private $rail;

    public function __construct(Rail $rail) {
        $this->rail = $rail;
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
    public function create(array $textArray, int $numberOfRails): array
    {
        if ($numberOfRails <= 1) {
            throw new InvalidArgumentException('The number of rails must be greater than one.\n');
        }

        if (empty($textArray)) {
            return [];
        }
        $numberOfLetters = count($textArray);
        $rails = $this->rail->getRails($numberOfLetters, $numberOfRails);

        $decodeMatrix = [];
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

        $decodeMatrixWithLetters = $this->hydrateInput($decodeMatrix, $textArray);

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
    private function hydrateInput(array $decodeMatrix, array $textArray): array
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
