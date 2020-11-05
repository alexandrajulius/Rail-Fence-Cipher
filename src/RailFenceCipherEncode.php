<?php

declare(strict_types = 1);

final class RailFenceCipherEncode
{
    /**
     * @var EncodeMatrix
     */
    private $matrix;

    public function __construct(EncodeMatrix $matrix) {
        $this->matrix = $matrix;
    }

    public function encode(string $plainText, int $numberOfRails): string
    {
        if (empty($plainText)) {
            throw new InvalidArgumentException('Empty input.\n');
        }
        if ($numberOfRails <= 1) {
            throw new InvalidArgumentException('The number of rails must be greater than one.\n');
        }

        $textArray = str_split($plainText);
        $matrix = $this->matrix->getEncodeMatrix($textArray, $numberOfRails);
        $outputString = $this->generateOutput($matrix);

        return $outputString;
    }

    /**
     * @param array $matrix example:
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
     * @return string example: Hloel
     */
    private function generateOutput(array $matrix): string
    {
        $outputString = '';
        foreach ($matrix as $k => $rail) {
            $outputString .= implode('', $rail);
        }

        return str_replace('.', '', $outputString);
    }
}
