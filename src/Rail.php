<?php

declare(strict_types = 1);

final class Rail
{
    /**
     * @param int $numberOfLetters example: 5
     * @param int $numberOfRails example: 2
     *
     * @return int[] $matrixIndices example:
     *   [
     *      0 => 0,
     *      1 => 1,
     *      2 => 0,
     *      3 => 1,
     *      4 => 0
     *  ]
     */
    public function getRails(int $numberOfLetters, int $numberOfRails): array
    {

        if ($numberOfRails <= 1) {
            throw new InvalidArgumentException('The number of rails must be greater than one.\n');
        }

        $n = $numberOfRails - 1;
        $matrixIndices = [];
        for ($i = 0; $i < $numberOfLetters; $i++)
        {
            $descent = $this->isDescending($numberOfRails, $i);
            if ($descent) {
                $matrixIndices[$i] = $i % $n;
            } else {
                $matrixIndices[$i] = $n - ($i % $n);
            }
        }

        return $matrixIndices;
    }

    private function isDescending(int $numberOfRails, int $letterIndex): bool
    {
        $quotient = $letterIndex / ($numberOfRails - 1);
        if (floor($quotient) & 1) {
            //odd
            return false;
        }

        //even
        return true;
    }
}
