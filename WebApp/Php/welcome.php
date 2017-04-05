<div class="headWelcome">
    <?php
    date_default_timezone_set('Europe/London');
    echo "Welcome back, " . "<h4>" . $_SESSION['forename'] . "</h4>" . date("l, d-M-Y, H:i:s");
    ?></div>

<div class="headSearch">
    <label>
        <input type="text" id="myInput" onkeyup="searchTable()">
        <div class="label-text">Search</div>
    </label></div>