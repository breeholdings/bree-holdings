<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $inquiry_type = htmlspecialchars($_POST['inquiry_type']);
  $subject = htmlspecialchars($_POST['subject']);
  $message = htmlspecialchars($_POST['message']);

  $to = "info@breeholdings.com";
  $headers = "From: $email\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "Content-Type: text/plain; charset=UTF-8";

  $full_message = "Name: $name\nEmail: $email\nInquiry Type: $inquiry_type\nSubject: $subject\n\nMessage:\n$message";

  if (mail($to, "New Contact Inquiry from Bree Holdings", $full_message, $headers)) {
    header("Location: thank-you.html");
    exit();
  } else {
    echo "Message failed. Please try again.";
  }
} else {
  http_response_code(403);
  echo "There was a problem with your submission.";
}
?>
