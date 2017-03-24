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



</head>

<div class="wrapper">
    <i class="fa fa-bars toggle"></i>
    <nav class="side-nav">

        <div class="userprofile">
            <div class="usernameimage">
                <h3><img src="./Images/logo.jpg" class="username"></h3>
            </div>
            <div class="username">
                <h3>Ideagen IP3</h3>
            </div>
        </div>

        <div class="taskbox">
            <div class="taskbar">
                <a class="texttask">TASKS</a>
            </div>

            <div class="taskbar">
                <div class="tasks1">
                    <a class="textpad1">5</a>
                    <br/>
                    <a class="textpad">Overdue</a>
                </div>
                <div class="tasks2">
                    <a class="textpad1">0</a>
                    <br/>
                    <a class="textpad">This Week</a>
                </div>
                <div class="tasks3">
                    <a class="textpad1">7</a>
                    <br/>
                    <a class="textpad">Outstanding</a>
                </div>
            </div>

            <div class="tools">
                <ul>
                    <li>
                        <a href="index.html"><img src="./Images/Home.svg">Home</a>
                    </li>
                    <li>
                        <a href="#" id="myBtn"><i class="fa fa-2x fa-plus"></i> Add Document</a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropbtn" onclick="myFunction()"><img src="./Images/Documents.svg">Documents</a>
                        <div id="myDropdown" class="dropdown-content"> <a href="#">Link 1</a> <a href="#">Link 2</a> <a href="#">Link 3</a> </div>
                    </li>
                    <li>
                        <a href="https://www.ideagen.com/contact-us/"><img src="./Images/Contact.svg">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header>

    </header>

    <section>
        <?php include 'PHP/dirtable.php'; ?>
    </section>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Add New Document</h2>
            </div>
            <div class="modal-body">

                <form action="PHP/createFile.php" method="get" id="searchForm">

                    <div class="label-text">Document Title:</div>
                    <input type="text" id="filename" placeholder="Filename" name="filename" required/>

                    <label>
                        <select name="extension">
                            <option value=".doc">.doc</option>
                            <option value=".xlsx">.xlsx</option>
                            <option value=".gdoc">.gdoc</option>
                            <option value=".txt">.txt</option>
                        </select>
                    </label>

                    <button class="btn large primary" value="Search" id="search-go">Create File</button>

                </form>

            </div>
            </aadiv>
        </div>

        <div id="dummy" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Confirm</h2>
                    <span class="close">&times;</span>
                </div>
                <div class="modal-body">
                    <p>Are you sure?</p>
                    <button class="btn medium primary">Yes</button>
                    <button class="btn medium secondary">Cancel</button>
                </div>
            </div>
        </div>

    <script type="text/javascript" src="Javascript/modal.js"></script>
    <script type="text/javascript" src="Javascript/upload.js"></script>
</div>

