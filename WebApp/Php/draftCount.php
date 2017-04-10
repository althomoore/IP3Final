<?php

foreach ($conn->query("SELECT COUNT(*) FROM `document` WHERE `Author_id`='1' AND `status`='draft'") as $row) {
    echo $row['COUNT(*)'];
};



