<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="sw">
<head>
  <meta charset="UTF-8">
  <title>Water Reports</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f2f2f2;
      padding: 40px;
    }

    .container {
      max-width: 800px;
      margin: auto;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      color: #2a4d69;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 12px;
      border-bottom: 1px solid #ccc;
      text-align: left;
    }

    th {
      background-color: #2a4d69;
      color: white;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Submitted Reports</h2>
    <table>
      <tr>
        <th>Name</th>
        <th>Room</th>
        <th>Issue</th>
        <th>Description</th>
        <th>Time</th>
      </tr>
<?php
include 'config.php';

$sql = "SELECT * FROM reports ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
    echo "<h2>Water Issue Reports</h2>";
    echo "<table border='1'>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Room</th>
              <th>Issue</th>
              <th>Description</th>
              <th>Date</th>
            </tr>";

    while ($row = $result->fetch_assoc()) 
    {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['room']}</td>
                <td>{$row['issue_type']}</td>
                <td>{$row['description']}</td>
                <td>{$row['created_at']}</td>
              </tr>";
    }

    echo "</table>";
} 
else 
    echo "No reports found.";
$conn->close();
?>


    </table>
  </div>
</body>
</html>
