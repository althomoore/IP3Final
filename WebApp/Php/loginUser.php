<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../SCSS/stylesheet.css">
</head>

<body>

    <?php
    
    define("DB_USER", "root");
    define("DB_PASS", "");
    $servername = "localhost";
    $dbname = "mydb";

    session_start();
    
    try
    {
        $conn=new PDO("mysql:host=$servername;dbname=$dbname",DB_USER, DB_PASS);
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo DB_USER . " is connected to " . $dbname;
    }
    catch(PDOException $e)
        {
            echo "Connection Failed: <br><br>" . $e -> getMessage();
        }
    
    $userUsername = $_POST['username'];
    $_SESSION["username"] = $userUsername;
    $userPassword = $_POST['password_hash'];
    $_SESSION["password"] = $userPassword;
    
    $getUsername=("SELECT forename FROM user WHERE username='$userUsername'");
            foreach ($conn->query($getUsername) as $row) {
                $_SESSION['forename'] = $row['forename'];
                echo "Name: " . $row['forename'];
            }
    
    $query=("SELECT * FROM user WHERE '$userUsername' = username AND '$userPassword' = password_hash");
    
    foreach ($conn->query($query) as $row) {
        if($userUsername = 'username' and $userPassword = 'password_hash' and $row['isAdmin'] == '1')
        {        
            $role = "admin";
            $_SESSION['role'] = $role;
            $_SESSION['userId'] = $row['id'];
            header('Location: ../mainPage.php');
        }
        else if($userUsername = 'username' and $userPassword = 'password_hash' and $row['isAdmin'] == '0')
        {
            $role = 'user';
            $_SESSION['role'] = $role;
            $_SESSION['userId'] = $row['id'];
            header('Location: ../mainPage.php');
        } else {
            echo "Failed, try again";
        }
    }
    echo "<br> There was an error with your username/password. Please try again: <br>";
    echo "<a href='../index.php'><button class='btn medium error'>Try Again</button></a>";
    $conn = null;    
    ?>

</body>

</html>
