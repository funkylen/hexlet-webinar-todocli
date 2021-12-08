<?php

namespace Todo\Todo;

function addTodo(string $newTodo, array $todoList): array
{
    $todoList[] = $newTodo;
    saveTodoList($todoList);
    return $todoList;
}

function deleteTodo(int $index, array $todoList): array
{
    unset($todoList[$index]);
    $newTodoList = array_values($todoList);
    saveTodoList($newTodoList);
    return $newTodoList;
}

function getTodoList(): array
{
    return \Todo\Storage\getTodoList();
}

function saveTodoList(array $todoList): void
{
    \Todo\Storage\saveTodoList($todoList);
}
