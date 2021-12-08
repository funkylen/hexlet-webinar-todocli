<?php

namespace Todo\Storage;

use function config\app\getStorageDriver;
use function config\app\getStorageFilePath;

const AVAILABLE_DRIVERS = [
    'filesystem',
];

function getTodoList(): array
{
    $driver = getStorageDriver(); 

    if ($driver === 'filesystem') {
        $filePath = getStorageFilePath();
        return \Todo\Storages\FilesystemStorage\getTodoList($filePath);
    }

    throw new \Exception('Unknown driver');
}

function saveTodoList(array $todoList): void
{
    $driver = getStorageDriver();

    if ($driver === 'filesystem') {
        $filePath = getStorageFilePath();
        \Todo\Storages\FilesystemStorage\saveTodoList($todoList, $filePath);
        return;
    }

    throw new \Exception('Unknown driver');
}

