<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Delete User</title>
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
    
    $id = (int)$_GET['id'];
    
    $query = $conn->prepare("DELETE FROM user WHERE id = " . $id);
    $query->execute();
    $conn = null;
    header('Location: ./admin.php');
    
    ?>

</body>

</html>
