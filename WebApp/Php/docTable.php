<?php
$notify = /** @lang sql */
    "SELECT notification.notificationId, notification.message, user.username FROM notification INNER JOIN user ON notification.userId = user.id WHERE user.username='{$_SESSION['username']}'";
foreach ($conn->query($notify) as $row) {
    echo /** @lang sql */
        "
            <div class='alert'>
                <a class='closebtn' href=\"Php/deleteNotification.php?notificationId=" . $row['notificationId'] . "\">&times;</a>
                 " . $row['notificationId'] . " " . $row['message'] . "
            </div>
            ";
}
?>

<tr>

</tr>

<table id="mainTable">
    <div class="togglebutton">
        <button id="changeView" class="btn medium primary" onclick="changeView()">DISTRIBUTED</button>
    </div>

    <div class="authortoggle">
        <p id="mainHeading" class="docowner">YOUR AUTHORED DOCUMENTS</p>


    </div>


    <thead>

    <tr>
        <th>ID</th>
        <th>FILE NAME</th>
        <th>AUTHOR</th>
        <th style="min-width: 150px;">DESCRIPTION</th>
        <th>REVISION</th>
        <th>STATUS</th>
        <th>ACTIONS</th>
        <th>DISTRIBUTE</th>
    </tr>

    </thead>

    <tbody>


    <?php

    $query = /** @lang sql */
        "SELECT document.id, document.name, document.Author_id, document.comment, document.status, user.username FROM document
        INNER JOIN user ON document.Author_id = user.id
        WHERE (user.username='{$_SESSION['username']}' AND (document.status = 'active' OR document.status = 'draft'))";

    foreach ($conn->query($query) as $row) {
        echo /** @lang sql */
            "
                <tr id=" . "tableRow" . $row['id'] . " >
                    <td> " . $row['id'] . " </td>
                    <td> " . $row['name'] . " </td>
                    <td> " . $row['Author_id'] . " </td>
                    <td> " . $row['comment'] . " </td>
                    <td> " . "REVISION" . " </td>
                    <td> " . $row['status'] . " </td>" .

            "<td> <div class='dropdown'>
                            <button class='btn small secondary'>Actions <i class='fa faButton fa-chevron-down'></i></button>
                            <div class='dropdown-content'>
                                <a class='deleteDoc' href='#'>Download <i class='fa faButton fa-download'></i></a>
                                <a class='deleteDoc' href=\"Php/editDoc.php?documentId=" . $row['id'] . "\">Edit <i class='fa faButton fa-pencil-square-o'></i></a>
                                <a class='deleteDoc' href=\"Php/activateDoc.php?documentId=" . $row['id'] . "\">Activate <i class='fa faButton fa-check'></i></a>
                                <a class='deleteDoc' href=\"Php/viewRevision.php?documentId=" . $row['id'] . "\">Revisions <i class='fa faButton fa-history'></i></a>
                                <a class='deleteDoc' href=\"Php/updateDoc.php?documentId=" . $row['id'] . "\">Update <i class='fa faButton fa-wrench'></i></a>
                                <a class='deleteDoc' href=\"Php/deleteDoc.php?documentId=" . $row['id'] . "\">Delete <i class='fa faButton fa-trash'></i></a>
                            </div>
                        </div>  
                    </td>
                    
                    <td> <div class='dropdown'>
                            <button class='btn small secondary'>Distributees <i class='fa faButton fa-chevron-down'></i></button>
                            <div class='dropdown-content'>
                                <a class='distributeDoc' href=\"Php/viewDistributee.php?documentId=" . $row['id'] . "\">View <i class='fa faButton fa-address-book-o'></i></a>
                                <a class='distributeDoc' href=\"Php/addDistributee.php?documentId=" . $row['id'] . "\">Add <i class='fa faButton fa-plus-circle'></i></a>
                            </div>
                        </div>  
                    </td>
            ";
    }
    ?>
    </tbody>
</table>

<table id="distTable" class="invisible">

    <div class="authortoggle">
        <p id="distHeading" class="invisible docowner">DOCUMENTS DISTRIBUTED TO YOU</p>
    </div>

    <thead>
    <tr>
        <th>ID</th>
        <th>TITLE</th>
        <th>AUTHOR</th>
        <th style="min-width: 150px;">DESCRIPTION</th>
        <th>DOWNLOAD</th>
    </tr>
    </thead>
    <tbody>

    <?php

    $query = /** @lang sql */
        "SELECT document.id, user.username, document.name, document.comment, document.Author_id, user.forename FROM distributee_access
        INNER JOIN document ON document.id = distributee_access.Document_id
        INNER JOIN user ON distributee_access.User_id = user.id
    WHERE (user.username='{$_SESSION['username']}' AND (document.status = 'active' OR document.status = 'draft'))";

    foreach ($conn->query($query) as $row) {
        echo /** @lang sql */
            "
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

$query = /** @lang sql */
    "SELECT user.id, user.username FROM distributee_access
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
