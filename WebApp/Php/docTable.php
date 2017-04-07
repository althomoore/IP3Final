
<?php
    echo "<h4 style='padding-left: 20px;'> Welcome back, " . $_SESSION['forename'] . "</h4>";
?>
<label>
    <input type="text" id="myInput" onkeyup="searchTable()">
    <div class="label-text">Search</div>
</label>
<h3>Documents where you are Author</h3>
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
            <th>Add Distributee</th>
            <th>View Distributee</th>
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
        
        $query= "SELECT document.id, user.username, document.name, document.comment, document.status FROM document INNER JOIN user ON document.Author_id=user. id WHERE (user.username='{$_SESSION['username']}' AND (document.status = 'active' OR document.status = 'draft'))";
        
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
                    <td> " . "<button class='btn small secondary'>
                                <a class='addDistributee' href=\"Php/addDistributee.php?documentId=" . $row['id'] . "\"> AddDistributee  
                                <i class='fa fa-pencil-square-o'></i></a>
                             </button>" . " </td>
                </tr>
                <td> " . "<button class='btn small secondary'>
                                <a class='viewDistributee' href=\"Php/viewDistributee.php?documentId=" . $row['id'] . "\"> View Distributees  
                                <i class='fa fa-pencil-square-o'></i></a>
                             </button>" . " </td>
                </tr>
            ";
        }
        
        ?>
    </tbody>
</table>



</br>
</br>
</br>


<!-- <label>
    <input type="text" id="myInput" onkeyup="searchTable()">
    <div class="label-text">Search</div>
</label> -->

<h3>Documents where you are a Distributee</h3>
<table id="mainTable">
    <thead>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Revision</th>
        <th>Author ID</th>
        <th style="min-width: 150px;">Comment</th>
        <th>Status</th>
        <th>Download</th>
        <th>Activate</th>


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

    $query= "SELECT document.id, user.username, document.name, document.comment, document.status,document.Author_id FROM document INNER JOIN distributee_access ON
document.id = distributee_access.Document_id
INNER JOIN user ON 
distributee_access.User_id=user.id
WHERE (user.username='{$_SESSION['username']}' AND (document.status = 'active' OR document.status = 'draft'))";

    foreach ($conn->query($query) as $row) {
        echo "
                <tr id=" . "tableRow" . $row['id'] . " >
                    <td> " . $row['id'] . " </td>
                    <td> " . $row['name'] . " </td>
                    <td> " . "REVISION" . " </td>
                    <td> " . $row['Author_id'] . " </td>
                    <td> " . $row['comment'] . " </td>
                    <td> " . $row['status'] . " </td>
                    <td> " . "<button class='btn small primary'>Download <i class='fa fa-download'></i></button>" . " </td>
                   
                             
                    <td> " . "<button class='btn small secondary'>
                                <a class='deleteDoc' href=\"Php/activateDoc.php?documentId=" . $row['id'] . "\"> Activate</a>
                             </button>" . " </td>
                </tr>
            ";
    }

    ?>
    </tbody>
</table>



<h3>Authors Details</h3>
<table id="mainTable">
    <thead>
    <tr>
        <th>Id</th>
        <th>UserName</th>
        <th>First Name</th>
        <th>Last Name</th>
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

    $query= "SELECT user.id, user.forename, user.surname, user.username FROM user";
    foreach ($conn->query($query) as $row) {
        echo "
                <tr id=" . "tableRow" . $row['id'] ." >
                    <td> " . $row['id'] . " </td>
                    <td> " . $row['username'] . " </td>
                    <td> " . $row['forename'] . " </td>
                    <td> " . $row['surname'] . " </td>
                   
            
                </tr>
            ";
    }

    ?>
    </tbody>
</table>








<?php
try {
    $conn=new PDO("mysql:host=$servername;dbname=$dbname",DB_USER, DB_PASS);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo DB_USER . " is connected to " . $dbname;
} catch(PDOException $e) {
    echo "Connection Failed: " . $e -> getMessage();
}


?>
<script>
    var dmodal = document.getElementById('distributeeList');
    var dbtn = document.getElementById('viewDistributee');
    var dspan = document.getElementsByClassName("close")[0];

    dbtn.onclick = function() {
        dmodal.style.display = "block";
    }

    dspan.onclick = function() {
        dmodal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
