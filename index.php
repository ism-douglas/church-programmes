<?php
// Set the response header to text/plain, indicating that the content being returned is plain text.
header('Content-type: text/plain');

// Capture data sent via POST method, including the session ID, service code, phone number, and the text input from the user.
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

// Check if the text variable is empty (i.e., initial request).
if ($text == "") {
    // Displays the main menu with options for the user to select from.
    $response  = "CON Welcome to My Church USSD service:\n";
    $response .= "1. Bible Study\n";
    $response .= "2. Counselling\n";
    $response .= "3. Youth Sessions\n";
    $response .= "4. Marriage Sessions\n";
    $response .= "5. Career Coaching \n";

} else {
    // Splits the text input based on the * character, creating an array ($explodedText).
    $explodedText = explode("*", $text);
    if (count($explodedText) == 1) {
        // If the array has one element, it prompts the user to enter their name.
        $selectedOption = $explodedText[0];
        $response  = "CON Please enter your name:\n";
    } else if (count($explodedText) == 2) {
        // If the array has two elements, it proceeds to determine the selected option and the name entered.
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
            $service = "Career Coaching";
        } else {
            // If the service selection is invalid, it ends the session with an "Invalid selection" message.
            $response = "END Invalid selection.";
        }

        //If name and service are set
        if (isset($name,$service)) {
            // Constructs the final response, thanking the user and confirming their selection.
            $response = "END Dear $name, you have registered for $service.";       
        
        }
    }
}

// Sets the response header again (to ensure proper content type) and outputs the response.
header('Content-type: text/plain');
// Echo the response
echo $response;


?>
