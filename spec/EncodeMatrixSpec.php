<?php

namespace spec;

use EncodeMatrix;
use PhpSpec\ObjectBehavior;
use Rail;

class EncodeMatrixSpec extends ObjectBehavior
{
    function let() {
        $this->beConstructedWith(new Rail());
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(EncodeMatrix::class);
    }

    function it_returns_empty_matrix_for_empty_string_and_two_rails()
    {
        $this->create([''], 2)[0]->shouldBe(array(''));
    }

    function it_returns_correct_matrix_with_2_rails()
    {
        $this->create(['H','E','L','L','O'], 2)->shouldHaveKey('0');
        $this->create(['H','E','L','L','O'], 2)->shouldHaveKey('1');
        $this->create(['H','E','L','L','O'], 2)->shouldHaveValue(array('H','.','L','.','O'));
        $this->create(['H','E','L','L','O'], 2)->shouldHaveValue(array('.','E','.','L','.'));
    }

    function it_returns_correct_matrix_with_2_rails_and_white_space()
    {
        $this->create(['H','E','L','L','O',' '], 2)->shouldHaveKey('0');
        $this->create(['H','E','L','L','O',' '], 2)->shouldHaveKey('1');
        $this->create(['H','E','L','L','O',' '], 2)->shouldHaveValue(array('H','.','L','.','O','.'));
        $this->create(['H','E','L','L','O',' '], 2)->shouldHaveValue(array('.','E','.','L','.',' '));
    }

    function it_returns_correct_matrix_with_4_rails()
    {
        $this->create(['X','O','X','O','X','O','X','O','X','O'], 4)->shouldHaveKey('0');
        $this->create(['X','O','X','O','X','O','X','O','X','O'], 4)->shouldHaveKey('1');
        $this->create(['X','O','X','O','X','O','X','O','X','O'], 4)->shouldHaveKey('2');
        $this->create(['X','O','X','O','X','O','X','O','X','O'], 4)->shouldHaveKey('3');
        $this->create(['X','O','X','O','X','O','X','O','X','O'], 4)->shouldHaveValue(array('X','.','.','.','.','.','X','.','.','.'));
        $this->create(['X','O','X','O','X','O','X','O','X','O'], 4)->shouldHaveValue(array('.','O','.','.','.','O','.','O','.','.'));
        $this->create(['X','O','X','O','X','O','X','O','X','O'], 4)->shouldHaveValue(array('.','.','X','.','X','.','.','.','X','.'));
        $this->create(['X','O','X','O','X','O','X','O','X','O'], 4)->shouldHaveValue(array('.','.','.','O','.','.','.','.','.','O'));
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
