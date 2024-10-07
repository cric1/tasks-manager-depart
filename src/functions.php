<?php
function redirect($url) {
    header("location: " . $url);
    exit();
}

function readFromFile(string $filename): array {
        $file = file_get_contents($filename);
        return json_decode($file, true);
}
function writeToFile(string $filename, array $data): void {
file_put_contents($filename, json_encode($data, JSON_PRETTY_PRINT));
}
function addTask(string $user, array $newTask): void {
    $filename = 'data/' . $user . '-tasks.json';
    $tasks = readFromFile($filename);
    $tasks[] = $newTask;
    writeToFile($filename, $tasks);
}
function updateTask(string $filename, int $index, array $updatedTask): void {
    
}
function deleteTask($user, $taskNum):void {
    $tasks = readFromFile('data/' . $user . '-tasks.json'); 
    unset($tasks[$taskNum]); 
    writeToFile("data/{$user}-tasks.json", $tasks);
    redirect('task-index.php');
}


//jsp ca sert a quoi ca
// function renderOptions(string $file, string $itemSelected = "") : string {
   
// }
