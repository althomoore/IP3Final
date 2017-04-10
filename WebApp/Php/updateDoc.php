<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Document</title>

    <link rel="stylesheet" href="../SCSS/stylesheet.css">
    <link rel="stylesheet" href="../SCSS/partials/testing.css">
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
            //echo DB_USER . " is connected to " . $dbname;
        } catch(PDOException $e) {
            echo "Connection Failed: " . $e -> getMessage();
        }
    
    $documentId = (int)$_GET['documentId'];
    $query = ("SELECT * FROM document WHERE id = $documentId");
    
    foreach ($conn->query($query) as $row) {
            echo
            "
                <form action='changeDoc.php' method='post'>
                    <label>
                        <input readonly class='input-readonly' type='text' name='id' value=" . $row['id'] . ">
                        <div class='label-text'>Id</div>
                    </label>
                
                    <label>
                        <input type='text' name='Author_id' value=" . $row['Author_id'] . ">
                        <div class='label-text'>Author_id</div>
                    </label>
        
                    <label>
                        <input type='text' name='name' value=" . $row['name'] . ">
                        <div class='label-text'>name</div>
                    </label>
                    
                    <label>
                        <input type='text' readonly class='input-readonly' name='comment' value=" . $row['comment'] . ">
                        <div class='label-text'>comment</div>
                    </label>      
                    
                    <label>
                        <input type='text' readonly class='input-readonly' name='fileURL' value=" . $row['fileURL'] . ">
                        <div class='label-text'>fileURL</div>
                    </label>
        
                    <label>
                        <input type='text' readonly class='input-readonly' name='status' value=" . $row['status'] . ">
                        <div class='label-text'>status</div>
                    </label>
                    
                    <label>
                        <input type='text' readonly class='input-readonly' name='initialDate' value=" . $row['initialDate'] . ">
                        <div class='label-text'>initialDate</div>
                    </label>
                    
                    <label>
                        <input type='text' name='activationDate' value=" . $row['activationDate'] . ">
                        <div class='label-text'>activationDate</div>
                    </label>
        
        <input class='btn medium primary' type='submit'>
    </form>
            ";   
    }
    $conn = null;    
    ?>
</body>

</html>
