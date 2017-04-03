<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Activate Document</title>
</head>
<body>
    
    <?php
    
    define("DB_USER", "root");
    define("DB_PASS", "");
    $servername = "localhost";
    $dbname = "mydb";
    
    try {
        $conn=new PDO("mysql:host=$servername;dbname=$dbname",DB_USER,DB_PASS);
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo DB_USER . " is connected to " . $dbname;
    } catch(PDOException $e) {
        echo "Connection Failed: <br> " . $e -> getMessage();
    }
    
    $docId = (int)$_GET['documentId'];
    echo "Document Id: " . $docId . "<br>";
    
    $query = $conn->prepare("UPDATE document SET status = 'active' WHERE id = " . $docId);
    $query->execute();
    $conn = null;
    header('Location: ../mainPage.php')
    
    ?>
    
</body>
</html>