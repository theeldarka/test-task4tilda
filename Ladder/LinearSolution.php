<?php

namespace Ladder;

class LinearSolution implements Solution
{
    public function render(int $start, int $end): void
    {
        $current = $start;

        for ($row = 1; ; $row++) {
            for ($column = 1; $column <= $row; $column++) {
                if ($current > $end) {
                    break 2;
                }

                echo sprintf('%d ', $current);

                $current++;
            }

            echo PHP_EOL;
        }
    }
}
