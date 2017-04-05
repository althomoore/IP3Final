<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>

    <meta charset="UTF-8">

    <link rel="stylesheet" href="SCSS/stylesheet.css">
    <link rel="stylesheet" href="SCSS/partials/modal.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

    <link rel="stylesheet" href="SCSS/partials/sideNav.css">
    <link rel="stylesheet" href="SCSS/partials/testing.css">

    <link rel="javascript" href="Javascript/javascript.js">

    <script type="text/javascript" src="https://use.fontawesome.com/2f9bccd1c4.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script type="text/javascript" src="Javascript/dropdown.js"></script>
    <script type="text/javascript" src="Javascript/sideNav.js"></script>

    <style>
        body {
            padding: 0;
            margin: 0;
        }

    </style>

    <?php include 'PHP/connection.php';?>
</head>

<body>
<div class="wrapper">
    <i class="fa fa-bars toggle"></i>
    <nav class="side-nav">

        <div class="userprofile">
            <div class="usernameimage">
                <h3><img src="./Images/logo.jpg" class="username"></h3>
            </div>
            <div class="username">
                <?php
                session_start();
                echo "<h3>" . $_SESSION["forename"] . "</h3>";
                ?>
            </div>
        </div>

        <div class="taskbox">
            <div class="taskbar">
                <a class="texttask">TASKS</a>
            </div>

            <div class="taskbar">
                <div class="tasks1">
                    <a class="textpad1"><?php
                        include 'PHP/draftCount.php';
                        ?></a>
                    <br/>
                    <a class="textpad">Draft</a>
                </div>
                <div class="tasks2">
                    <a class="textpad1"><?php
                        include 'PHP/activeCount.php'
                        ?></a>
                    <br/>
                    <a class="textpad">Active</a>
                </div>
                <div class="tasks3">
                    <a class="textpad1"><?php
                        include 'PHP/archiveCount.php'
                        ?></a>
                    <br/>
                    <a class="textpad">Archived</a>
                </div>
            </div>

            <div class="tools">
                <ul>
                    <li>
                        <a href="mainPage.php"><img src="./Images/Home.svg">Home</a>
                    </li>
                    <li>
                        <a href="#" id="myBtn"><i class="fa fa-2x fa-plus"></i>Add Document</a>
                    </li>
                    <li>
                        <a href="https://www.ideagen.com/contact-us/"><img src="./Images/Contact.svg">Contact</a>
                    </li>
                    <li>
                        <a href="./Php/admin.php"><i class="fa fa-2x fa-id-badge"></i>Admin</a>
                    </li>
                    <li>
                        <a href="./index.php"><i class="fa fa-2x fa-sign-out"></i>Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header>
        <?php include 'PHP/welcome.php'; ?>
    </header>
    <section>
        <?php include 'Php/docTable.php'; ?>
    </section>

    <div id="myModal" class="modal-mainpage">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h3>Add New Document</h3>
            </div>
            <div class="modal-body">

                <!--                <form action="Php/createFile.php" method="get" id="searchForm">-->
                <form action="Php/addDoc.php" method="post">

                    <label>
                        <input type="text" name="docTitle" id="docTitle">
                        <div class="label-text">Title</div>
                    </label>
                    <br/>
                    <label>
                        <div class="label-text">File Type
                        <select name="extension">
                            <option>Choose file type...</option>
                            <option value=".doc">Microsoft Word Document - .doc</option>
                            <option value=".xlsx">Microsoft Excel Spreadsheet - .xlsx</option>
                            <option value=".gdoc">Google Docs Document - .gdoc</option>
                            <option value=".txt">Notepad Text File - .txt</option>
                            <option value=".html">HTML Script - .HTML</option>
                            <option value=".css">CSS Script - .CSS</option>
                            <option value=".php">PHP Script - .PHP</option>
                            <option value=".sql">SQL Script - .SQL</option>
                        </select></div>

                        <input type="text" name="comment" id="comment">
                        <div class="label-text">Brief description of file contents</div>
                    </label>

                    <label>
                        <input type="text" name="authorId" id="authorId">
                        <div class="label-text">Author ID</div>
                    </label>

                    <button class="btn medium secondary" type="reset">Reset</button>
                    <button class="btn medium primary" value="Search" id="search-go">Create File</button>


                </form>

            </div>
        </div>
    </div>

    <script type="text/javascript" src="Javascript/modal.js"></script>
</div>

<script>
    function searchTable() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("mainTable");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            id = tr[i].getElementsByTagName("td")[0];
            td = tr[i].getElementsByTagName("td")[1];
            td2 = tr[i].getElementsByTagName("td")[2];
            td3 = tr[i].getElementsByTagName("td")[3];

            if (id || td || td2 || td3) {
                if (
                    id.innerHTML.toUpperCase().indexOf(filter) > -1 ||
                    td.innerHTML.toUpperCase().indexOf(filter) > -1 ||
                    td2.innerHTML.toUpperCase().indexOf(filter) > -1 ||
                    td3.innerHTML.toUpperCase().indexOf(filter) > -1
                ) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

</script>

</body>
