<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];    
    if (empty($name) || empty($email) || empty($message)) {
        echo "All fields are required. Please fill out the form completely.";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format. Please enter a valid email address.";
        } else {
            $to = "your_email@example.com";
            $subject = "Contact Form Submission";
            $headers = "From: $email";
            $email_message = "Name: $name\n";
            $email_message .= "Email: $email\n";
            $email_message .= "Message:\n$message\n";            
            $mailResult = mail($to, $subject, $email_message, $headers);            
            if ($mailResult) {
                echo "Thank you for contacting us. Your message has been sent successfully.";
            } else {
                echo "Oops! Something went wrong, and we couldn't send your message.";
            }
        }
    }
}
?>
