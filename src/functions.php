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
    writeToFile($filename, readFromFile($filename) );
}
function updateTask(string $filename, int $index, array $updatedTask): void {
    $tasks = readFromFile($filename);
    $tasks[$index] = $updatedTask;
    writeToFile($filename, $tasks);
    redirect('task-index.php');
}
function deleteTask($user, $taskNum):void {
    $tasks = readFromFile('data/' . $user . '-tasks.json'); 
    unset($tasks[$taskNum]); 
    writeToFile("data/{$user}-tasks.json", $tasks);
    redirect('task-index.php');
}