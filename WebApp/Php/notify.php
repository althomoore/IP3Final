<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Notification</title>
</head>
<body>
    
    <?php
    
        define("DB_USER", "root");
        define("DB_PASS", "");
        $servername = "localhost";
        $dbname = "mydb";
    
    session_start();
    
        try {
            $conn=new PDO("mysql:host=$servername;dbname=$dbname",DB_USER, DB_PASS);
            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo DB_USER . " is connected to " . $dbname;
        } catch(PDOException $e) {
            echo "Connection Failed: " . $e -> getMessage();
        }
    
        echo "<br> " . $_SESSION['notify-userId'];
        echo "<br> " . $_SESSION['notify-documentId'];
    
        $message = "You have been added as a distributee to the document with id: " . $_SESSION['notify-documentId'];
        echo $message . "<br>";
        
        $query=$conn->prepare("INSERT INTO notification VALUES('','{$_SESSION['notify-userId']}','$message')"); 
        echo "Executing query...";
        $query->execute();
        echo "Query completed, data entered to database";
        $conn = null;
        header("Location: ../mainPage.php");
    
    ?>
    
</body>
</html>