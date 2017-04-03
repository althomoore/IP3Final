<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Administrator</title>

    <link rel="stylesheet" href="../SCSS/stylesheet.css">
    <link rel="stylesheet" href="../SCSS/partials/modal.css">
    <link rel="stylesheet" href="../SCSS/partials/testing.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>

<body>
    <a href="../mainPage.php"><button class="btn medium error">Return</button></a>
    <h1>Administration Tools</h1>
    <section>
        <h2>Add User</h2>
        <p>Click the button to open a dialog box allowing you to add a new user to the users database.</p>
        <button id="myBtn" class="btn primary medium">Add User</button>
    </section>
    <section>
        <h2>Show/ Delete Users</h2>
        <p>Click the button to open a dialog showing a list of all users and their roles. Click the delete button next to a user to remove them from the database.</p>
        <button id="userListBtn" class="btn primary medium">Show Users</button>
    </section>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Add New User</h2>
            </div>
            <div class="modal-body">
                <form action="addUser.php" method="post">
                    <label>
                        <input type="text" name="firstName" id="firstName" required>
                        <div class="label-text">First Name:</div>
                    </label>
                    <label>
                        <input type="text" name="lastName" id="lastName" required>
                        <div class="label-text">Last Name:</div>
                    </label>
                    <label>
                        <input type="email" name="email" id="email" required>
                        <div class="label-text">Email:</div>
                    </label>
                    <label>
                       <input type="text" name="username" id="username" required>
                       <div class="label-text">Username:</div>
                   </label>
                    <label>
                        <input type="password" name="password" id="password" required>
                        <div class="label-text">Password:</div>
                    </label>


                    <input type="submit" class="btn large primary" value="Add User" name="submit" id="submit">
                </form>
            </div>
        </div>
    </div>

    <div id="userList" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>User List</h2>
            </div>
            <div class="modal-body">

                <table id="mainTable">
                    <thead>
                        <th>User Id</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Delete</th>
                    </thead>

                    <?php
        define("DB_USER", "root");
        define("DB_PASS", "");
        $servername = "localhost";
        $dbname = "mydb";
    
        try {
            $conn=new PDO("mysql:host=$servername;dbname=$dbname",DB_USER, DB_PASS);
            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection Failed: " . $e -> getMessage();
        }
        $query= 'SELECT * FROM user';
        foreach ($conn->query($query) as $row) {
            echo "
                <tr id=" . "tableRow" . $row['id'] . " >
                    <td> " . $row['id'] . " </td>
                    <td> " . $row['forename'], ' ', $row['surname'] . "</td>
                    <td> " . $row['username'] . " </td>
                    <td><button class='btn small primary'><a class ='buttonAnchor' href=\"delete.php?Author_id=".$row['id']."\">Delete</a></button></td>
                </tr>
            ";
        }
    ?>

                </table>
            </div>
        </div>
    </div>

    <script>
        var modal = document.getElementById('myModal');
        var btn = document.getElementById("myBtn");
        var span = document.getElementsByClassName("close")[0];

        var modal2 = document.getElementById('userList');
        var btn2 = document.getElementById('userListBtn');
        var span2 = document.getElementsByClassName("close")[1];

        btn.onclick = function() {
            modal.style.display = "block";
        }
        btn2.onclick = function() {
            modal2.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }
        span2.onclick = function() {
            modal2.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
            if (event.target == modal2) {
                modal2.style.display = "none";
            }
        }

    </script>
</body>

</html>
