<?php

// Read the contents of 'database.json' file and store it in a variable
$arrayString = file_get_contents('database.json');
// Decode the JSON data and store it in an associative array
$listToDo = json_decode($arrayString, true);

// Check if a POST request parameter 'tasking' is set
if (isset($_POST['tasking'])) {
    // Append a new element to the $listToDo array
    $listToDo[] = [
        'task' => $_POST['tasking']['task'],
        'done' => $_POST['tasking']['done'] === "false" ? false : true
    ];

    // Encode the updated $listToDo array back to JSON format
    $dataString = json_encode($listToDo);
    // Write the updated data back to 'database.json' file
    file_put_contents('database.json', $dataString);
};

// Set the response header to indicate JSON format
header("Content-Type: application/json");
// Encode the $listToDo array back to JSON format and send as response
echo json_encode($listToDo);
?>
