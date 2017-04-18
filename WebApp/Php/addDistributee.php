<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../SCSS/stylesheet.css">
</head>

<body>
<a href="../mainPage.php"><button class="btn medium error">Return</button></a>
</body>

<table id="mainTable">
    <thead>
    <th>User Id</th>
    <th>Username</th>
    <th>Add</th>
    </thead>
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

    $_SESSION['distDocId'] = (int)$_GET['documentId'];
    $_SESSION['notify-documentId'] = $_SESSION['distDocId'];

    $query= "SELECT * FROM user WHERE isActive='1' AND id != {$_SESSION['userId']}";
    foreach ($conn->query($query) as $row) {

        echo "
                <tr id=" . "tableRow" . $row['id'] . " >
                    <td> " . $row['id'] . " </td>
                    <td> " . $row['username'] . " </td>
                    <td> <button class='btn small primary'><a style='color: #fff;' href=\"distributeeBeingAdded.php?userId=" . $row['id'] . "\">Add <i class='fa faButton fa-plus-circle'></i></a></button> </td>
                </tr>
            ";
    }
    ?>
</table>

</html>
