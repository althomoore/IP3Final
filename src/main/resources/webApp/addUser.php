<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add User</title>
</head>

<body>

    <?php
    
    define("DB_USER", "root");
        define("DB_PASS", "");
        $servername = "localhost";
        $dbname = "ip3";
    
        try {
            $conn=new PDO("mysql:host=$servername;dbname=$dbname",DB_USER, DB_PASS);
            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo DB_USER . " is connected to " . $dbname;
        } catch(PDOException $e) {
            echo "Connection Failed: " . $e -> getMessage();
        }
    
    $userName = $_POST['firstName'];
    $userSurname = $_POST['lastName'];
    $userEmail = $_POST['email'];
    $userUserName = $_POST['username'];
    $userPassword = $_POST['password'];
    $userRole = $_POST['roleId'];
    
    $query=$conn->prepare("INSERT INTO Users VALUES('','$userName','$userSurname','$userEmail','$userUserName','$userPassword','$userRole')");
    $query->execute();
    $conn = null;
    header('Location: ./admin.php');
    
    ?>

</body>

</html>
