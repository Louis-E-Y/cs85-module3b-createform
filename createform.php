<?php
// Self-processing form for collecting user input.
$fullName = $email = $topic = $message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = trim($_POST['full_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $topic = trim($_POST['topic'] ?? '');
    $message = trim($_POST['message'] ?? '');
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
