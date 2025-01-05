<?php
// Set the Response Header
header('Content-type: text/plain');

$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

if ($text == "") {
    // Display main menu
    $response  = "CON Welcome to My Church USSD service:\n";
    $response .= "1. Bible Study\n";
    $response .= "2. Counselling\n";
    $response .= "3. Youth Sessions\n";
    $response .= "4. Marriage Sessions\n";
    $response .= "5. Evangelism\n";
} else {
    $explodedText = explode("*", $text);
    if (count($explodedText) == 1) {
        $selectedOption = $explodedText[0];
        $response  = "CON Please enter your name:\n";
    } else if (count($explodedText) == 2) {
        $selectedOption = $explodedText[0];
        $name = $explodedText[1];

        // Determine selected service
        if ($selectedOption == "1") {
            $service = "Bible Study";
        } else if ($selectedOption == "2") {
            $service = "Counselling";
        } else if ($selectedOption == "3") {
            $service = "Youth Sessions";
        } else if ($selectedOption == "4") {
            $service = "Marriage Sessions";
        } else if ($selectedOption == "5") {
            $service = "Evangelism";
        } else {
            $response = "END Invalid selection.";
        }

        if (isset($service)) {
            $response = "END Thank you $name, you have selected $service.";
        }
    }
}

// Echo the response
header('Content-type: text/plain');
echo $response;
?>
