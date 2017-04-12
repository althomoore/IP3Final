<!DOCTYPE html>
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

    <?php include 'Php/connection.php'; ?>
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


        <!--            **********************************************************************-->

        <div class="taskbox">
            <div class="taskbar">
                <a class="texttask">MY DOCUMENTS</a>
            </div>

            <div class="taskbar">
                <div class="tasks1">
                    <a class="textpad1"> <?php include 'Php/draftCount.php'; ?> </a>
                    <br/>
                    <a class="textpad">Draft</a>
                </div>
                <div class="tasks2">
                    <a class="textpad1"> <?php include 'Php/activeCount.php'; ?> </a>
                    <br/>
                    <a class="textpad">Active</a>
                </div>
                <div class="tasks3">
                    <a class="textpad1"> <?php include 'Php/archiveCount.php'; ?> </a>
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
                        <a href="https://www.ideagen.com/contact-us/"><img src="./Images/Contact.svg">Contact</a>
                    </li>
                    <li>
                        <?php
                        echo "<a href=\"./Php/admin.php?userId=" . $_SESSION['userId'] . "\"><i class='fa fa-2x fa-id-badge'></i> Admin</a>";
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

        <div class="logo"><img src="./images/logo-ideagen-oneCol.png" alt="Logo" height="30px"></div>
        <div><?php include 'Php/welcome.php'; ?></div>

    </header>

    <section>
        <?php include 'Php/docTable.php'; ?>
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

                   <?php // echo $_SESSION['userId']; ?>

                    <label>
                        <input type="text" name="docTitle" id="docTitle">
                        <div class="label-text" autofocus>Title</div>
                    </label>
                    <label for="comment">Comment</label>
                    <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
                    <label>
                        <input type="file" name="fileUrl" id="fileUrl">
                    </label>

                    <button class="btn large primary" value="Search" id="search-go">Create File</button>

                </form>

            </div>
        </div>
    </div>

    <script type="text/javascript" src="Javascript/modal.js"></script>
</div>


<script>
    btn.onclick = function () {
        modal.style.display = "block";
    }

    span.onclick = function () {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
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
