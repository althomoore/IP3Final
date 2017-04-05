<table id="mainTable">
    <thead>
    <tr>

        <th>TITLE</th>
        <th style="width: 50px;">FILE NAME</th>
        <th>REVISION</th>
        <th>AUTHOR</th>
        <th style="min-width: 150px;">FILE CONTENTS</th>
        <th>STATUS</th>
        <th>EDIT</th>
        <th>ACTIVATE</th>
        <th>DOWNLOAD</th>
        <th>DELETE</th>
    </tr>
    </thead>
    <tbody>

    <?php


    $query = "SELECT document.id, user.username, document.name, document.comment, document.status FROM document INNER JOIN user ON document.Author_id=user. id WHERE (user.username='{$_SESSION['username']}' AND (document.status = 'active' OR document.status = 'draft'))";

    foreach ($conn->query($query) as $row) {
        echo "
                <tr id=" . "tableRow" . $row['id'] . " >
                    
                    <td> " . $row['name'] . " </td>
                    <td> " . $row['id'] . " </td>
                    <td> " . "No." . " </td>
                    <td> " . $row['username'] . " </td>
                    <td> " . $row['comment'] . " </td>
                    <td> " . $row['status'] . " </td>
                    <td> " . "<button class='btn small secondary'>
                                <a class='deleteDoc' href=\"Php/editDoc.php?documentId=" . $row['id'] . "\"><i class='fa fa-pencil-square-o'></i></a>
                             </button>" . " </td>
                                       
                             
                    <td> " . "<button class='btn small primary'>
                                <a class='activateDoc' href=\"Php/activateDoc.php?documentId=" . $row['id'] . "\">ACTIVATE</a>
                             </button>" . " </td>
                             
                             <td> " . "<button class='btn small secondary'><i class='fa fa-download'></i></button>" . "</td> 
                             
                    <td> " . "<button class='btn small error'>
                                <a class='deleteDoc' href=\"Php/deleteDoc.php?documentId=" . $row['id'] . "\"><i class='fa fa-trash'></i></a>
                             </button>" . " </td>
                </tr>
            ";
    }

    ?>
    </tbody>
</table>

</body>
