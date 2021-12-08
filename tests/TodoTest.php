<?php

namespace Todo\Tests;

use function Todo\Todo\addTodo;
use function Todo\Todo\deleteTodo;
use function Todo\Todo\getTodoListFromFile;
use function Todo\Todo\saveTodoListInFile;

class TodoTest extends \PHPUnit\Framework\TestCase
{
    private $tempFilePath;

    public function setUp(): void
    {
        $this->tempFilePath  = __DIR__ . '/__tempjsonfile.json';
        touch($this->tempFilePath);
    }

    public function tearDown(): void
    {
        unlink($this->tempFilePath);
    }

    public function test_add_todo(): void
    {
        $todoList = [];

        $todo = 'Помыть посуду';

        $updatedTodoList = addTodo($todo, $todoList);

        $this->assertEquals([$todo], $updatedTodoList);
    }

    public function test_delete_todo(): void
    {
        $todoList = [
            'Помыть посуду',
            'Помыть посуду 2',
            'Помыть посуду 3',
        ];

        $index = 1;

        $updatedTodoList = deleteTodo($index, $todoList);

        $expectedTodoList= [
            'Помыть посуду',
            'Помыть посуду 3',
        ];

        $this->assertEquals($expectedTodoList, $updatedTodoList);
    }

    public function test_delete_todo_by_error_index(): void
    {
        $todoList = [
            'Помыть посуду',
            'Помыть посуду 2',
            'Помыть посуду 3',
        ];

        $index = 100;

        $updatedTodoList = deleteTodo($index, $todoList);

        $this->assertEquals($todoList, $updatedTodoList);
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

    public function test_save_todo_list(): void
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
