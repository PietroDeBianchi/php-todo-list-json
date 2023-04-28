<?php
// Check if the file database.json exists
if (file_exists('database.json')) {
    // Read the contents of 'database.json' file and store it in a variable
    $arrayString = file_get_contents('database.json');
    // Decode the JSON data and store it in an associative array
    $listToDo = json_decode($arrayString, true);
} else {
    $listToDo = [];
}

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

} elseif (isset($_POST['remove'])) { // Check if a POST request parameter 'remove' is set
    // Get the index of the task to be removed from the POST data
    $index = $_POST['remove'];

    // Remove the task from the $listToDo array based on the index
    if (isset($listToDo[$index])) {
        array_splice($listToDo, $index, 1);

        // Encode the updated $listToDo array back to JSON format
        $dataString = json_encode($listToDo);
        // Write the updated data back to 'database.json' file
        file_put_contents('database.json', $dataString);
    }
} elseif (isset($_POST['toggle'])) { // Check if a POST request parameter 'toggle' is set
    // Get the index of the task to be toggled from the POST data
    $index = $_POST['toggle'];

    // Toggle the done status of the task in the $listToDo array based on the index
    if (isset($listToDo[$index])) {
        $listToDo[$index]['done'] = !$listToDo[$index]['done'];

        // Encode the updated $listToDo array back to JSON format
        $dataString = json_encode($listToDo);
        // Write the updated data back to 'database.json' file
        file_put_contents('database.json', $dataString);
    }
}

// Set the response header to indicate JSON format
header("Content-Type: application/json");
// Encode the $listToDo array back to JSON format and send as response
echo json_encode($listToDo);
exit(); // Exit the script after sending response
?>

