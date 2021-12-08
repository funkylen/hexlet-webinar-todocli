<?php

namespace Todo\Storages\FilesystemStorage;

function getFilePath(): string
{
    return $GLOBALS['appconfig']['STORAGE_FILEPATH'];
}

function getTodoList(): array
{
    return getTodoListFromFile(getFilepath());
}

function getTodoListFromFile(string $filePath): array
{
    $content = file_get_contents($filePath);

    return json_decode($content);
}

function saveTodoList(array $todoList): void
{
    saveTodoListInFile($todoList, getFilePath());
}

function saveTodoListInFile(array $todoList, string $filePath)
{
    $todoListJsonString = json_encode($todoList, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

    file_put_contents($filePath, $todoListJsonString);
}
