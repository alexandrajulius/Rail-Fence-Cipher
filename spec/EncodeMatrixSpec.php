<?php

namespace spec;

use EncodeMatrix;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EncodeMatrixSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(EncodeMatrix::class);
    }

    function it_returns_correct_matrix_with_2_rails()
    {
        $this->getEncodeMatrix(["H","E","L","L","O"], 2)->shouldHaveKey('0');
        $this->getEncodeMatrix(["H","E","L","L","O"], 2)->shouldHaveKey('1');
        $this->getEncodeMatrix(["H","E","L","L","O"], 2)->shouldHaveValue(array("H",".","L",".","O"));
        $this->getEncodeMatrix(["H","E","L","L","O"], 2)->shouldHaveValue(array(".","E",".","L","."));
    }

    function it_returns_correct_matrix_with_2_rails_and_white_space()
    {
        $this->getEncodeMatrix(["H","E","L","L","O"," "], 2)->shouldHaveKey('0');
        $this->getEncodeMatrix(["H","E","L","L","O"," "], 2)->shouldHaveKey('1');
        $this->getEncodeMatrix(["H","E","L","L","O"," "], 2)->shouldHaveValue(array("H",".","L",".","O","."));
        $this->getEncodeMatrix(["H","E","L","L","O"," "], 2)->shouldHaveValue(array(".","E",".","L","."," "));
    }
/*
    function it_returns_different_test()
    {
        $mockMatrix = array();
        $mockMatrix[0] = str_split("X.X.X");
        $mockMatrix[1] = str_split(".O.O.");
        $this->getMatrix(["X","O","X","O","X"], 2)->willReturn($mockMatrix);
    }
*/
    function it_returns_correct_matrix_with_4_rails()
    {
        $this->getEncodeMatrix(["X","O","X","O","X","O","X","O","X","O"], 4)->shouldHaveKey('0');
        $this->getEncodeMatrix(["X","O","X","O","X","O","X","O","X","O"], 4)->shouldHaveKey('1');
        $this->getEncodeMatrix(["X","O","X","O","X","O","X","O","X","O"], 4)->shouldHaveKey('2');
        $this->getEncodeMatrix(["X","O","X","O","X","O","X","O","X","O"], 4)->shouldHaveKey('3');
        $this->getEncodeMatrix(["X","O","X","O","X","O","X","O","X","O"], 4)->shouldHaveValue(array("X",".",".",".",".",".","X",".",".","."));
        $this->getEncodeMatrix(["X","O","X","O","X","O","X","O","X","O"], 4)->shouldHaveValue(array(".","O",".",".",".","O",".","O",".","."));
        $this->getEncodeMatrix(["X","O","X","O","X","O","X","O","X","O"], 4)->shouldHaveValue(array(".",".","X",".","X",".",".",".","X","."));
        $this->getEncodeMatrix(["X","O","X","O","X","O","X","O","X","O"], 4)->shouldHaveValue(array(".",".",".","O",".",".",".",".",".","O"));
    }

    public function getMatchers(): array
    {
        return [
            'haveKey' => function ($subject, $key) {
                return array_key_exists($key, $subject);
            },
            'haveValue' => function ($subject, $value) {
                return in_array($value, $subject);
            },
        ];
    }
}
