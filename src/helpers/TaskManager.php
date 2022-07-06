<?php

require_once __DIR__ . "/../../vendor/autoload.php";

function getTask(string $field): string
{
    $task = filter_input(INPUT_POST, "{$field}", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    return trim($task);
}

function setTask(array $handler): void
{
    file_put_contents(JSON_PATH, json_encode($handler, JSON_PRETTY_PRINT));
}

function getTaskHandler(): array | null
{
    if (!file_exists(JSON_PATH)) {
        $handler = [];
    }

    $json = file_get_contents(JSON_PATH);
    $handler = json_decode($json, true);

    return $handler;
}

function changeTaskState(array $handler, string $task): void
{
    $handler[$task]["completed"] = !$handler[$task]["completed"];
    setTask($handler);
}

function deleteTask(array $handler, string $task): void
{
    unset($handler[$task]);
    setTask($handler);
}
