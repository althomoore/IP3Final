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
    $Author_id = $_POST['Author_id'];
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $fileURL = $_POST['fileURL'];
    $status = $_POST['status'];
    $initialDate = $_POST['initialDate'];
    $activationDate = $_POST['activationDate'];
    
    
    $query = $conn->prepare("UPDATE document SET id= " . $id . ",
    Author_id= '" . $Author_id . "',
    name= '" . $name . "',
    comment= '" . $comment . "',
    fileURL= '" . $fileURL . "',
    status= '" . $status . "',
    initialDate= '" . $initialDate . "',
    activationDate= '" . $activationDate . "'
    WHERE id = " . $id);
    $query->execute();
    
    $conn = null; 
    header('Location: ../mainPage.php');
    ?>
    
</body>
</html>