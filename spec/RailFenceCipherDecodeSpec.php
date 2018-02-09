<?php

namespace spec;

use Rail;
use RailFenceCipherDecode;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RailFenceCipherDecodeSpec extends ObjectBehavior
{
    function let(Rail $rail)
    {
        $this->beConstructedWith($rail);
        $rail->getRails(Argument::any())->willReturn(true);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(RailFenceCipherDecode::class);
    }

    function it_returns_decoded_string_for_three_rails()
    {
        $this->decode("hoielaanlg", 3)->shouldReturn("helloagain");
    }

    function it_returns_decoded_string_for_five_rails()
    {
        $this->decode("EIEXMSMESAORIWSCE", 5)->shouldReturn("EXERCISMISAWESOME");
    }

    function it_returns_decoded_string_for_six_rails()
    {
        $this->decode("133714114238148966225439541018335470986172518171757571896261", 6)->shouldReturn("112358132134558914423337761098715972584418167651094617711286");
    }
}
