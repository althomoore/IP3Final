<?php
echo "<h4 style='padding-left: 20px;'> Welcome back, " . $_SESSION['forename'] . "</h4>";
?>
<label>
    <input type="text" id="myInput" onkeyup="searchTable()">
    <div class="label-text">Search</div>
</label>

<table id="mainTable">
    <thead>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Revision</th>
        <th>Author</th>
        <th style="min-width: 150px;">Comment</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Download</th>
        <th>Delete</th>
        <th>Activate</th>
    </tr>
    </thead>
    <tbody>

    <?php

    define("DB_USER", "root");
    define("DB_PASS", "");
    $servername = "localhost";
    $dbname = "mydb";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo DB_USER . " is connected to " . $dbname;
    } catch (PDOException $e) {
        echo "Connection Failed: <br />" . $e->getMessage();
    }

    $query = "SELECT document.id, user.username, document.name, document.comment, document.status FROM document INNER JOIN user ON document.Author_id=user. id WHERE (user.username='{$_SESSION['username']}' AND (document.status = 'active' OR document.status = 'draft'))";

    foreach ($conn->query($query) as $row) {
        echo "
                <tr id=" . "tableRow" . $row['id'] . " >
                    <td> " . $row['id'] . " </td>
                    <td> " . $row['name'] . " </td>
                    <td> " . "REVISION" . " </td>
                    <td> " . $row['username'] . " </td>
                    <td> " . $row['comment'] . " </td>
                    <td> " . $row['status'] . " </td>
                    <td> " . "<button class='btn small secondary'>
                                <a class='deleteDoc' href=\"Php/editDoc.php?documentId=" . $row['id'] . "\"> Edit   
                                <i class='fa fa-pencil-square-o'></i></a>
                             </button>" . " </td>
                    <td> " . "<button class='btn small primary'>Download <i class='fa fa-download'></i></button>" . " </td>
                    <td> " . "<button class='btn small secondary'>
                                <a class='deleteDoc' href=\"Php/deleteDoc.php?documentId=" . $row['id'] . "\"> Delete
                                <i class='fa fa-trash'></i></a>
                             </button>" . " </td>
                             
                    <td> " . "<button class='btn small secondary'>
                                <a class='deleteDoc' href=\"Php/activateDoc.php?documentId=" . $row['id'] . "\"> Activate</a>
                             </button>" . " </td>
                </tr>
            ";
    }

    ?>
    </tbody>
</table>

</body>
