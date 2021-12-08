<?php

namespace Todo\Tests;

use function config\app\getStorageFilePath;
use function Todo\Storages\FilesystemStorage\getTodoList;
use function Todo\Storages\FilesystemStorage\saveTodoList;

class FilesystemStorageTest extends \PHPUnit\Framework\TestCase
{
    private $filePath;

    public function setUp(): void
    {
        $this->filePath  = getStorageFilePath();
        var_dump($this->filePath);
        touch($this->filePath);
    }

    public function tearDown(): void
    {
        unlink($this->filePath);
    }

    public function test_get_todo_list(): void
    { 
        $fixturePath = __DIR__ . '/fixtures/todo.json';

        $todoList = [
            'Task1',
            'Task2',
            'Task3',
        ];

        $this->assertEquals($todoList, getTodoList($fixturePath));
    }

    public function test_save_todo_list(): void
    {
        $todoList = [
            'Task1',
            'Task2',
            'Task3',
        ];

        saveTodoList($todoList, $this->filePath);

        $this->assertJsonStringEqualsJsonFile($this->filePath, json_encode($todoList));
    }
}
