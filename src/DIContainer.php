<?php

declare(strict_types=1);

final class DIContainer
{
    public function getRailFenceCipherDecode(): RailFenceCipherDecode
    {
        return new RailFenceCipherDecode($this->getDecodeMatrix());
    }

    public function getRailFenceCipherEncode(): RailFenceCipherEncode
    {
        return new RailFenceCipherEncode($this->getEncodeMatrix());
    }

    public function getDecodeMatrix(): DecodeMatrix
    {
        return new DecodeMatrix($this->getRail());
    }

    public function getEncodeMatrix(): EncodeMatrix
    {
        return new EncodeMatrix($this->getRail());
    }

    public function getRail(): Rail
    {
        return new Rail();
    }
}