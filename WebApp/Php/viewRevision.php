

<table id="mainTable">
    <thead>
    <tr>

        <th>Id</th>
        <th style="width: 50px;">Document_id</th>
        <th>revision Upload Date</th>
    </tr>
    </thead>
    <tbody>

    <?php
include ("connection.php");
    $Document_id = (int)$_GET['documentId'];


    $query = "SELECT id, Document_id, revision_uploadDate from revision where Document_id = $Document_id ";
    foreach ($conn->query($query) as $row) {
        echo "
                <tr id=" . "tableRow" . $row['id'] . " >
                    
                    <td> " . $row['id'] . " </td>
                    <td> " . $row['Document_id'] . " </td>
                    <td> " . $row['revision_uploadDate'] . " </td>
                </tr>
            ";
    }

    ?>
</tbody>
</table>

</body>
