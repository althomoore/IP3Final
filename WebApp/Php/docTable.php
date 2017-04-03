<?php 
    echo "<h4 style='padding-left: 20px;'> Welcome back, " . $_SESSION['username'] . "</h4>";
?>
<label>
    <input type="text" id="myInput" onkeyup="searchTable()">
    <div class="label-text">Search</div>
</label>

<table id="mainTable">
    <thead>
        <tr>
            <th>Document Id</th>
            <th>Owner</th>
            <th>Name</th>
            <th>Comment</th>
        </tr>
    </thead>
    <tbody>

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
            echo "Connection Failed: <br />" . $e -> getMessage();
        }
        
        $query= "SELECT document.id, user.username, document.name, document.Comment FROM document INNER JOIN user ON document.Author_id=user.id WHERE user.username='{$_SESSION['username']}'";
        
        foreach ($conn->query($query) as $row) {
            echo "
                <tr id=" . "tableRow" . $row['id'] . " >
                    <td> " . $row['id'] . " </td>
                    <td> " . $row['username'] . " </td>
                    <td> " . $row['name'] . " </td>
                    <td> " . $row['Comment'] . " </td>
                </tr>
            ";
        }
        
        ?>

    </tbody>
</table>
