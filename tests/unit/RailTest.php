<?php

declare(strict_types=1);

namespace tests\unit;

use Generator;
use Rail;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

final class RailTest extends TestCase
{
    public function testCanBeInstantiated(): void
    {
        $example = new Rail();
        Assert::assertInstanceOf(Rail::class, $example);
    }

    /**
     * @dataProvider provideRailData
     */
    public function testConvertRailsToMatrixIndices(int $numberOfLetters, int $numberOfRails, array $expectedMatrixIndices): void
    {
        $actualMatrixIndices = (new Rail())->getRails($numberOfLetters, $numberOfRails);

        self::assertEquals($expectedMatrixIndices, $actualMatrixIndices);
    }

    public function provideRailData(): Generator
    {
        yield '0 letters and 0 rails' => [
            'numberOfLetters' => 0,
            'numberOfRails' => 0,
            'expectedMatrixIndices' => []
        ];

        yield '1 letters and 1 rails' => [
            'numberOfLetters' => 1,
            'numberOfRails' => 1,
            'expectedMatrixIndices' => [
                0 => 0
            ]
        ];

        yield '4 letters and 10 rails' => [
            'numberOfLetters' => 4,
            'numberOfRails' => 10,
            'expectedMatrixIndices' => [
                0 => 0,
                1 => 1,
                2 => 2,
                3 => 3
            ]
        ];

        yield '10 letters and 4 rails' => [
            'numberOfLetters' => 10,
            'numberOfRails' => 4,
            'expectedMatrixIndices' => [
                0 => 0,
                1 => 1,
                2 => 2,
                3 => 3,
                4 => 2,
                5 => 1,
                6 => 0,
                7 => 1,
                8 => 2,
                9 => 3
            ]
        ];

        yield '20 letters and 3 rails' => [
            'numberOfLetters' => 20,
            'numberOfRails' => 3,
            'expectedMatrixIndices' => [
                0 => 0,
                1 => 1,
                2 => 2,
                3 => 1,
                4 => 0,
                5 => 1,
                6 => 2,
                7 => 1,
                8 => 0,
                9 => 1,
                10 => 2,
                11 => 1,
                12 => 0,
                13 => 1,
                14 => 2,
                15 => 1,
                16 => 0,
                17 => 1,
                18 => 2,
                19 => 1
            ]
        ];
    }
}