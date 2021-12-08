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
    checkFileAndCreateIfNotExists($filePath);

    $content = file_get_contents($filePath);

    return json_decode($content);
}

function checkFileAndCreateIfNotExists(string $filePath): void
{
    if (!file_exists($filePath)) {
        touch($filePath);
    }
}

function saveTodoList(array $todoList): void
{
    saveTodoListInFile($todoList, getFilePath());
}

function saveTodoListInFile(array $todoList, string $filePath)
{
    checkFileAndCreateIfNotExists($filePath);

    $todoListJsonString = json_encode($todoList, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

    file_put_contents($filePath, $todoListJsonString);
}
