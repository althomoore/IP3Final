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
<table id="mainTable">

    <div class="authorcontain">
        <div class="togglebutton">
            <button id="changeView" class="btn medium primary" onclick="changeView()">DISTRIBUTED</button>
        </div>

        <div class="search">
            <label>
                <input type="text" id="myInput" onkeyup="searchTable(), searchTable2()">
                <div class="label-text">Search</div>
            </label>
        </div>
    </div>

    <div class="authortoggle">
        <p id="mainHeading" class="docowner">YOUR AUTHORED DOCUMENTS</p>


    </div>


    <thead>

    <tr>
        <th>ID</th>
        <th>FILE NAME</th>
        <th style="min-width: 150px;">DESCRIPTION</th>
        <th>STATUS</th>
        <th>ACTIONS</th>
        <th>DISTRIBUTE</th>
        <th>DELETE</th>
    </tr>

    </thead>

    <tbody>


    <?php

    $query = /** @lang sql */
        "SELECT document.id, document.name, document.Author_id, document.comment, document.status, user.username, document.fileURL FROM document
        INNER JOIN user ON document.Author_id = user.id
        WHERE (user.username='{$_SESSION['username']}' AND (document.status = 'active' OR document.status = 'draft'))";

    foreach ($conn->query($query) as $row) {
        echo /** @lang sql */
            "
                <tr id=" . "tableRow" . $row['id'] . " >
                    <td> " . $row['id'] . " </td>
                    <td> " . $row['name'] . " </td>
                    <td> " . $row['comment'] . " </td>
                    <td> " . $row['status'] . " </td>" .

            "<td> <div class='dropdown'>
                            <button class='btn small secondary'>Actions <i class='fa faButton fa-chevron-down'></i></button>
                            <div class='dropdown-content'>
                                <a class='deleteDoc' href='" . "file directory/" . $row['fileURL'] . "'>Download <i class='fa faButton fa-download'></i></a>
                                <a class='deleteDoc' href=\"Php/editDoc.php?documentId=" . $row['id'] . "\">Edit <i class='fa faButton fa-pencil-square-o'></i></a>
                                <a class='deleteDoc' href=\"Php/activateDoc.php?documentId=" . $row['id'] . "\">Activate <i class='fa faButton fa-check'></i></a>
                                <a class='deleteDoc' href=\"Php/viewRevision.php?documentId=" . $row['id'] . "\">Revisions <i class='fa faButton fa-history'></i></a>
                                <a class='deleteDoc' href=\"Php/updateDoc.php?documentId=" . $row['id'] . "\">Update <i class='fa faButton fa-wrench'></i></a>
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
                    <td> <button class='btn error small'><a href=\"Php/deleteDoc.php?documentId=" . $row['id'] . "\"><i class='fa faButton fa-trash'></i></a></button></td>
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
        <th style="min-width: 75px">ID</th>
        <th>TITLE</th>
        <th>AUTHOR</th>
        <th style="min-width: 150px;">DESCRIPTION</th>
        <th>DOWNLOAD</th>
    </tr>
    </thead>
    <tbody>

    <?php

    $query = /** @lang sql */
        "SELECT document.id, user.username, document.name, document.comment, document.Author_id, user.forename, document.fileURL FROM distributee_access
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
                    <td> " . "<button class='btn primary small'><a style='color: white;' href='" . "file directory/" . $row['fileURL'] . "'>Download <i class='fa faButton fa-download'></i></a></button></td>
                </tr>
            ";
    }

    $conn = null;

    ?>
    </tbody>
</table>

