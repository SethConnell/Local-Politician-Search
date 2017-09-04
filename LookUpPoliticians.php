<?php
require_once 'vendor/autoload.php';


function search($address) {
    $client = new Google_Client();
    $client->setApplicationName("Client_Library_Examples");
    $client->setDeveloperKey("xxxxxxxxxxxxxxxx"); // Replace Xs with API Key Generated for Google Civics API.
    
    $civicinfoService = new Google_Service_CivicInfo($client);
    $representatives = $civicinfoService->representatives->representativeInfoByAddress(
        array("address" => "$address"),
        array("includeOffices" => true),
        array("roles" => "legislatorLowerBody")
    );
        
    foreach ($representatives as $item) {
        echo "\n", $item["name"];
        foreach ($item["address"] as $line) {
            if ($line['line1'] != ""){
                echo "\n", $line['line1'];
            }
            if ($line['line2'] != '') {
                echo "\n", $line['line2'];
            }
            if ($line['city'] != '') {
                echo "\n", $line['city'];
            }
            if ($line['state'] != '') {
                echo "\n", $line['state'];
            }
            if ($line['zip'] != '') {
                echo "\n", $line['zip'];
            }
            echo "\n";
            echo "\n";
        }
    }
}

search("103 Blue Ridge Court, Fairfield Bay, Arkansas"); // Example of usage
?>
