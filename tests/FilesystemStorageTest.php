<?php

namespace Todo\Tests;

use function Todo\Storages\FilesystemStorage\getTodoListFromFile;
use function Todo\Storages\FilesystemStorage\saveTodoListInFile;

class FilesystemStorageTest extends \PHPUnit\Framework\TestCase
{
    private $tempFilePath;

    public function setUp(): void
    {
        $this->tempFilePath  = '/tmp/__tempjsonfile.json';
        touch($this->tempFilePath);
    }

    public function tearDown(): void
    {
        unlink($this->tempFilePath);
    }

    public function test_get_todo_list_from_file(): void
    { 
        $fixturePath = __DIR__ . '/fixtures/todo.json';

        $todoList = [
            'Task1',
            'Task2',
            'Task3',
        ];

        $this->assertEquals($todoList, getTodoListFromFile($fixturePath));
    }

    public function test_save_todo_list_in_file(): void
    {
        $todoList = [
            'Task1',
            'Task2',
            'Task3',
        ];

        saveTodoListInFile($todoList, $this->tempFilePath);

        $this->assertJsonStringEqualsJsonFile($this->tempFilePath, json_encode($todoList));
    }
}
