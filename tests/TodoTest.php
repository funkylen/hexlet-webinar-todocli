<?php

namespace Todo\Tests;

use function Todo\Cli\addTodo;
use function Todo\Cli\deleteTodo;

class TodoTest extends \PHPUnit\Framework\TestCase
{
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
}
