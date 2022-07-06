<?php

require_once __DIR__ . "/../../vendor/autoload.php";

$handler = getTaskHandler();
$task = getTask("task__name");

changeTaskState($handler, $task);

redirect();
