<?php
session_start();
if (!isset($_SESSION['AdminLoginId'])) {
    header("location: login.php");
    exit(); // Add this line to stop executing the remaining code
}

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

if (isset($_POST['logout'])) {
    session_destroy();
    header("location: login.php");
}

if (isset($_POST['Upload'])) {
    $fileName = $_FILES['image']['name'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $description = $_POST['description'];

    // Move the uploaded file to a desired directory
    $targetDir = 'image';
    $targetPath = $targetDir . $fileName;
    move_uploaded_file($fileTmpName, $targetPath);

    // Insert image data into the database
    $sql = "INSERT INTO images (image, description) VALUES ('$fileName', '$description')";
    if ($conn->query($sql) === TRUE) {
        echo "Image uploaded successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['UploadPublication'])) {
    $publicationName = $_POST['publicationName'];
    $publicationFile = $_FILES['publicationFile'];

    // Validate and handle the uploaded file 
    if ($publicationFile['error'] === 0) {
        $fileName = $publicationFile['name'];
        $fileTmpName = $publicationFile['tmp_name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        // Define the target directory and path
        $targetDir = 'publications/';
        $targetPath = $targetDir . $fileName;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($fileTmpName, $targetPath)) {
            // Insert publication data into the database
            $sql = "INSERT INTO publications (publicationname, filename) VALUES ('$publicationName', '$targetPath')";
            if ($conn->query($sql) === TRUE) {
                echo "Publication uploaded successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error uploading the publication file.";
        }
    } else {
        echo "Error uploading the publication file: " . $publicationFile['error'];
    }
}

if (isset($_POST['Upload-notice'])) {
    $notice_description = $_POST['notice_description'];
    $notice_time = $_POST['notice_time'];
    $notice_file_name = $_FILES['notice_file_name'];
    $notice_file_tmp = $_FILES['notice_file_name'];
    if ($notice_file_name['error'] === 0) {
        $fileName = $notice_file_name['name'];
        $fileTmpName = $notice_file_name['tmp_name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    
        // Define the target directory and path
        $targetDir = 'notices/';
        $targetPath = $targetDir . $fileName;
    
        // Move the uploaded file to the target directory
        if (move_uploaded_file($fileTmpName, $targetPath)) {
            // Insert notice data into the database
            $sql = "INSERT INTO notices (notice_description, notice_time, notice_file_name)
                    VALUES ('$notice_description', '$notice_time', '$targetPath')";
            
            if ($conn->query($sql) === TRUE) {
                echo "Notice uploaded successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error uploading the notice file.";
        }
    } else {
        echo "Error uploading the notice file: " . $notice_file_name['error'];
    }
    
    /*if ($notice_file_name['error'] ===0) {
        $fileName = $notice_file_name['name'];
        $fileTmpName = $notice_file_name['tmp_name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        // Define the target directory and path
        $targetDir = 'notices/';
        $targetPath = $targetDir . $fileName;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($fileTmpName, $targetPath)) {
            // Insert publication data into the database
           $sql= "INSERT INTO notices (notice_description, notice_time, notice_file_name,filename) s
            VALUES ('$notice_description', '$notice_time', '$notice_file_name','$targetPath')";
            //$sql = "INSERT INTO publications (publicationname, filename) VALUES ('$publicationName', '$targetPath')";
            if ($conn->query($sql) === TRUE) {
                echo "Publication uploaded successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error uploading the publication file.";
        }
    } else {
        echo "Error uploading the publication file: " . $notice_file_name['error'];
    }

   /* if ($notice_file_name) {
        // Process the file (optional)
    }

    $sql = "INSERT INTO notices (notice_description, notice_time, notice_file_name) 
            VALUES ('$notice_description', '$notice_time', '$notice_file_name')";

    if ($conn->query($sql) === TRUE) {
        echo "Notice uploaded successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }*/
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
   
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        
        .container {
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .header {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .logout-form {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .logout-button {
            background-color: #8c1515;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .logout-button:hover {
            background-color: #8c1515;
        }

        .division{
            display:flex;
            border:10px;
           justify-content:space-between;
           padding:20px;   
           width:75%;
           margin:20px;
          
        }

        .upload-section {
            width:40%;
            text-align: center;
            border-radius:10px;
            box-shadow:2px 2px 2px 2px black; 
          
        }

        .upload-form {
           justify-content:space-between;
            flex-direction: column;
            align-items: center;  
        }
        .upload-button {
            background-color: #8c1515;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            width:70%;
        }
        .row{
            width:100%;
            margin:20px auto;
        }
        .upload-button:hover {
            background-color: #8c1515;
        }
        .upload-input{
            margin:20px;
        }
        .description-input {
            width: 70%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin:20px;
        }
        .top {
      left:10px;
      width: 98%;
      display: flex;
      justify-content: space-between;
      height: 60px;
      padding: 10px;
      border-radius: 10px;
      box-shadow: 2px 2px 2px 2px black;
      z-index: 1; /* Add this to ensure the top section is displayed above other elements */
  }
    </style>
</head>

<body>
    <div class="container">
        <div class="top">
        <div><h1 class="header">Welcome to the admin panel of <?php echo $_SESSION['AdminLoginId'] ?></h1></div>
      <div>  <form class="logout-form" method="POST">
            <button class="logout-button" name="logout">Logout</button>
        </form>
        </div>
        </div>
    

        <div class="row">
        <div class="division">
        <div class="upload-section">
            <h1 class="header">Image Upload Section</h1>
            <form class="upload-form" action="" method="POST" enctype="multipart/form-data">
                <input class="upload-input" type="file" name="image" accept="image/*">
                <input class="description-input" type="text" name="description" placeholder="Image Description">
                <br>
                <input class="upload-button" type="submit" name="Upload">
            </form>
        </div>
        <div class="upload-section">
        <h1 class="header">Notices Upload Section</h1>
        <form class="upload-form"  method="post" enctype="multipart/form-data">
            <label for="notice_description">Notice Description:</label>
            <textarea id="notice_description" name="notice_description" rows="4" cols="50" required></textarea>
            
            <label for="notice_time">Notice Time:</label>
            <input type="datetime-local" id="notice_time" name="notice_time" required>
            <br>
            <label for="notice_file">Upload File:</label>
            <input type="file" id="notice_file" name="notice_file_name">
            <input class="upload-button" type="submit" value="Upload-notice" name="Upload-notice">
        </form>
    </div>
    </div>
    </div>
    <div class="row">
        <div class="division">
       <div class="upload-section">
    <h1 class="header">Publications Upload Section</h1>
    <form class="upload-form" action="" method="POST" enctype="multipart/form-data">
        <input class="description-input" type="text" name="publicationName" placeholder="Name of Publication">
        <input class="upload-input" type="file" name="publicationFile">
        <br>
        <input class="upload-button" type="submit" name="UploadPublication" value="Upload">
    </form>
    </div>
        <div class="upload-section">
            <h1 class="header">Traings & workshops Upload Section</h1>
            <form class="upload-form" action="" method="POST" enctype="multipart/form-data">
            <input class="description-input" type="input" name="Publication" placeholder="Name of Publication">
            
            <input class="upload-input" type="file" name="notice" placeholder="Enter new notice">
            <br>
            <input class="upload-button" type="submit" name="Upload">
            </form>
        </div>
    </div>

    </div>
    </div>

    <?php
    if (isset($_POST['logout'])) {
        session_destroy();
        header("location: login.php");
    }
    ?>
</body>

</html>
