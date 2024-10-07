<?php



function redirect($url) {
    header("location: " . $url);
    exit();
}

function readFromFile(string $filename): array {
    if (file_exists($filename)) {
        $file = file_get_contents($filename);
        return json_decode($file, true) ?? [];
    }
    echo "Le fichier n'existe pas: " . $filename; 
    return [];
}

function writeToFile(string $filename, array $data): void {
    if (file_exists($filename)) {
        file_put_contents($filename, json_encode($data, JSON_PRETTY_PRINT));
    } else {
        echo "Le fichier n'existe pas: " . $filename; 
    }
}

function addTask(string $user, array $newTask): void {
    $filename = 'data/' . $user . '-tasks.json';
    $tasks = readFromFile($filename);
    
    if (empty($tasks)) {
        echo "Impossible d'ajouter une tâche. Le fichier " . $filename . " est introuvable.";
        return;
    }
    
    $tasks[] = $newTask;
    writeToFile($filename, $tasks);
}

function updateTask(string $filename, int $index, array $updatedTask): void {
    
}

function deleteTask($user, $taskId) {
    $tasks = readFromFile('data/' . $user . '-tasks.json'); 
    unset($tasks[$taskId]); 
    return writeToFile("data/{$user}-tasks.json", $tasks);
}

function renderOptions(string $file, string $itemSelected = "") : string {
   
}
