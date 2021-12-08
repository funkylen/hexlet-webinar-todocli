<?php

namespace Todo\Storages\FilesystemStorage;

function getTodoList(string $filePath): array
{
    checkFileAndCreateIfNotExists($filePath);

    $content = file_get_contents($filePath);

    return json_decode($content);
}

function checkFileAndCreateIfNotExists(string $filePath): void
{
    if (!file_exists($filePath)) {
        touch($filePath);
        file_put_contents($filePath, '[]');
    }
}

function saveTodoList(array $todoList, string $filePath)
{
    checkFileAndCreateIfNotExists($filePath);

    $todoListJsonString = json_encode($todoList, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

    file_put_contents($filePath, $todoListJsonString);
}
