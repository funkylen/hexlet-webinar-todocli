<?php

namespace Todo\Storage;

const AVAILABLE_DRIVERS = [
    'filesystem',
];

function getDriver(): string
{
    return $GLOBALS['appconfig']['STORAGE_ADAPTER'];
}

function getTodoList(): array
{
    $driver = getDriver(); 

    if ($driver === 'filesystem') {
        return \Todo\Storages\FilesystemStorage\getTodoList();
    }

    throw new \Exception('Unknown driver');
}

function saveTodoList(array $todoList): void
{
    $driver = getDriver();

    if ($driver === 'filesystem') {
        \Todo\Storages\FilesystemStorage\saveTodoList($todoList);
        return;
    }

    throw new \Exception('Unknown driver');
}

