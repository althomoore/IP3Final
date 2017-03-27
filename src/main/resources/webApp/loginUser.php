<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>

    <?php
    
    define("DB_USER", "root");
        define("DB_PASS", "");
        $servername = "localhost";
        $dbname = "mydb";
    
        try {
            $conn=new PDO("mysql:host=$servername;dbname=$dbname",DB_USER, DB_PASS);
            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo DB_USER . " is connected to " . $dbname;
        } catch(PDOException $e) {
            echo "Connection Failed: " . $e -> getMessage();
        }
    
    
    $userUsername = $_POST['username'];
    $userPassword = $_POST['password_hash'];
    
    $query=("SELECT * FROM user WHERE '$userUsername' = username AND '$userPassword' = password_hash");
    
    foreach ($conn->query($query) as $row) {
        if($userUsername = 'username' and $userPassword = 'password_hash') 
        {
            header('Location: ./admin.php');
        }else 
        {
            header('Location: ./index.php');
        }
    }
    
    $conn = null;
    //header('Location: ./index.php');
    
    ?>

</body>

</html>
