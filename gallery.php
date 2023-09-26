<!DOCTYPE html>
<html>
<head>
<link relation="stylesheet" src="minor.css">
    <title>Display Database Contents</title>
    <style>
            .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            display: flex;
            flex-direction: column;
            align-items: center;
            width:40%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 10px;
        }
            .card-row {
            display: flex;
            justify-content: space-between;
        }

        .card img {
            max-width: 90%;
            margin-bottom: 10px;
        }

        .card p {
            text-align: center;
            margin: 0;
        }
        h1{
            background-color:#8c1515;
            padding:30px;
            color:white;
            font-size:30px;
        }
    </style>
    </style>
</head>
<body>
<h1 style="text-align:center">Welcome to gallery</h1>
<p><a href="https://photos.google.com/share/AF1QipOlyixf2_K_fvbb7scWuL4ycivrZwdf_1YCe3Dc3llpDGUmptagDS0O8QT0Hrfg1w?key=STVuT0xPWVQwMXRjaXlfV05BaHBnRjktZlNVMGV3">Click here for more pictures</a></p>
    <div>
        <?php
        // Establish a connection to the database
        $host = 'localhost';
        $db = 'women-cell';
        $user = 'root';
        $password = '';

        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

        try {
            $pdo = new PDO($dsn, $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }

        // Retrieve data from the database
        $query = 'SELECT * FROM images';
        $stmt = $pdo->query($query);
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Display data on the website
        

        $numCards = count($resultSet);
        $counter = 0;
        
        foreach ($resultSet as $row) {

            if (!empty($row['image'])) {
                
                if ($counter % 2 === 0) {
                    echo '<div class="card-row">';
                }
                echo '<div class="card">';
                echo '<img src="' . $row['image'] . '" alt="Image">';
                echo '<p>' . $row['description'] . '</p>';
                echo '</div>';

                if ($counter % 2 !== 0 || $counter === $numCards - 1) {
                    echo '</div>';
                }

                $counter++;
            }
        }

        ?>
    </div>
</body>
</html>
