<?php

namespace spec;

use Rail;
use PhpSpec\ObjectBehavior;

class RailSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Rail::class);
    }

    function it_returns_correct_rails_for_10_letters_and_4_rails()
    {
        $actualArray = $this->getRails(10,4);
        $actualArray->shouldHaveKeyWithValue(0,0);
        $actualArray->shouldHaveKeyWithValue(1,1);
        $actualArray->shouldHaveKeyWithValue(2,2);
        $actualArray->shouldHaveKeyWithValue(3,3);
        $actualArray->shouldHaveKeyWithValue(4,2);
        $actualArray->shouldHaveKeyWithValue(5,1);
        $actualArray->shouldHaveKeyWithValue(6,0);
        $actualArray->shouldHaveKeyWithValue(7,1);
        $actualArray->shouldHaveKeyWithValue(8,2);
        $actualArray->shouldHaveKeyWithValue(9,3);
        $actualArray->shouldHaveCount(10);
    }

    function it_returns_correct_rails_for_20_letters_and_3_rails()
    {
        $actualArray = $this->getRails(20,3);
        $actualArray->shouldHaveKeyWithValue(0,0);
        $actualArray->shouldHaveKeyWithValue(1,1);
        $actualArray->shouldHaveKeyWithValue(2,2);
        $actualArray->shouldHaveKeyWithValue(3,1);
        $actualArray->shouldHaveKeyWithValue(4,0);
        $actualArray->shouldHaveKeyWithValue(5,1);
        $actualArray->shouldHaveKeyWithValue(6,2);
        $actualArray->shouldHaveKeyWithValue(7,1);
        $actualArray->shouldHaveKeyWithValue(8,0);
        $actualArray->shouldHaveKeyWithValue(9,1);
        $actualArray->shouldHaveKeyWithValue(10,2);
        $actualArray->shouldHaveKeyWithValue(11,1);
        $actualArray->shouldHaveKeyWithValue(12,0);
        $actualArray->shouldHaveKeyWithValue(13,1);
        $actualArray->shouldHaveKeyWithValue(14,2);
        $actualArray->shouldHaveKeyWithValue(15,1);
        $actualArray->shouldHaveKeyWithValue(16,0);
        $actualArray->shouldHaveKeyWithValue(17,1);
        $actualArray->shouldHaveKeyWithValue(18,2);
        $actualArray->shouldHaveKeyWithValue(19,1);
        $actualArray->shouldHaveCount(20);
    }
}
