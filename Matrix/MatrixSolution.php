<?php

namespace Matrix;

class MatrixSolution
{
    /**
     * @var array<array<int>>
     */
    protected array $matrix;

    public function __construct(int $n, int $m)
    {
        $this->matrix = $this->generate($n, $m);

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
        foreach ($this->matrix as $row) {
            foreach ($row as $element) {
                echo $element . ' ';
            }

            echo PHP_EOL;
        }
    }
}
