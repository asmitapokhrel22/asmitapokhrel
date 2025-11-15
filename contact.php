<?php
header('Content-Type: application/json');

// Check if request is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

// Get form data
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

// Validation
$errors = [];

if (empty($name)) {
    $errors[] = 'Name is required';
}

if (empty($email)) {
    $errors[] = 'Email is required';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Invalid email format';
}

if (empty($subject)) {
    $errors[] = 'Subject is required';
}

if (empty($message)) {
    $errors[] = 'Message is required';
}

// If there are errors, return them
if (!empty($errors)) {
    echo json_encode(['success' => false, 'message' => implode(', ', $errors)]);
    exit;
}

// Sanitize inputs
$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$subject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

// Email configuration
$to = 'your-email@example.com'; // Change this to your email address
$email_subject = "Portfolio Contact: " . $subject;
$email_body = "You have received a new message from your portfolio contact form.\n\n";
$email_body .= "Name: $name\n";
$email_body .= "Email: $email\n";
$email_body .= "Subject: $subject\n\n";
$email_body .= "Message:\n$message\n";

$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Attempt to send email
if (mail($to, $email_subject, $email_body, $headers)) {
    // Optional: Save to database or file
    saveContactToFile($name, $email, $subject, $message);
    
    echo json_encode([
        'success' => true,
        'message' => 'Thank you for your message! I will get back to you soon.'
    ]);
} else {
    // Even if email fails, save the contact for later
    saveContactToFile($name, $email, $subject, $message);
    
    echo json_encode([
        'success' => true,
        'message' => 'Thank you for your message! I have received it and will get back to you soon.'
    ]);
}

// Function to save contact to file (as backup)
function saveContactToFile($name, $email, $subject, $message) {
    $data = [
        'date' => date('Y-m-d H:i:s'),
        'name' => $name,
        'email' => $email,
        'subject' => $subject,
        'message' => $message
    ];
    
    $filename = 'contacts_' . date('Y-m') . '.txt';
    $filepath = __DIR__ . '/contacts/' . $filename;
    
    // Create contacts directory if it doesn't exist
    $contactsDir = __DIR__ . '/contacts';
    if (!file_exists($contactsDir)) {
        mkdir($contactsDir, 0755, true);
    }
    
    // Append to file
    $logEntry = "Date: " . $data['date'] . "\n";
    $logEntry .= "Name: " . $data['name'] . "\n";
    $logEntry .= "Email: " . $data['email'] . "\n";
    $logEntry .= "Subject: " . $data['subject'] . "\n";
    $logEntry .= "Message: " . $data['message'] . "\n";
    $logEntry .= str_repeat("-", 50) . "\n\n";
    
    file_put_contents($filepath, $logEntry, FILE_APPEND);
}
?>

