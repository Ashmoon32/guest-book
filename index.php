<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Book</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h2>Guest Book</h2>

    <form action="index.php" method="POST" id="guestForm">

    <input type="text" name="name" placeholder="Your Name" required>
    <textarea name="message" placeholder="Your Message" required></textarea>
    <button type="submit">Submit</button>

    </form>
    
    <h3>Message:</h3>
    <div id="messages">
        <?php
            if ( file_exists("messages.txt")) {
                $lines = file("messages.txt");
                foreach ($lines as $line){
                    echo "<p>" .htmlspecialchars($line) . "</p>";
                }
            }
            ?>
    </div>

    <script src="script.js"></script>
</body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST["name"]);
        $messsage = htmlspecialchars($_POST["message"]);
        $entry = "$name: $message\n";
        file_put_contents("messages.txt", $entry, FILE_APPEND);
        header("Location: index.php");
        exit();
    }
?>