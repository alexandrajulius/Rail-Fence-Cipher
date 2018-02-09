<?php

namespace spec;

use DecodeMatrix;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DecodeMatrixSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(DecodeMatrix::class);
    }

    function it_returns_correct_matrix_for_3_rails()
    {
        $this->getDecodeMatrix([0,1,2,1,0,1,2,1,0,1], 3)->shouldHaveCount(3);
        $this->getDecodeMatrix([0,1,2,1,0,1,2,1,0,1], 3)[0]->shouldBe(array("?",".",".",".","?",".",".",".","?","."));
        $this->getDecodeMatrix([0,1,2,1,0,1,2,1,0,1], 3)[1]->shouldBe(array(".","?",".","?",".","?",".","?",".","?"));
        $this->getDecodeMatrix([0,1,2,1,0,1,2,1,0,1], 3)[2]->shouldBe(array(".",".","?",".",".",".","?",".",".","."));
    }
}
