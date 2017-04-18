<script>
    function startTime() {
        var currentDate = new Date();
        var d = currentDate.getDay() + 9;
        var M = currentDate.getMonth() + 1;
        var Y = currentDate.getFullYear();
        var h = currentDate.getHours();
        var m = currentDate.getMinutes();
        var s = currentDate.getSeconds();

        d = checkTime(d);
        M = checkTime(M);
        m = checkTime(m);
        s = checkTime(s);

        document.getElementById('time').innerHTML =
            d + "/" + M + "/" + Y + "   " + h + ":" + m + ":" + s;

        var t = setTimeout(startTime, 500);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i
        }
        return i;
    }
</script>

<body onload="startTime()">

<div class="headWelcome">
    <?php
    echo "Welcome back " . "<b>" . $_SESSION['forename'] . "</b>" . "<h5>" . "<div id='time'></div>" . "</h5>";

    ?></div>



</body>
