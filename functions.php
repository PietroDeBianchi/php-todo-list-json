<?php

$listToDo = [
    [
        "task" => "HTML",
        "done" => true,
    ],
    [
        "task" => "CSS",
        "done" => true,
    ],
    [
        "task" => "JS",
        "done" => true,
    ],
    [
        "task" => "PHP",
        "done" => false,
    ],
    [
        "task" => "LARAVEL",
        "done" => false,
    ],
];

if (isset($_POST['tasking'])) {
    $listToDo[] = [
        'task' => $_POST['tasking']['task'],
        'done' => $_POST['tasking']['done'] === "false" ? false : true
    ];
};

header("Content-Type: application/json");
echo json_encode($listToDo);
