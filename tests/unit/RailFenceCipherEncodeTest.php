<?php

declare(strict_types=1);

namespace Tests\unit;

use EncodeMatrix;
use Generator;
use InvalidArgumentException;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use Rail;
use RailFenceCipherEncode;


final class RailFenceCipherEncodeTest extends TestCase
{
    public function testCanBeInstantiated(): void
    {
        $railFenceCipherEncoder = $this->getRailFenceCipherEncode();
        Assert::assertInstanceOf(RailFenceCipherEncode::class, $railFenceCipherEncoder);
    }

    public function testThrowsExceptionOnEmptyInputText(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->getRailFenceCipherEncode()->encode('', 2);
    }

    /**
     * @dataProvider provideRailFenceCipherDecodeData
     */
    public function testConvertWordAndRailsToEncodeMatrix(string $inputText, int $numberOfRails, string $expectedOutputText): void
    {
        $actualOutputText = $this->getRailFenceCipherEncode()->encode($inputText, $numberOfRails);

        self::assertEquals($expectedOutputText, $actualOutputText);
    }

    public function provideRailFenceCipherDecodeData(): Generator
    {
        yield 'XOXOX and 2 rails' => [
            'inputText' => 'XOXOX',
            'numberOfRails' => 2,
            'expectedOutputText' => 'XXXOO'
        ];

        yield 'word with white space and 2 rails' => [
            'inputText' => 'hello again',
            'numberOfRails' => 2,
            'expectedOutputText' => 'hloaanel gi'
        ];

        yield 'word with white space and 3 rails' => [
            'inputText' => 'hello again',
            'numberOfRails' => 3,
            'expectedOutputText' => 'hoael gilan'
        ];

        yield 'EXERCISMISAWESOME and 5 rails' => [
            'inputText' => 'EXERCISMISAWESOME',
            'numberOfRails' => 5,
            'expectedOutputText' => 'EIEXMSMESAORIWSCE'
        ];

        yield 'sequence of numbers and 6 rails' => [
            'inputText' => '112358132134558914423337761098715972584418167651094617711286',
            'numberOfRails' => 6,
            'expectedOutputText' => '133714114238148966225439541018335470986172518171757571896261'
        ];
    }

    private function getRailFenceCipherEncode(): RailFenceCipherEncode
    {
        return new RailFenceCipherEncode(new EncodeMatrix(new Rail()));
    }
}
