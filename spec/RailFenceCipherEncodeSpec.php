<?php

namespace spec;

use EncodeMatrix;
use Rail;
use RailFenceCipherEncode;
use PhpSpec\ObjectBehavior;

class RailFenceCipherEncodeSpec extends ObjectBehavior
{
    function let() {
        $this->beConstructedWith(new EncodeMatrix(new Rail()));
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

    function it_returns_correct_string_for_2_rails()
    {
        $this->encode("XOXOX", 2)->shouldReturn("XXXOO");
    }

    function it_returns_decoded_string_for_2_rails_with_white_space()
    {
        $this->encode("hello again", 2)->shouldReturn("hloaanel gi");
    }

    function it_returns_decoded_string_for_3_rails()
    {
        $this->encode("helloagain", 3)->shouldReturn("hoielaanlg");
    }

    function it_returns_decoded_string_for_3_rails_with_white_space()
    {
        $this->encode("hello again", 3)->shouldReturn("hoael gilan");
    }

    function it_returns_decoded_string_for_5_rails()
    {
        $this->encode("EXERCISMISAWESOME", 5)->shouldReturn("EIEXMSMESAORIWSCE");
    }

    function it_returns_decoded_string_for_6_rails()
    {
        $this->encode("112358132134558914423337761098715972584418167651094617711286", 6)->shouldReturn("133714114238148966225439541018335470986172518171757571896261");
    }
}
