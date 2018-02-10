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

    function it_returns_correct_matrix_for_2_rails()
    {
        $this->getDecodeMatrix(["X","O","X","O","X"], 2)[0]->shouldBe(array("X",".","O",".","X"));
        $this->getDecodeMatrix(["X","O","X","O","X"], 2)[1]->shouldBe(array(".","O",".","X","."));
    }

    function it_returns_correct_matrix_for_3_rails()
    {
        $this->getDecodeMatrix(["h","e","l","l","o","a","g","a","i","n"], 3)[0]->shouldBe(array("h",".",".",".","e",".",".",".","l","."));
        $this->getDecodeMatrix(["h","e","l","l","o","a","g","a","i","n"], 3)[1]->shouldBe(array(".","l",".","o",".","a",".","g",".","a"));
        $this->getDecodeMatrix(["h","e","l","l","o","a","g","a","i","n"], 3)[2]->shouldBe(array(".",".","i",".",".",".","n",".",".","."));
    }

    function it_returns_correct_matrix_for_3_rails_with_white_space()
    {
        $this->getDecodeMatrix(["h","e","l","l","o"," ","a","g","a","i","n"], 3)[0]->shouldBe(array("h",".",".",".","e",".",".",".","l",".","."));
        $this->getDecodeMatrix(["h","e","l","l","o"," ","a","g","a","i","n"], 3)[1]->shouldBe(array(".","l",".","o","."," ",".","a",".","g","."));
        $this->getDecodeMatrix(["h","e","l","l","o"," ","a","g","a","i","n"], 3)[2]->shouldBe(array(".",".","a",".",".",".","i",".",".",".","n"));
    }
}
