<?php

use Ladder\CalculateBeforeSolution;
use Ladder\FunnySolution;
use Ladder\LinearSolution;
use Ladder\Solution;
use Matrix\MatrixSolution;

spl_autoload_register(fn(string $class) => require './' . str_replace('\\', '/', $class) . '.php');

function ladderTask(): void
{
    /** @var class-string[] $solutions */
    $solutions = [
        FunnySolution::class,
        CalculateBeforeSolution::class,
        LinearSolution::class,
    ];

    /** @var Solution $solution */
    $solution = new $solutions[rand(0, count($solutions) - 1)];

    $solution->render(1, 100);
}

function matrixTask(): void
{
    (new MatrixSolution(5, 7))->render();
}

ladderTask();

echo PHP_EOL . PHP_EOL;

matrixTask();
