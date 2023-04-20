<?php

$listToDo = [ 
        [
            "task" => "HTML" ,
            "todo" => true,
        ],
        [
            "task" => "CSS" ,
            "todo" => true,
        ],
        [
            "task" => "JS" ,
            "todo" => true,
        ],
        [
            "task" => "PHP" ,
            "todo" => false,
        ],
        [
            "task" => "LARAVEL" ,
            "todo" => false,
        ],
    ];

    if(isset($_POST['newTask'])) {
        $newTask = $_POST['newTask'];

       $listToDo[] = [
        'task' => $newTask,
        'todo' => false
        ];

    }

    header("Content-Type: application/json");
    echo json_encode($listToDo);

    