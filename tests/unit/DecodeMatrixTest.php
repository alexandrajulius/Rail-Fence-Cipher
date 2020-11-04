<?php

declare(strict_types=1);

namespace Tests\unit;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use DecodeMatrix;

final class DecodeMatrixTest extends TestCase
{
    public function testCanBeInstantiated(): void
    {
        $example = new DecodeMatrix();
        Assert::assertInstanceOf(DecodeMatrix::class, $example);
    }


}