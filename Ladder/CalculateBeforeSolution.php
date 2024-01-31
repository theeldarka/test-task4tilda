<?php

namespace Ladder;

class CalculateBeforeSolution implements Solution
{
    public function render(int $start, int $end): void
    {
        $i = $start; // 1
        $numbersInRow = 1; // 100

        while ($i <= $end) {
            $numbersToPrint = static::getNumbersToPrint($i, $numbersInRow, $end);
            if (count($numbersToPrint) < 1) {
                break;
            }

            static::printNumbers($numbersToPrint);

            $i = $numbersToPrint[count($numbersToPrint) - 1] + 1;
            $numbersInRow++;
        }
    }

    /**
     * @param int $next
     * @param int $count
     * @param int $limit
     *
     * @return int[]
     */
    protected static function getNumbersToPrint(int $next, int $count, int $limit): array
    {
        $numbersToPrint = [];

        if ($next + $count > $limit) {
            $count = $limit - $next + 1;
        }

        for ($j = 0; $j < $count; $j++) {
            $numbersToPrint[] = $next + $j;
        }

        return $numbersToPrint;
    }

    /**
     * @param int[] $numbers
     *
     * @return void
     */
    protected static function printNumbers(array $numbers): void
    {
        echo implode(' ', $numbers) . PHP_EOL;
    }
}
