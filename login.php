<?php 
require("connection.php");
?>
<html>
<head>
  <title>Login Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }
    
    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #d5ecf0;
      border-radius: 5px;
      box-shadow: 15px 15px 10px  rgba(10, 10, 10, 0.1);
    }
    
    h2 {
      text-align: center;
    }
    
    label {
      display: block;
      margin-bottom: 5px;
    }
    
    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    
    .captcha {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
    }
    
    .captcha img {
      margin-right: 10px;
      width: 150px;
      height: 100px;;
    }
    
    .error {
      color: red;
    }
    
    .button-container {
      display: flex;
      justify-content: space-between;
      margin-top: 10px;
    }
    
    button {
      padding: 8px 15px;
      border-radius: 4px;
      border: none;
      background-color: #2580f7;
      color: #ffffff;
      cursor: pointer;
    }
    
    button[type="reset"] {
      background-color: #f44336;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Login</h2>
    <form id="loginForm" method="POST">
      <label for="userId">User ID:</label>
      <input type="text" id="userId" name="Admin_Name" required>
      <label for="password">Password:</label>
      <input type="password" id="password" name="Password" required>
      
      <div class="button-container">
        <button type="submit" name="login">Login</button>
        <button type="reset">Reset</button>
      </div>
    </form>
    
        
  </div>

<?php
 if(isset($_POST['login'])){
  $adminName = $_POST['Admin_Name'];
  $password = $_POST['Password'];
  
  $query = "SELECT * FROM `admin_details` WHERE `Admin_Name`='$adminName' AND `Password`='$password'";
  $connection = mysqli_connect("localhost","root","","women-cell");
  $result = mysqli_query($connection, $query);
  
  if(mysqli_num_rows($result) == 1){
    session_start();
    $_SESSION['AdminLoginId']=$_POST['Admin_Name'];
    header("location:check.php");
  }
  else{
    echo "<script>alert('Incorrect username or password');</script>";
  }
}
?>
</body>

</html>
