<?php
// Database configuration
$host = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'women-cell';

// Establish a database connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the publication data from the database
$sql = "SELECT * FROM publications";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publications</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
         
            background-image: url('publications1.jpg');
            background-size: cover; 
  background-repeat: no-repeat;
  background-attachment: fixed;
        
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .publication {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            padding: 10px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);
        }

        .publication .pdf-icon {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }

        .publication a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Publications</h1>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $publicationName = $row['publicationname'];
                $publicationFile = $row['filename'];
        ?>
                <div class="publication">
                <a href="<?php echo $publicationFile; ?>" target="_blank"> <img class="pdf-icon" src="pdf.png" alt="PDF Icon"></a>
                   <?php echo $publicationName; ?>
                </div>
        <?php
            }
        } else {
            echo "No publications found.";
        }
        $conn->close();
        ?>
    </div>
</body>

</html>
