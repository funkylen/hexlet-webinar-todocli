<?php

namespace Todo\Todo;

const FILEPATH = __DIR__ . '/../storage/todo.json';

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
    return getTodoListFromFile(FILEPATH);
}

function getTodoListFromFile(string $filePath): array
{
    $content = file_get_contents($filePath);

    return json_decode($content);
}

function saveTodoList(array $todoList): void
{
    saveTodoListInFile($todoList, FILEPATH);
}

function saveTodoListInFile(array $todoList, string $filePath)
{
    $todoListJsonString = json_encode($todoList, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

    file_put_contents($filePath, $todoListJsonString);
}
