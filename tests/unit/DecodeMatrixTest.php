<?php

declare(strict_types=1);

namespace Tests\unit;

use DIContainer;
use Generator;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use DecodeMatrix;

final class DecodeMatrixTest extends TestCase
{
    private $container;

    protected function getDecodeMatrix(): DecodeMatrix
    {
        $this->container = new DIContainer();
        return $this->container->getDecodeMatrix();
    }

    public function testCanBeInstantiated(): void
    {
        Assert::assertInstanceOf(DecodeMatrix::class, $this->getDecodeMatrix());
    }

    /**
     * @dataProvider provideDecodeMatrixData
     */
    public function testConvertWordAndRailsToDecodeMatrix(
        array $textArray,
        int $numberOfRails,
        array $expectedMatrix
    ): void
    {
        $actualMatrix = $this->getDecodeMatrix()->create($textArray, $numberOfRails);
        self::assertEquals($expectedMatrix, $actualMatrix);
    }

    public function provideDecodeMatrixData(): Generator
    {
        yield 'no word and 2 rails' => [
            'textArray' => [],
            'numberOfRails' => 2,
            'expectedMatrix' => []
        ];

        yield 'Hello and 2 rails' => [
            'textArray' => [
                0 => 'H',
                1 => 'e',
                2 => 'l',
                3 => 'l',
                4 => 'o'
            ],
            'numberOfRails' => 2,
            'expectedMatrix' => [
                0 => [
                    0 => 'H',
                    1 => '.',
                    2 => 'e',
                    3 => '.',
                    4 => 'l'
                ],
                1 => [
                    0 => '.',
                    1 => 'l',
                    2 => '.',
                    3 => 'o',
                    4 => '.'
                ]
            ]
        ];

        yield 'Hello Again and 3 rails' => [
            'textArray' => [
                0 => 'H',
                1 => 'e',
                2 => 'l',
                3 => 'l',
                4 => 'o',
                5 => 'A',
                6 => 'g',
                7 => 'a',
                8 => 'i',
                9 => 'n'
            ],
            'numberOfRails' => 3,
            'expectedMatrix' => [
                0 => [
                    0 => 'H',
                    1 => '.',
                    2 => '.',
                    3 => '.',
                    4 => 'e',
                    5 => '.',
                    6 => '.',
                    7 => '.',
                    8 => 'l',
                    9 => '.',
                ],
                1 => [
                    0 => '.',
                    1 => 'l',
                    2 => '.',
                    3 => 'o',
                    4 => '.',
                    5 => 'A',
                    6 => '.',
                    7 => 'g',
                    8 => '.',
                    9 => 'a'
                ],
                2 => [
                    0 => '.',
                    1 => '.',
                    2 => 'i',
                    3 => '.',
                    4 => '.',
                    5 => '.',
                    6 => 'n',
                    7 => '.',
                    8 => '.',
                    9 => '.'
                ]
            ]
        ];
    }
}