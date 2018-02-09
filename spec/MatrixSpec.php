<?php

namespace spec;

use Matrix;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MatrixSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Matrix::class);
    }

    function it_returns_correct_matrix_with_2_rails()
    {
        //mock an associative array with phpspec matcher
        $this->getMatrix(["H","A","L","L","O"], [0,1,0,1,0], 2)->shouldHaveKey('0');
        $this->getMatrix(["H","A","L","L","O"], [0,1,0,1,0], 2)->shouldHaveKey('1');
        $this->getMatrix(["H","A","L","L","O"], [0,1,0,1,0], 2)->shouldHaveValue(array("H",".","L",".","O"));
        $this->getMatrix(["H","A","L","L","O"], [0,1,0,1,0], 2)->shouldHaveValue(array(".","A",".","L","."));
    }

    function it_returns_correct_matrix_with_4_rails()
    {
        $this->getMatrix(["X","O","X","O","X","O","X","O","X","O"], [0,1,2,3,2,1,0,1,2,3], 4)->shouldHaveKey('0');
        $this->getMatrix(["X","O","X","O","X","O","X","O","X","O"], [0,1,2,3,2,1,0,1,2,3], 4)->shouldHaveKey('1');
        $this->getMatrix(["X","O","X","O","X","O","X","O","X","O"], [0,1,2,3,2,1,0,1,2,3], 4)->shouldHaveKey('2');
        $this->getMatrix(["X","O","X","O","X","O","X","O","X","O"], [0,1,2,3,2,1,0,1,2,3], 4)->shouldHaveKey('3');
        $this->getMatrix(["X","O","X","O","X","O","X","O","X","O"], [0,1,2,3,2,1,0,1,2,3], 4)->shouldHaveValue(array("X",".",".",".",".",".","X",".",".","."));
        $this->getMatrix(["X","O","X","O","X","O","X","O","X","O"], [0,1,2,3,2,1,0,1,2,3], 4)->shouldHaveValue(array(".","O",".",".",".","O",".","O",".","."));
        $this->getMatrix(["X","O","X","O","X","O","X","O","X","O"], [0,1,2,3,2,1,0,1,2,3], 4)->shouldHaveValue(array(".",".","X",".","X",".",".",".","X","."));
        $this->getMatrix(["X","O","X","O","X","O","X","O","X","O"], [0,1,2,3,2,1,0,1,2,3], 4)->shouldHaveValue(array(".",".",".","O",".",".",".",".",".","O"));

        # this works without the matcher:
        #$this->getMatrix(["X","O","X","O","X","O","X","O","X","O"], [0,1,2,3,2,1,0,1,2,3], 4)[0]->shouldBe(array("X",".",".",".",".",".","X",".",".","."));
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
