<?php

declare(strict_types=1);

namespace Tests\unit;

use DIContainer;
use Generator;
use InvalidArgumentException;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use RailFenceCipherDecode;

final class RailFenceCipherDecodeTest extends TestCase
{
    private $container;

    protected function getRailFenceCipherDecode(): RailFenceCipherDecode
    {
        $this->container = new DIContainer();
        return $this->container->getRailFenceCipherDecode();
    }

    public function testCanBeInstantiated(): void
    {
        Assert::assertInstanceOf(RailFenceCipherDecode::class, $this->getRailFenceCipherDecode());
    }

    public function testThrowsExceptionOnEmptyInputText(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->getRailFenceCipherDecode()->decode('', 2);
    }

    /**
     * @dataProvider provideRailFenceCipherDecodeData
     */
    public function testConvertWordAndRailsToEncodeMatrix(string $inputText, int $numberOfRails, string $expectedOutputText): void
    {
        $actualOutputText = $this->getRailFenceCipherDecode()->decode($inputText, $numberOfRails);

        self::assertEquals($expectedOutputText, $actualOutputText);
    }

    public function provideRailFenceCipherDecodeData(): Generator
    {
        yield 'hoielaanlg and 3 rails' => [
            'inputText' => 'hoielaanlg',
            'numberOfRails' => 3,
            'expectedOutputText' => 'helloagain'
        ];

        yield 'EIEXMSMESAORIWSCE and 5 rails' => [
            'inputText' => 'EIEXMSMESAORIWSCE',
            'numberOfRails' => 5,
            'expectedOutputText' => 'EXERCISMISAWESOME'
        ];

        yield 'sequence of numbers and 6 rails' => [
            'inputText' => '133714114238148966225439541018335470986172518171757571896261',
            'numberOfRails' => 6,
            'expectedOutputText' => '112358132134558914423337761098715972584418167651094617711286'
        ];
    }
}
