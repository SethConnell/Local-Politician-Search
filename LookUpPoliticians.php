<?php
require_once 'vendor/autoload.php';


function search($address) {
    $client = new Google_Client();
    $client->setApplicationName("Client_Library_Examples");
    $client->setDeveloperKey("xxxxxxxxxxxxxxxxxxxxx"); // Replace Xs with API Key Generated for Google Civics API.
    
    $civicinfoService = new Google_Service_CivicInfo($client);
    $representatives = $civicinfoService->representatives->representativeInfoByAddress(
        array("address" => "$address"),
        array("includeOffices" => false));
        
    foreach ($representatives as $item) {
        echo "\n", $item['name'];
    }
}

?>