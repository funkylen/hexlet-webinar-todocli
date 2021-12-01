<?php

namespace Todo\Cli;

function start(): void
{
    echo 'Hello';
}

function addTodo(string $newTodo, array $todoList): array
{
    $todoList[] = $newTodo;
    return $todoList;
}

function deleteTodo(int $index, array $todoList): array
{
    unset($todoList[$index]);
    return array_values($todoList);
}
