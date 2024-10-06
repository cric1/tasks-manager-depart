<?php

function redirect($url) { 
    header("location: " . $url);
    exit();
}


function readFromFile(string $filename) : array {
    if(file_exists($filename)) {
        $file = file_get_contents($filename);
        $decodedFile = json_decode($file, true);
        return $decodedFile;
    }
    return [];
}

function writeToFile(string $filename, array $data): void {
    
}

function addTask(string $filename, array $newTask): void {
    
}

function updateTask(string $filename, int $index, array $updatedTask): void {
    
}

function deleteTask(string $filename, int $index): void {
    
}

function renderOptions(string $file, string $itemSelected = "") : string {
   
}
