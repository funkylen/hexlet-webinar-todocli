<?php

namespace Todo\Cli;

use function cli\line;
use function cli\menu;
use function cli\prompt;
use function Todo\Todo\addTodo;
use function Todo\Todo\deleteTodo;

function start(): void
{
    $todoList = [];

    $menu = [
        'add' => 'Добавить',
        'delete' => 'Удалить',
        'exit' => 'Выйти',
    ];

    $isAppRunning = true;
    while ($isAppRunning) {
        showTodoList($todoList);

        $menuChoose = menu($menu, null, 'Выберите действие');

        if ($menuChoose === 'add') {
            $input = prompt('Введите задачу');
            $todoList = addTodo($input, $todoList);
        } elseif ($menuChoose === 'delete') {
            $choosenIndex = menu($todoList, null, 'Выберите какую задачу удалить');
            $todoList = deleteTodo($choosenIndex, $todoList);
        } elseif ($menuChoose === 'exit') {
            $isAppRunning = false;
        }
    }
}

function showTodoList(array $todoList): void
{
        line('  --- Задачи ---');
    foreach ($todoList as $index => $todo) {
        $number = $index + 1;
        line("  {$number}. {$todo}");
    }
        line('  --- Конец списка ---');
        line();
}
