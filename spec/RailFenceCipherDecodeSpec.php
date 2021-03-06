<?php

namespace spec;

use Container;
use RailFenceCipherDecode;
use PhpSpec\ObjectBehavior;

class RailFenceCipherDecodeSpec extends ObjectBehavior
{
    function let() {
        $this->beConstructedWith((new Container)->getDecodeMatrix());
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(RailFenceCipherDecode::class);
    }

    function it_returns_decoded_string_for_3_rails()
    {
        $this->decode('hoielaanlg', 3)->shouldReturn('helloagain');
    }

    function it_returns_decoded_string_for_5_rails()
    {
        $this->decode('EIEXMSMESAORIWSCE', 5)->shouldReturn('EXERCISMISAWESOME');
    }

    function it_returns_decoded_string_for_6_rails()
    {
        $this->decode('133714114238148966225439541018335470986172518171757571896261', 6)->shouldReturn('112358132134558914423337761098715972584418167651094617711286');
    }
}
