<?php

$directory = 'Chemistry';

$files = scandir($directory);
$files = array_diff($files, array('.', '..', '.DS_Store'));

foreach ($files as $file) {
    // Match files like download.png or download-1.png
    if (preg_match('/^download(?:-(\d+))?\.png$/', $file, $matches)) {
        $number = isset($matches[1]) ? (int)$matches[1] : 0; // If no number, it's download.png → 0
        $newName = $number . '.png';
        $oldPath = $directory . '/' . $file;
        $newPath = $directory . '/' . $newName;

        // Rename the file
        if (rename($oldPath, $newPath)) {
            echo "Renamed $file → $newName\n";
        } else {
            echo "Failed to rename $file\n";
        }
    }
}
