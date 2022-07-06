<?php

require_once __DIR__ . "/../../vendor/autoload.php";

$task = getTask("task__input");

if (!$task) {
    //validar task vazia
}

$handler = getTaskHandler();

$handler[$task] = ["completed" => false];

setTask($handler);

redirect();
