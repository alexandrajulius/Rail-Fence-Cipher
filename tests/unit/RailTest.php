<?php

declare(strict_types=1);

namespace tests\unit;

use Rail;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

final class RailTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $example = new Rail();
        Assert::assertInstanceOf(Rail::class, $example);
    }

    function testDryRun()
    {
        $actualArray = (new Rail())->getRails(10,4);

        $expectedArray = [
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
        ];

        $this->assertEquals($expectedArray, $actualArray, 'Number of Rails do not match.');
    }
}