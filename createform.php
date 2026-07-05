<?php
// Self-processing form for collecting user input.
$fullName = $email = $topic = $message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = validateInput($_POST['full_name'] ?? '');
    $email = validateEmail($_POST['email'] ?? '');
    $topic = validateInput($_POST['topic'] ?? '');
    //check wordcount of message
    $message = validateInput($_POST['message'] ?? '');
    $wordCount = str_word_count($_POST['message'] ?? '');
    // Validate message length
    if ($wordCount < 50 || $wordCount > 150) {
        echo "Error: Message must be between 50 and 150 words. Current word count: $wordCount.";
        $message = '';
    } else {
    //validate message like the rest
    
    }
}

function validateInput($input) {
    if (empty($input)) {
        echo "Error: All fields are required.";
        return '';
    }
    return htmlspecialchars(stripslashes(trim($input)));
}

function validateEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Error: Invalid email format.";
        return '';
    }
    return $email;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
</head>
<body>
    <h1>Contact Us</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="full_name">Full Name:</label><br>
        <input type="text" id="full_name" name="full_name" value="<?php echo htmlspecialchars($fullName); ?>" required><br><br>

        <label for="email">Email Address:</label><br>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required><br><br>

        <label for="topic">Topic of Message:</label><br>
        <input type="text" id="topic" name="topic" value="<?php echo htmlspecialchars($topic); ?>" required><br><br>

        <label for="message">Message (50-150 words):</label><br>
        <textarea id="message" name="message" rows="8" cols="60" required><?php echo htmlspecialchars($message); ?></textarea><br><br>

        <button type="submit">Send Message</button>
    </form>
</body>
</html>
