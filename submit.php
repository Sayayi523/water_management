
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    require 'config.php';
    $name = htmlspecialchars($_POST['name']);
    $room = htmlspecialchars($_POST['room']);
    $issue_type = htmlspecialchars($_POST['issue']);
    $description = htmlspecialchars($_POST['description']);

    $stmt = $conn->prepare("INSERT INTO reports (name, room, issue_type, description, created_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssss", $name, $room, $issue_type, $description);

    if ($stmt->execute()) 
    {
        echo "<h2>Report sent successfully!</h2>";
        echo "<p><a href='index.html'>Go to home page</a></p>";
    } 
    else 
    {
        echo "Mistake occured: " . $conn->error;
    }

    $stmt->close();
}
?>
