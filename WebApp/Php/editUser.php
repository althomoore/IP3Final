<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit User</title>

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
    
    $Author_id = (int)$_GET['Author_id'];
    $query = ("SELECT * FROM user WHERE id = $Author_id");
    
    foreach ($conn->query($query) as $row) {
            echo
            "
                <form action='updateUser.php' method='post'>
                    <label>
                        <input readonly type='text' name='id' value=" . $row['id'] . ">
                        <div class='label-text'>Id</div>
                    </label>
                
                    <label>
                        <input type='text' name='forename' value=" . $row['forename'] . ">
                        <div class='label-text'>forename</div>
                    </label>
        
                    <label>
                        <input type='text' name='surname' value=" . $row['surname'] . ">
                        <div class='label-text'>surname</div>
                    </label>
                    
                    <label>
                        <input type='text' name='email' value=" . $row['email'] . ">
                        <div class='label-text'>email</div>
                    </label>      
                    
                    <label>
                        <input type='text' name='username' value=" . $row['username'] . ">
                        <div class='label-text'>username</div>
                    </label>
        
                    <label>
                        <input type='text' name='password' value=" . $row['password_hash'] . ">
                        <div class='label-text'>password</div>
                    </label>
        
        <input class='btn medium primary' type='submit'>
    </form>
            ";   
    }
    $conn = null;    
    ?>
</body>

</html>
