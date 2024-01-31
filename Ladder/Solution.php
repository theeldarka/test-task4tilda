<?php

namespace Ladder;

interface Solution
{
    public function render(int $start, int $end): void;
}
