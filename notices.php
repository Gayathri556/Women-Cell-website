

<!DOCTYPE html>
<html>
<head>
    <title>Uploaded Notices</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 20px;
    top:0px;
    left:0px;
    right:0px;
  
        
            background-size: cover; 
  background-repeat: no-repeat;
  background-attachment: fixed;
        
}

h1 {
    text-align: center;
    padding:40px;
    background:#8c1515;
    color:white;
}

.notices-container {
    max-width: 600px;
    margin: 0 auto;
}

.notice {
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 10px;
}

.notice p {
    margin: 5px 0;
}

.notice strong {
    font-weight: bold;
}

.notice a {
    color: #007bff;
    text-decoration: none;
}

.notice a:hover {
    text-decoration: underline;
}
</style>
<body>
    <h1>Uploaded Notices</h1>
    <form action="" method="GET">
        <label for="search">Search Notices:</label>
        <input type="text" id="search" name="search" placeholder="Enter your search query">
        <input type="submit" value="Search">
    </form>
    <div class="notices-container">
        
        <?php
$host = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'women-cell';

// Connect to your MySQL database (same credentials as in upload.php)
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the search form has been submitted
if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];

    // Retrieve notices from the database that match the search query
    $sql = "SELECT * FROM notices WHERE notice_description LIKE '%$searchQuery%' OR notice_time LIKE '%$searchQuery%' OR notice_file_name LIKE '%$searchQuery%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class='notices-container'>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class='notice'>";
            echo "<p><strong>Notice Description:</strong> " . htmlspecialchars($row["notice_description"]) . "</p>";
            echo "<p><strong>Notice Time:</strong> " . htmlspecialchars($row["notice_time"]) . "</p>";
            if (!empty($row["notice_file_name"])) {
                echo "<p><strong>File Name:</strong> <a href='" . htmlspecialchars($row["notice_file_name"]) . "' target='_blank'>" . htmlspecialchars($row["notice_file_name"]) . "</a></p>";
            }
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<p>No matching notices found.</p>";
    }
} else {
    // If the search form is not submitted, display all notices as before
    $sql = "SELECT * FROM notices";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class='notices-container'>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class='notice'>";
            echo "<p><strong>Notice Description:</strong> " . htmlspecialchars($row["notice_description"]) . "</p>";
            echo "<p><strong>Notice Time:</strong> " . htmlspecialchars($row["notice_time"]) . "</p>";
            if (!empty($row["notice_file_name"])) {
                echo "<p><strong>File Name:</strong> <a href='" . htmlspecialchars($row["notice_file_name"]) . "' target='_blank'>" . htmlspecialchars($row["notice_file_name"]) . "</a></p>";
            }
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<p>No notices found.</p>";
    }
}

$conn->close();
?>

    </div>
</body>
</html>
