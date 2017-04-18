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
    <link rel="stylesheet" href="Javascript/time.js">

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

    <?php include 'PHP/connection.php'; ?>
</head>

<body>
<div class="wrapper">

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


        <!--            **********************************************************************-->

        <div class="taskbox">
            <div class="taskbar">
                <a class="texttask">MY DOCUMENTS</a>
            </div>

            <div class="taskbar">
                <div class="tasks1">
                    <a class="textpad1"> <?php include 'PHP/draftCount.php'; ?> </a>
                    <br/>
                    <a class="textpad">Draft</a>
                </div>
                <div class="tasks2">
                    <a class="textpad1"> <?php include 'PHP/activeCount.php'; ?> </a>
                    <br/>
                    <a class="textpad">Active</a>
                </div>
                <div class="tasks3">
                    <a class="textpad1"> <?php include 'PHP/archiveCount.php'; ?> </a>
                    <br/>
                    <a class="textpad">Archive</a>
                </div>
            </div>

            <!--                *******************************************************************-->


            <div class="tools">
                <ul>
                    <li>
                        <a href="mainPage.php"><img src="./Images/Home.svg">Home</a>
                    </li>
                    <li>
                        <a href="#" id="myBtn"><i class="fa fa-2x fa-plus"></i> Add Document</a>
                    </li>
                    <li>
                        <a href="#" id="userListBtn"><i class="fa fa-2x fa-plus"></i> Upload Document</a>
                    </li>
                    <li>
                        <a href="https://www.ideagen.com/contact-us/"><img src="./Images/Contact.svg">Contact</a>
                    </li>
                    <li>
                        <?php
                        echo "<a href=\"./PHP/admin.php?userId=" . $_SESSION['userId'] . "\"><i class='fa fa-2x fa-id-badge'></i> Admin</a>";
                        ?>
                    </li>
                    <li>
                        <a href="./index.php"><i class="fa fa-2x fa-sign-out"></i> Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header>

        <div class="logo"><img src="Images/logo-ideagen-oneCol.png" alt="Logo" height="30px"></div>
        <div><?php include 'PHP/welcome.php'; ?></div>

    </header>

    <section>
        <?php include 'PHP/docTable.php'; ?>
    </section>


    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Add New Document</h2>
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
                                <option value=".html">HTML Script - .html</option>
                                <option value=".css">CSS Script - .css</option>
                                <option value=".php">PHP Script - .php</option>
                                <option value=".sql">SQL Script - .sql</option>
                            </select></div>

                        <!--                        <div class="label-text">Purpose of Document-->
                        <!--                            <select name="extension">-->
                        <!--                                <option>Choose file Purpose...</option>-->
                        <!--                                <option value="contract">Employee Contract</option>-->
                        <!--                                <option value="induction">Induction Checklist</option>-->
                        <!--                                <option value="holiday">Holiday Request Form</option>-->
                        <!--                                <option value="discipline">Disciplinary Action</option>-->
                        <!--                                <option value="absence">Absence Form</option>-->
                        <!--                                <option value="transfer">Department Transfer</option>-->
                        <!--                                <option value="application">Application for Internal Position</option>-->
                        <!--                            </select></div>-->


                        <input type="text" name="comment" id="comment">
                        <div class="label-text">Brief description of file contents</div>
                    </label>



                    <button class="btn medium secondary" type="reset">Reset</button>
                    <button class="btn medium primary" value="Search" id="search-go">Create File</button>


                </form>

            </div>
        </div>
    </div>

    <script type="text/javascript" src="Javascript/modal.js"></script>
</div>

<div id="userList" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Upload</h2>
        </div>
        <div class="modal-body">

            <form action="Php/upload.php" method="post" enctype="multipart/form-data">
                Select file to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Document" name="submit">
            </form>
        </div>
    </div>
<script>
    btn.onclick = function () {
        modal.style.display = "block";
    }

    span.onclick = function () {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
        if (event.target == modal2) {
            modal2.style.display = "none";
        }
    }

    var modal2 = document.getElementById('userList');
    var btn2 = document.getElementById('userListBtn');
    var span2 = document.getElementsByClassName("close")[1];

    span2.onclick = function() {
        modal2.style.display = "none";
    }

    btn2.onclick = function() {
        modal2.style.display = "block";
    }




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
<script>
    btn.onclick = function () {
        modal.style.display = "block";
    }

    span.onclick = function () {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }

    function searchTable2() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("distTable");
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

<script>
    function changeView() {

        $("#mainTable").toggleClass("invisible");
        $("#mainHeading").toggleClass("invisible");
        $("#distTable").toggleClass("invisible");
        $("#distHeading").toggleClass("invisible");

    }

    $("#changeView").on("click", function(){
        if($(this).text()==="DISTRIBUTED")
        {
            $(this).text("MY AUTHORED");
        } else {
            $(this).text("DISTRIBUTED");
        }


    });

</script>

</body>

