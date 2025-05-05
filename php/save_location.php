<?php
// save_location.php

// Get the posted data
$data = json_decode(file_get_contents("php://input"));

// Define the file path
$filePath = 'locations.csv';

// Check if the CSV file exists, if not, create it and add headers
if (!file_exists($filePath)) {
    $file = fopen($filePath, 'w');
    fputcsv($file, ['Latitude', 'Longitude', 'Timestamp']);
    fclose($file);
}

// Open the file in append mode
$file = fopen($filePath, 'a');

// Write the latitude and longitude to the file
fputcsv($file, [$data->latitude, $data->longitude, date('Y-m-d H:i:s')]);

// Close the file
fclose($file);

// Return a success response
echo json_encode(["message" => "Location saved successfully"]);
?>
