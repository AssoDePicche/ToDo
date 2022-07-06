<?php

require_once __DIR__ . "/../../vendor/autoload.php";

$handler = getTaskHandler();
$task = getTask("task__name");

deleteTask($handler, $task);

redirect();
