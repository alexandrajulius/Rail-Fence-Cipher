<?php

namespace spec;

use RailFenceCipherEncode;
use Rail;
use Matrix;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RailFenceCipherEncodeSpec extends ObjectBehavior
{

    function let(Rail $rail, Matrix $matrix)
    {
        $this->beConstructedWith($rail, $matrix);
        $rail->getRails(Argument::any())->willReturn(true);
        $matrix->getMatrix(Argument::any())->willReturn(true);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(RailFenceCipherEncode::class);
    }

    function it_throws_exception_for_empty_input_text()
    {
        $this->shouldThrow(new \InvalidArgumentException('Empty input.\n'))->duringEncode("", 2);
    }

    function it_throws_exception_for_invalid_number_of_rails()
    {
        $this->shouldThrow(new \InvalidArgumentException('The number of rails must be greater than one.\n'))->duringEncode("hallo", 1);
    }

    function it_returns_correct_string_for_2_rails(Rail $rail, Matrix $matrix)
    {
        $rail->getRails(5,2)->willReturn([0,1,0,1,0]);
        $mockMatrix = array();
        $mockMatrix[0] = str_split("X.X.X");
        $mockMatrix[1] = str_split(".O.O.");
        $matrix->getMatrix(["X","O","X","O","X"], [0,1,0,1,0], 2)->willReturn($mockMatrix);
        $this->encode("XOXOX", 2)->shouldReturn("XXXOO");
    }
}
