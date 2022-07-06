<?php require_once __DIR__ . "/bootstrap.php";

$handler = getTaskHandler(JSON_PATH);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./src/resources/css/reset.css">
    <link rel="stylesheet" href="./src/resources/css/import.css">
    <link rel="stylesheet" href="./src/resources/css/root.css">
    <link rel="stylesheet" href="./src/resources/css/global.css">
    <link rel="stylesheet" href="./src/resources/css/container.css">
    <link rel="stylesheet" href="./src/resources/css/input.css">
    <link rel="stylesheet" href="./src/resources/css/checkbox.css">
    <link rel="stylesheet" href="./src/resources/css/button.css">
    <link rel="stylesheet" href="./src/resources/css/task.css">
    <link rel="stylesheet" href="./src/resources/css/breakpoint.css">
    <script defer src="./src/resources/js/ChangeTaskStateOnClick.js"></script>
    <title>To Do</title>
</head>

<body>
    <main class="container">
        <form action="./src/forms/NewTask.php" method="POST" class="form__container">
            <input type="text" placeholder="Digite uma nova tarefa" name="task__input" class="input" autofocus>
            <input type="submit" value="Adicionar" class="button" tabindex="none">
        </form>

        <?php foreach ($handler as $task => $state) : ?>
            <section class="task__container">
                <form action="./src/forms/ChangeTaskState.php" method="POST">
                    <input type="hidden" name="task__name" value="<?= $task; ?>">
                    <input type="checkbox" <?= $state["completed"] ? "checked" : "" ?> class="checkbox">
                </form>

                <p><?= $task; ?></p>
                
                <form action="./src/forms/DeleteTask.php" method="POST">
                    <input type="hidden" name="task__name" value="<?= $task; ?>">
                    <input type="submit" value="Excluir" class="button--small">
                </form>
            </section>
        <?php endforeach; ?>
    </main>
</body>
</html>
