<?php
    echo "<h4 style='padding-left: 20px;'> Welcome back, " . $_SESSION['forename'] . "</h4>";
?>

    <button class="btn medium primary" onclick="changeView()">Change View</button>

    <label>
        <input type="text" id="myInput" placeholder="Id, name or comment" onkeyup="searchTable(), searchTable2()">
        <div class="label-text">Search</div>
    </label>

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

        $notify="SELECT notification.notificationId, notification.message, user.username FROM notification INNER JOIN user ON notification.userId = user.id WHERE user.username='{$_SESSION['username']}'";
        foreach($conn->query($notify) as $row) {
            echo "
            <div class='alert'>
                <a class='closebtn' href=\"Php/deleteNotification.php?notificationId=" . $row['notificationId'] . "\">&times;</a>
                 " . $row['notificationId'] . " " . $row['message'] . "
            </div>
            ";
        }
    ?>

        <table id="mainTable">
            <h3 id="mainHeading">Documents you are the author of:</h3>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th style="min-width: 150px;">Comment</th>
                    <th>Revision</th>
                    <th>Status</th>
                    <th>Actions</th>
                    <th>Distributees</th>
                </tr>
            </thead>
            <tbody>




                <?php
                
        $query= "SELECT document.id, document.name, document.Author_id, document.comment, document.status, user.username FROM document
        INNER JOIN user ON document.Author_id = user.id
        WHERE (user.username='{$_SESSION['username']}' AND (document.status = 'active' OR document.status = 'draft'))";
        
        foreach ($conn->query($query) as $row) {
            echo "
                <tr id=" . "tableRow" . $row['id'] . " >
                    <td> " . $row['id'] . " </td>
                    <td> " . $row['name'] . " </td>
                    <td> " . $row['Author_id'] ." </td>
                    <td> " . $row['comment'] . " </td>
                    <td> " . "REVISION" . " </td>
                    <td> " . $row['status'] . " </td>" .
                    
                    "<td> <div class='dropdown'>
                            <button class='btn small secondary'>Actions <i class='fa faButton fa-chevron-down'></i></button>
                            <div class='dropdown-content'>
                                <a class='deleteDoc' href='#'>Download <i class='fa faButton fa-download'></i></a>
                                <a class='deleteDoc' href=\"Php/editDoc.php?documentId=" . $row['id'] . "\">Edit <i class='fa faButton fa-pencil-square-o'></i></a>
                                <a class='deleteDoc' href=\"Php/activateDoc.php?documentId=" . $row['id'] . "\">Activate <i class='fa faButton fa-check'></i></a>
                                <a class='deleteDoc' href=\"Php/deleteDoc.php?documentId=" . $row['id'] . "\">Delete <i class='fa faButton fa-trash'></i></a>
                            </div>
                        </div>  
                    </td>
                    
                    <td> <div class='dropdown'>
                            <button class='btn small secondary'>Distributees <i class='fa faButton fa-chevron-down'></i></button>
                            <div class='dropdown-content'>
                                <a class='deleteDoc' href=\"Php/viewDistributee.php?documentId=" . $row['id'] . "\">View <i class='fa faButton fa-address-book-o'></i></a>
                                <a class='deleteDoc' href=\"Php/addDistributee.php?documentId=" . $row['id'] . "\">Add <i class='fa faButton fa-plus-circle'></i></a>
                            </div>
                        </div>  
                    </td>
            ";
        }        
        ?>
            </tbody>
        </table>

        <table id="distTable" class="invisible">
            <h3 id="distHeading" class="invisible">Documents you are a distributee of:</h3>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Author ID</th>
                    <th style="min-width: 150px;">Comment</th>
                    <th>Download</th>
                </tr>
            </thead>
            <tbody>

                <?php


    $servername = "localhost";
    $dbname = "mydb";

    try {
        $conn=new PDO("mysql:host=$servername;dbname=$dbname",DB_USER, DB_PASS);
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo DB_USER . " is connected to " . $dbname;
    } catch(PDOException $e) {
        echo "Connection Failed: <br />" . $e -> getMessage();
    }

    $query= "SELECT document.id, user.username, document.name, document.comment, document.Author_id, user.forename FROM distributee_access
        INNER JOIN document ON document.id = distributee_access.Document_id
        INNER JOIN user ON distributee_access.User_id = user.id
    WHERE (user.username='{$_SESSION['username']}' AND (document.status = 'active' OR document.status = 'draft'))";

    foreach ($conn->query($query) as $row) {
        echo "
                <tr id=" . "tableRow" . $row['id'] . " >
                    <td> " . $row['id'] . " </td>
                    <td> " . $row['name'] . " </td>
                    <td> " . $row['Author_id'] . " </td>
                    <td> " . $row['comment'] . " </td>
                    <td> " . "<button class='btn small primary'>Download <i class='fa fa-download'></i></button>" . " </td>
                </tr>
            ";
    }

    ?>
            </tbody>
        </table>





        <!-- VIEW DISTRIBUTEE ********************************************-->
        <?php
try {   
    $conn=new PDO("mysql:host=$servername;dbname=$dbname",DB_USER, DB_PASS);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo DB_USER . " is connected to " . $dbname;
} catch(PDOException $e) {
    echo "Connection Failed: " . $e -> getMessage();
}
$query= "SELECT user.id, user.username FROM distributee_access
INNER JOIN user ON
user.id=distributee_access.User_id
INNER JOIN document ON
document.id=distributee_access.Document_id
WHERE document.id = '4'";
foreach ($conn->query($query) as $row) {
//    echo "
//                <tr id=" . "tableRow" . $row['id'] . " >
//                    <td> " . $row['id'] . " </td>
//                    <td> " . $row['username'] . " </td>
//                    <td><button class='btn small primary'><a class ='buttonAnchor' href=\"delete.php?Author_id=".$row['id']."\">Delete</a></button></td>
//                </tr>
//            ";
}
?>
