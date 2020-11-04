<?php

declare(strict_types = 1);

include_once 'DecodeMatrix.php';

final class RailFenceCipherDecode
{
    public function __construct() {
        $this->decodeMatrix = new DecodeMatrix;
    }

    public function decode(string $inputText, int $numberOfRails): string
    {
        if (empty($inputText)) {
            throw new InvalidArgumentException('Empty input.\n');
        }
        if ($numberOfRails <=1) {
            throw new InvalidArgumentException('The number of rails must be greater than one.\n');
        }

        $textArray = str_split($inputText);

        $decodeMatrixWithLetters = $this->decodeMatrix->getDecodeMatrix($textArray, $numberOfRails);
        $outputText = $this->getOutputStringFromMatrix($decodeMatrixWithLetters);

        return $outputText;
    }

    /**
     * @param array $decodeMatrixWithLetters example:
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
     *
     * @return string example: Hello
     */
    private function getOutputStringFromMatrix(array $decodeMatrixWithLetters): string
    {
        $outputArray = [];
        foreach ($decodeMatrixWithLetters as $key => $matrixRail)
        {
            foreach ($matrixRail as $k => $v) {
                if ($v != '.') {
                    $outputArray[$k] = $v;
                }
            }
        }
        ksort($outputArray);
        $outputString = '';
        $outputString .= implode('', $outputArray);

        return $outputString;
    }
}
