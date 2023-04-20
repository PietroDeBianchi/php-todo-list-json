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

    header("Content-Type: application/json");
    echo json_encode($listToDo);