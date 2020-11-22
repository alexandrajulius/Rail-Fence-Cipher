<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use DecodeMatrix;
use Rail;

class DecodeMatrixSpec extends ObjectBehavior
{
    function let() {
        $this->beConstructedWith(new Rail());
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(DecodeMatrix::class);
    }

    function it_returns_empty_matrix_for_empty_string_and_two_rails()
    {
        $this->create([''], 2)[0]->shouldBe(array(''));
    }

    function it_returns_correct_matrix_for_2_rails()
    {
        $this->create(['X','O','X','O','X'], 2)[0]->shouldBe(array('X','.','O','.','X'));
        $this->create(['X','O','X','O','X'], 2)[1]->shouldBe(array('.','O','.','X','.'));
    }

    function it_returns_correct_matrix_for_3_rails()
    {
        $this->create(['h','e','l','l','o','a','g','a','i','n'], 3)[0]->shouldBe(array('h','.','.','.','e','.','.','.','l','.'));
        $this->create(['h','e','l','l','o','a','g','a','i','n'], 3)[1]->shouldBe(array('.','l','.','o','.','a','.','g','.','a'));
        $this->create(['h','e','l','l','o','a','g','a','i','n'], 3)[2]->shouldBe(array('.','.','i','.','.','.','n','.','.','.'));
    }

    function it_returns_correct_matrix_for_3_rails_with_white_space()
    {
        $this->create(['h','e','l','l','o',' ','a','g','a','i','n'], 3)[0]->shouldBe(array('h','.','.','.','e','.','.','.','l','.','.'));
        $this->create(['h','e','l','l','o',' ','a','g','a','i','n'], 3)[1]->shouldBe(array('.','l','.','o','.',' ','.','a','.','g','.'));
        $this->create(['h','e','l','l','o',' ','a','g','a','i','n'], 3)[2]->shouldBe(array('.','.','a','.','.','.','i','.','.','.','n'));
    }
}
