<?php

namespace Matrix;

class MatrixSolution
{
    /**
     * @var array<array<int>>
     */
    protected array $matrix;

    /**
     * @var array<int>
     */
    protected array $sumRows;

    /**
     * @var array<int>
     */
    protected array $sumColumns;

    public function __construct(int $n, int $m)
    {
        $this->matrix = $this->generate($n, $m);

        $this->calculateSums();

        return $this;
    }

    public function generate(int $n, int $m): array
    {
        $set = [];
        $matrix = [];

        for ($row = 0; $row < $n; $row++) {
            $columns = [];

            for ($column = 0; $column < $m; $column++) {
                do {
                    $rand = random_int(1, 1000);
                } while (isset($set[$rand]));

                $set[$rand] = true;

                $columns[] = $rand;
            }

            $matrix[] = $columns;
        }

        return $matrix;
    }

    public function render(): void
    {
        foreach ($this->matrix as $i => $row) {
            foreach ($row as $element) {
                echo $element . ' ';
            }

            echo sprintf("-> %s%s", static::formatNumber($this->sumRows[$i]), PHP_EOL);
        }

        $columns = count($this->matrix[0] ?? []);

        for ($columnIndex = 0; $columnIndex < $columns; $columnIndex++) {
            echo static::formatNumber($this->sumColumns[$columnIndex]) . ' ';
        }

        echo sprintf('<- total(%s)%s', static::formatNumber($this->getTotal()), PHP_EOL);
    }

    protected function calculateSums(): void
    {
        $this->sumRows = array_map(fn(array $row) => array_sum($row), $this->matrix);

        foreach ($this->matrix as $row) {
            foreach ($row as $columnIndex => $element) {
                if (isset($this->sumColumns[$columnIndex]) === false) {
                    $this->sumColumns[$columnIndex] = $element;
                } else {
                    $this->sumColumns[$columnIndex] += $element;
                }
            }
        }
    }

    protected function getTotal(): int
    {
        return array_sum($this->sumRows) + array_sum($this->sumColumns);
    }

    protected static function formatNumber(int $number): string
    {
        return "$number";
        /* TODO:
         * return number_format(
            num: $number,
            thousands_separator: ' ',
        );*/
    }
}
