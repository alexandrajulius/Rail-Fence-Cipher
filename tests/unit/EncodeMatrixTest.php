<?php

declare(strict_types=1);

namespace Tests\unit;

use DIContainer;
use Generator;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use EncodeMatrix;

final class EncodeMatrixTest extends TestCase
{
    private $container;

    protected function getEncodeMatrix(): EncodeMatrix
    {
        $this->container = new DIContainer();
        return $this->container->getEncodeMatrix();
    }

    public function testCanBeInstantiated(): void
    {
        Assert::assertInstanceOf(EncodeMatrix::class, $this->getEncodeMatrix());
    }

    /**
     * @dataProvider provideEncodeMatrixData
     */
    public function testConvertWordAndRailsToEncodeMatrix(array $textArray, int $numberOfRails, array $expectedMatrix): void
    {
        $actualMatrix = $this->getEncodeMatrix()->create($textArray, $numberOfRails);
        self::assertEquals($expectedMatrix, $actualMatrix);
    }

    public function provideEncodeMatrixData(): Generator
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
                    2 => 'l',
                    3 => '.',
                    4 => 'o'
                ],
                1 => [
                    0 => '.',
                    1 => 'e',
                    2 => '.',
                    3 => 'l',
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
                    4 => 'o',
                    5 => '.',
                    6 => '.',
                    7 => '.',
                    8 => 'i',
                    9 => '.',
                ],
                1 => [
                    0 => '.',
                    1 => 'e',
                    2 => '.',
                    3 => 'l',
                    4 => '.',
                    5 => 'A',
                    6 => '.',
                    7 => 'a',
                    8 => '.',
                    9 => 'n'
                ],
                2 => [
                    0 => '.',
                    1 => '.',
                    2 => 'l',
                    3 => '.',
                    4 => '.',
                    5 => '.',
                    6 => 'g',
                    7 => '.',
                    8 => '.',
                    9 => '.'
                ]
            ]
        ];
    }
}