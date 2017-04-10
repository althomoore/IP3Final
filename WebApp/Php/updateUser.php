<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update</title>
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
    
    $id = $_POST['id'];
    $userName = $_POST['forename'];
    $userSurname = $_POST['surname'];
    $userEmail = $_POST['email'];
    $userUsername = $_POST['username'];
    $userPassword = $_POST['password'];
    
    
    $query = $conn->prepare("UPDATE user SET id= " . $id . ",
    forename= '" . $userName . "',
    surname= '" . $userSurname . "',
    email= '" . $userEmail . "',
    username= '" . $userUsername . "',
    password_hash= '" . $userPassword . "'
    WHERE id = " . $id);
    $query->execute();
    
    $conn = null; 
    header('Location: ./admin.php');
    ?>
    
</body>
</html>